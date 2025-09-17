<?php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/auth.php';
start_session();
if (current_user() && current_user()['role']==='admin') {
    redirect('/heritage/admin/dashboard.php');
}
$error = null;
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) {
        $error = 'Invalid CSRF token';
    } else {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $res = auth_login($email,$password);
        if ($res['ok']) {
            if (current_user()['role']!=='admin') {
                $error = 'You are not authorized to access admin.';
                auth_logout();
            } else {
                redirect('/heritage/admin/dashboard.php');
            }
        } else {
            $error = $res['error'];
        }
    }
}
$token = csrf_token();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= e(APP_NAME) ?> • Admin Login</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    body{display:grid;place-items:center;height:100vh;background:
    .card{background:
    input{width:100%;margin:6px 0;background:
    .btn{width:100%;padding:10px;border-radius:10px;border:1px solid 
    .err{color:
  </style>
</head>
<body>
  <form class="card" method="post">
    <h2 style="margin:0 0 8px 0">Admin Login</h2>
    <?php if ($error): ?><div class="err"><?= e($error) ?></div><?php endif; ?>
    <input type="hidden" name="csrf" value="<?= e($token) ?>">
    <label>Email</label>
    <input name="email" required type="email" placeholder="admin@example.com">
    <label>Password</label>
    <input name="password" required type="password" placeholder="••••••••">
    <button class="btn" type="submit">Sign in</button>
  </form>
</body>
</html>
