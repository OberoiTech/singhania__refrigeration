<?php
// enquirypopup.php
declare(strict_types=1);

header('Content-Type: application/json');

require_once __DIR__ . '/admin/config.php'; // must define $conn (mysqli)

$response = ['status' => 'error', 'message' => 'Unknown error'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

/** read + trim */
$name   = trim($_POST['name']   ?? '');
$email  = trim($_POST['email']  ?? '');
$mobile = trim($_POST['mobile'] ?? '');

/** minimal validation (kept lightweight) */
if ($name === '' || $email === '' || $mobile === '') {
    echo json_encode(['status' => 'error', 'message' => 'Name, email, and mobile are required']);
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid email']);
    exit;
}

/** prepared insert */
$sql = "INSERT INTO popup_enquiry
        (name, email, mobile, company, location, projects, message)
        VALUES (?, ?, ?, NULL, NULL, NULL, NULL)";

if (!$stmt = $conn->prepare($sql)) {
    echo json_encode(['status' => 'error', 'message' => 'DB prepare failed']);
    exit;
}

$stmt->bind_param('sss', $name, $email, $mobile);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'id' => $stmt->insert_id]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'DB execute failed']);
}

$stmt->close();
$conn->close();
