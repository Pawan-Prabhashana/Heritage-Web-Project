<?php

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/helpers.php';

function password_hash_heritage($password) {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 11]);
}

function auth_login($email, $password) {
    $pdo = DB::conn();
    $stmt = $pdo->prepare("SELECT id, name, email, password_hash, role, status FROM users WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password_hash'])) {
        if ($user['status'] !== 'active') {
            return ['ok' => false, 'error' => 'Account is not active'];
        }
        start_session();
        $_SESSION['user'] = [
            'id' => (int)$user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'],
        ];
        return ['ok' => true];
    }
    return ['ok' => false, 'error' => 'Invalid credentials'];
}

function auth_logout() {
    start_session();
    $_SESSION = [];
    session_destroy();
}

?>
