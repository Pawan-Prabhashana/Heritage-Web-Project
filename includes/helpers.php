<?php

require_once __DIR__ . '/../config.php';

function start_session() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_name(SESSION_NAME);
        session_start();
    }
}

function csrf_token() {
    start_session();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_check($token) {
    start_session();
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function e($str) {
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}

function redirect($url) {
    header("Location: $url");
    exit;
}

function current_user() {
    start_session();
    return $_SESSION['user'] ?? null;
}

function require_admin() {
    start_session();
    if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'admin') {
        redirect('/heritage/admin/login.php');
    }
}
?>

function require_artisan() {
    start_session();
    if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'artisan') {
        redirect('/heritage/pages/login.php');
    }
}
function ensure_storage_dirs() {
    $base = __DIR__ . '/../storage';
    $dirs = [$base, $base.'/uploads', $base.'/logs'];
    foreach ($dirs as $d) {
        if (!is_dir($d)) @mkdir($d, 0775, true);
    }
}
function save_upload($file, $subdir='') {
    ensure_storage_dirs();
    if (!isset($file) || ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) return [false, 'No file uploaded'];
    $allowed = ['image/jpeg','image/png','image/webp','image/gif'];
    $mime = mime_content_type($file['tmp_name']);
    if (!in_array($mime, $allowed, true)) return [false, 'Unsupported file type'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $name = bin2hex(random_bytes(8)) . '.' . strtolower($ext ?: 'jpg');
    $targetDir = __DIR__ . '/../storage/uploads' . ($subdir ? '/'.$subdir : '');
    if (!is_dir($targetDir)) @mkdir($targetDir, 0775, true);
    $target = $targetDir . '/' . $name;
    if (!move_uploaded_file($file['tmp_name'], $target)) return [false, 'Failed to move upload'];
    $rel = '/heritage/storage/uploads' . ($subdir ? '/'.$subdir : '') . '/' . $name;
    return [true, $rel];
}
