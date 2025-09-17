<?php
require_once __DIR__ . '/_artist_header.php';
$pdo = DB::conn();
$uid = $me['id'];
$err = null; $ok = null;
$pdo->prepare("INSERT IGNORE INTO artisans (user_id) VALUES (?)")->execute([$uid]);
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) {
        $err = 'Invalid CSRF token';
    } else {
        if (isset($_POST['update_profile'])) {
            $bio = $_POST['bio'] ?? '';
            $region = $_POST['region'] ?? '';
            $skills = $_POST['skills'] ?? '';
            $stmt = $pdo->prepare("UPDATE artisans SET bio=?, region=?, skills=? WHERE user_id=?");
            $stmt->execute([$bio,$region,$skills,$uid]);
            $ok = 'Profile updated.';
        } elseif (isset($_POST['update_password'])) {
            require_once __DIR__ . '/../includes/auth.php';
            $pwd = $_POST['password'] ?? '';
            $pwd2 = $_POST['password2'] ?? '';
            if ($pwd && $pwd === $pwd2) {
                $hash = password_hash_heritage($pwd);
                $pdo->prepare("UPDATE users SET password_hash=? WHERE id=?")->execute([$hash,$uid]);
                $ok = 'Password changed.';
            } else $err = 'Passwords do not match';
        }
    }
}
$profile = $pdo->prepare("SELECT * FROM artisans WHERE user_id=?"); $profile->execute([$uid]); $profile = $profile->fetch();
$token = csrf_token();
?>
<h1 style="margin-top:0">My Profile</h1>
<?php if ($err): ?><div class="card" style="border-color:
<?php if ($ok): ?><div class="card" style="border-color:
<div class="grid">
  <form class="card" method="post">
    <h3 style="margin-top:0">Profile</h3>
    <input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>">
    <input type="hidden" name="update_profile" value="1">
    <label>Region</label>
    <input name="region" value="<?= htmlspecialchars($profile['region'] ?? '') ?>">
    <label>Skills (comma separated)</label>
    <input name="skills" value="<?= htmlspecialchars($profile['skills'] ?? '') ?>">
    <label>Bio</label>
    <textarea name="bio" rows="6"><?= htmlspecialchars($profile['bio'] ?? '') ?></textarea>
    <button class="btn btn-primary">Save</button>
  </form>
  <form class="card" method="post">
    <h3 style="margin-top:0">Security</h3>
    <input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>">
    <input type="hidden" name="update_password" value="1">
    <label>New Password</label>
    <input name="password" type="password" required>
    <label>Confirm Password</label>
    <input name="password2" type="password" required>
    <button class="btn">Change Password</button>
  </form>
</div>
<?php require_once __DIR__ . '/_artist_footer.php'; ?>
