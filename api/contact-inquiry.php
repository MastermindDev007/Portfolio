<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
if (!is_array($input)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'message' => 'Invalid payload']);
    exit;
}

$name = trim((string) ($input['name'] ?? ''));
$email = trim((string) ($input['email'] ?? ''));
$subject = trim((string) ($input['subject'] ?? ''));
$message = trim((string) ($input['message'] ?? ''));

if ($name === '' || $email === '' || $subject === '' || $message === '') {
    http_response_code(422);
    echo json_encode(['ok' => false, 'message' => 'Missing fields']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'message' => 'Invalid email']);
    exit;
}

$dataFile = __DIR__ . '/../data/inquiries.json';
$existing = [];
if (file_exists($dataFile)) {
    $decoded = json_decode(file_get_contents($dataFile), true);
    if (is_array($decoded)) {
        $existing = $decoded;
    }
}

$nextId = 1;
if (!empty($existing)) {
    $ids = array_map(static fn($row) => (int) ($row['id'] ?? 0), $existing);
    $nextId = max($ids) + 1;
}

$existing[] = [
    'id' => $nextId,
    'name' => $name,
    'email' => $email,
    'subject' => $subject,
    'message' => $message,
    'status' => 'new',
    'source' => 'portfolio-contact-form',
    'createdAt' => date('c')
];

file_put_contents($dataFile, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

echo json_encode(['ok' => true]);