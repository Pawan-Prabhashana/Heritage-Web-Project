<?php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/auth.php';
start_session();
if (current_user() && current_user()['role']==='artisan') {
    header('Location: /heritage/pages/artist_dashboard.php'); exit;
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
            if (current_user()['role']!=='artisan') {
                $error = 'This login is only for artisan accounts.';
                auth_logout();
            } else {
                header('Location: /heritage/pages/artist_dashboard.php'); exit;
            }
        } else {
            $error = $res['error'];
        }
    }
}
$token = csrf_token();
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Artisan Login • Heritage</title>
<style>
body{display:grid;place-items:center;min-height:100vh;background:
.card{background:
input{width:100%;margin:6px 0;background:
.btn{width:100%;padding:10px;border-radius:10px;border:1px solid 
.err{color:
</style></head><body>
<form class="card" method="post">
  <h2 style="margin:0 0 8px 0">Artisan Login</h2>
  <?php if ($error): ?><div class="err"><?= e($error) ?></div><?php endif; ?>
  <input type="hidden" name="csrf" value="<?= e($token) ?>">
  <label>Email</label><input type="email" name="email" required>
  <label>Password</label><input type="password" name="password" required>
  <button class="btn">Sign in</button>
</form>
</body></html>
