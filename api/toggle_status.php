<?php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/db.php';
require_admin();
header('Content-Type: application/json');
$tbl = $_POST['table'] ?? '';
$id = (int)($_POST['id'] ?? 0);
$field = $_POST['field'] ?? 'status';
$value = $_POST['value'] ?? null;
$allowed = ['users','products','categories','experiences','bookings','orders','disputes'];
if (!in_array($tbl, $allowed, true) || $id<=0) {
    http_response_code(400);
    echo json_encode(['ok'=>false,'error'=>'Bad request']);
    exit;
}
$pdo = DB::conn();
$stmt = $pdo->prepare("UPDATE `$tbl` SET `$field` = ? WHERE id = ?");
$stmt->execute([$value, $id]);
echo json_encode(['ok'=>true]);
