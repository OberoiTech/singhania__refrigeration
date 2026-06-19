<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: truck-ac.php#quote-form');
    exit;
}

$name = trim((string)($_POST['name'] ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
$sourcePage = trim((string)($_POST['source_page'] ?? 'truck-ac.php'));

$redirectPage = 'truck-ac.php';
if ($sourcePage !== '' && preg_match('/^[a-zA-Z0-9_\-\/]+\.php$/', $sourcePage)) {
    $redirectPage = $sourcePage;
}

if ($name === '' || $phone === '') {
    header('Location: ' . $redirectPage . '?status=missing#quote-form');
    exit;
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ' . $redirectPage . '?status=invalid-email#quote-form');
    exit;
}

$safeName = preg_replace('/[\r\n]+/', ' ', $name);
$safePhone = preg_replace('/[\r\n]+/', ' ', $phone);
$safeEmail = preg_replace('/[\r\n]+/', ' ', $email);
$safeMessage = trim(preg_replace('/[\r\n]{3,}/', "\n\n", $message));

$to = 'info@singhaniarefrigeration.com';
$conn = null;

$configPath = __DIR__ . '/admin/config.php';
if (is_file($configPath)) {
    include $configPath;
    if (isset($conn) && $conn instanceof mysqli) {
        $cfg = mysqli_query($conn, 'SELECT email FROM configuration LIMIT 1');
        if ($cfg && ($row = mysqli_fetch_assoc($cfg)) && !empty($row['email']) && filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
            $to = $row['email'];
        }

        $sql = 'INSERT INTO enquiry (name, email, phone, company, location, message, created_at)
                VALUES (?, ?, ?, ?, ?, ?, NOW())';
        if ($stmt = mysqli_prepare($conn, $sql)) {
            $company = '';
            $location = 'Truck AC page';
            mysqli_stmt_bind_param($stmt, 'ssssss', $safeName, $safeEmail, $safePhone, $company, $location, $safeMessage);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
}

$subject = 'Truck AC quote request - Singhania Refrigeration';
$body = "New quote request from Singhania Refrigeration website\n\n"
    . "Name: {$safeName}\n"
    . "Phone: {$safePhone}\n"
    . "Email: " . ($safeEmail !== '' ? $safeEmail : 'Not provided') . "\n"
    . "Page: {$sourcePage}\n\n"
    . "Message:\n" . ($safeMessage !== '' ? $safeMessage : 'Not provided') . "\n";

$host = $_SERVER['HTTP_HOST'] ?? 'singhaniarefrigeration.com';
$host = preg_replace('/[^a-zA-Z0-9.\-]/', '', $host);
$from = 'no-reply@' . ($host !== '' ? $host : 'singhaniarefrigeration.com');

$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8',
    'From: Singhania Refrigeration <' . $from . '>',
    'Reply-To: ' . ($safeEmail !== '' ? $safeName . ' <' . $safeEmail . '>' : $from),
    'X-Mailer: PHP/' . phpversion(),
];

$sent = @mail($to, $subject, $body, implode("\r\n", $headers));

header('Location: ' . $redirectPage . '?status=' . ($sent ? 'success' : 'mail-error') . '#quote-form');
exit;
