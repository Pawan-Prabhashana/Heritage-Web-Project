<?php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/db.php';
require_admin();
$pdo = DB::conn();

$users_total = (int)$pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$products_total = (int)$pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
$orders_total = (int)$pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();
$bookings_total = (int)$pdo->query("SELECT COUNT(*) FROM bookings")->fetchColumn();

$stmt = $pdo->query("SELECT DATE(created_at) d, SUM(total_amount) s FROM orders WHERE status IN ('paid','shipped','completed') AND created_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) GROUP BY DATE(created_at) ORDER BY d ASC");
$sales = $stmt->fetchAll();
include __DIR__ . '/_header.php';
?>
<h1 style="margin-top:0">Dashboard</h1>
<div class="grid grid-3">
  <div class="card"><div class="muted">Users</div><div class="kpi"><?= e($users_total) ?></div></div>
  <div class="card"><div class="muted">Products</div><div class="kpi"><?= e($products_total) ?></div></div>
  <div class="card"><div class="muted">Orders</div><div class="kpi"><?= e($orders_total) ?></div></div>
</div>
<div class="card">
  <div class="muted">Bookings (total)</div>
  <div class="kpi"><?= e($bookings_total) ?></div>
</div>
<div class="card">
  <h3 style="margin:0 0 12px 0">Sales (Last 30 days)</h3>
  <div class="muted">Data points: <?= count($sales) ?></div>
  <div class="muted">Tip: Hook this into a chart library on the front-end if needed.</div>
  <pre style="white-space:pre-wrap"><?= e(json_encode($sales, JSON_PRETTY_PRINT)) ?></pre>
</div>
<?php include __DIR__ . '/_footer.php'; ?>
