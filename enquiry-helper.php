<?php
declare(strict_types=1);

if (!function_exists('sr_insert_enquiry')) {
    /**
     * Inserts a row into the enquiry table. If this database hasn't had the
     * source_page migration applied yet (ALTER TABLE enquiry ADD COLUMN
     * source_page ...), the insert falls back to the older column set instead
     * of throwing/500ing the whole form.
     */
    function sr_insert_enquiry(mysqli $conn, array $data): bool {
        $name       = (string)($data['name'] ?? '');
        $email      = (string)($data['email'] ?? '');
        $phone      = (string)($data['phone'] ?? '');
        $company    = (string)($data['company'] ?? '');
        $location   = (string)($data['location'] ?? '');
        $sourcePage = (string)($data['source_page'] ?? '');
        $message    = (string)($data['message'] ?? '');

        try {
            $stmt = mysqli_prepare(
                $conn,
                'INSERT INTO enquiry (name, email, phone, company, location, source_page, message, created_at)
                 VALUES (?, ?, ?, ?, ?, ?, ?, NOW())'
            );
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'sssssss', $name, $email, $phone, $company, $location, $sourcePage, $message);
                $ok = mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                if ($ok) {
                    return true;
                }
            }
        } catch (\mysqli_sql_exception $e) {
            // Most likely an "Unknown column 'source_page'" on a database that
            // hasn't been migrated yet — fall back to the legacy insert below.
        }

        try {
            $stmt = mysqli_prepare(
                $conn,
                'INSERT INTO enquiry (name, email, phone, company, location, message, created_at)
                 VALUES (?, ?, ?, ?, ?, ?, NOW())'
            );
            if (!$stmt) {
                return false;
            }
            mysqli_stmt_bind_param($stmt, 'ssssss', $name, $email, $phone, $company, $location, $message);
            $ok = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return $ok;
        } catch (\mysqli_sql_exception $e) {
            return false;
        }
    }
}
