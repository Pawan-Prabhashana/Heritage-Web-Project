<?php
require_once __DIR__ . '/_artist_header.php';
$pdo = DB::conn();
$uid = $me['id'];
$err=null;$ok=null;
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) $err='Invalid CSRF';
    else {
        $oid=(int)($_POST['order_id'] ?? 0);
        $act=$_POST['action'] ?? '';
        if (in_array($act, ['accept','decline','fulfilled'], true)) {
            $stmt=$pdo->prepare("UPDATE orders o
                JOIN order_items oi ON oi.order_id=o.id
                JOIN products p ON p.id=oi.product_id
                SET o.artisan_status=?
                WHERE o.id=? AND p.artisan_id=?");
            $stmt->execute([$act,$oid,$uid]);
            $ok="Order $act";
        }
    }
}
$sql = "SELECT o.*, SUM(oi.quantity*oi.price) as subtotal
        FROM orders o
        JOIN order_items oi ON oi.order_id=o.id
        JOIN products p ON p.id=oi.product_id
        WHERE p.artisan_id=?
        GROUP BY o.id
        ORDER BY o.id DESC";
$orders = $pdo->prepare($sql); $orders->execute([$uid]); $orders = $orders->fetchAll();
$token = csrf_token();
?>
<h1 style="margin-top:0">Orders</h1>
<?php if ($err): ?><div class="card" style="border-color:
<?php if ($ok): ?><div class="card" style="border-color:
<div class="card">
  <table>
    <thead><tr><th>
    <tbody>
      <?php foreach($orders as $o): ?>
      <tr>
        <td>
        <td><?= htmlspecialchars($o['created_at']) ?></td>
        <td><span class="badge"><?= htmlspecialchars($o['status']) ?></span></td>
        <td><span class="badge"><?= htmlspecialchars($o['artisan_status']) ?></span></td>
        <td>LKR <?= number_format($o['subtotal'],2) ?></td>
        <td>
          <form method="post" style="display:inline"><input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>"><input type="hidden" name="order_id" value="<?= (int)$o['id'] ?>"><input type="hidden" name="action" value="accept"><button class="btn">Accept</button></form>
          <form method="post" style="display:inline"><input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>"><input type="hidden" name="order_id" value="<?= (int)$o['id'] ?>"><input type="hidden" name="action" value="decline"><button class="btn">Decline</button></form>
          <form method="post" style="display:inline"><input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>"><input type="hidden" name="order_id" value="<?= (int)$o['id'] ?>"><input type="hidden" name="action" value="fulfilled"><button class="btn">Mark Fulfilled</button></form>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php require_once __DIR__ . '/_artist_footer.php'; ?>
