<?php
require_once __DIR__ . '/_artist_header.php';
$pdo = DB::conn();
$uid = $me['id'];
$err=null;$ok=null;
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) $err='Invalid CSRF';
    else {
        $bid=(int)($_POST['booking_id'] ?? 0);
        $act=$_POST['action'] ?? '';
        if (in_array($act,['accept','decline','completed'], true)) {
            $stmt = $pdo->prepare("UPDATE bookings b
              JOIN experiences e ON e.id=b.experience_id
              SET b.artisan_status=?
              WHERE b.id=? AND e.artisan_id=?");
            $stmt->execute([$act,$bid,$uid]);
            $ok = "Booking $act";
        } elseif ($act==='schedule') {
            $dt = $_POST['scheduled_at'] ?? null;
            $stmt = $pdo->prepare("UPDATE bookings b JOIN experiences e ON e.id=b.experience_id SET b.scheduled_at=? WHERE b.id=? AND e.artisan_id=?");
            $stmt->execute([$dt,$bid,$uid]);
            $ok = "Booking scheduled";
        }
    }
}
$sql = "SELECT b.*, e.title FROM bookings b JOIN experiences e ON e.id=b.experience_id WHERE e.artisan_id=? ORDER BY b.id DESC";
$rows = $pdo->prepare($sql); $rows->execute([$uid]); $rows = $rows->fetchAll();
$token = csrf_token();
?>
<h1 style="margin-top:0">Bookings</h1>
<?php if ($err): ?><div class="card" style="border-color:
<?php if ($ok): ?><div class="card" style="border-color:
<div class="card">
  <table>
    <thead><tr><th>
    <tbody>
      <?php foreach($rows as $r): ?>
      <tr>
        <td>
        <td><?= htmlspecialchars($r['title']) ?></td>
        <td><?= htmlspecialchars($r['scheduled_at'] ?? '—') ?></td>
        <td><?= (int)$r['seats'] ?></td>
        <td><span class="badge"><?= htmlspecialchars($r['status']) ?></span></td>
        <td><span class="badge"><?= htmlspecialchars($r['artisan_status']) ?></span></td>
        <td>
          <form method="post" style="display:inline"><input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>"><input type="hidden" name="booking_id" value="<?= (int)$r['id'] ?>"><input type="hidden" name="action" value="accept"><button class="btn">Accept</button></form>
          <form method="post" style="display:inline"><input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>"><input type="hidden" name="booking_id" value="<?= (int)$r['id'] ?>"><input type="hidden" name="action" value="decline"><button class="btn">Decline</button></form>
          <form method="post" style="display:inline"><input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>"><input type="hidden" name="booking_id" value="<?= (int)$r['id'] ?>"><input type="hidden" name="action" value="completed"><button class="btn">Completed</button></form>
          <details style="display:inline-block;margin-left:6px">
            <summary class="btn">Schedule</summary>
            <form method="post" style="margin-top:6px">
              <input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>">
              <input type="hidden" name="booking_id" value="<?= (int)$r['id'] ?>">
              <input type="hidden" name="action" value="schedule">
              <input name="scheduled_at" type="datetime-local" value="">
              <button class="btn">Save</button>
            </form>
          </details>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php require_once __DIR__ . '/_artist_footer.php'; ?>
