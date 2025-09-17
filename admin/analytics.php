<?php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/db.php';
require_admin();
$pdo = DB::conn();

$topProducts = $pdo->query("SELECT p.id, p.name, SUM(oi.quantity) as qty, SUM(oi.quantity*oi.price) as revenue
FROM order_items oi JOIN products p ON p.id = oi.product_id
GROUP BY p.id, p.name ORDER BY revenue DESC LIMIT 10")->fetchAll();

$salesByDay = $pdo->query("SELECT DATE(created_at) d, SUM(total_amount) s FROM orders WHERE status IN ('paid','shipped','completed') AND created_at >= DATE_SUB(CURDATE(), INTERVAL 60 DAY) GROUP BY DATE(created_at) ORDER BY d")->fetchAll();

$bookTr = $pdo->query("SELECT DATE(created_at) d, COUNT(*) c FROM bookings GROUP BY DATE(created_at) ORDER BY d DESC LIMIT 60")->fetchAll();
include __DIR__ . '/_header.php';
?>
<h1 style="margin-top:0">Analytics</h1>
<div class="card"><h3 style="margin:0 0 10px 0">Top 10 Products by Revenue</h3>
<pre style="white-space:pre-wrap"><?= e(json_encode($topProducts, JSON_PRETTY_PRINT)) ?></pre></div>
<div class="grid grid-3">
  <div class="card"><h3 style="margin:0 0 10px 0">Sales (60d)</h3><pre><?= e(json_encode($salesByDay, JSON_PRETTY_PRINT)) ?></pre></div>
  <div class="card"><h3 style="margin:0 0 10px 0">Bookings/day</h3><pre><?= e(json_encode($bookTr, JSON_PRETTY_PRINT)) ?></pre></div>
  <div class="card"><h3 style="margin:0 0 10px 0">Notes</h3><div class="muted">Wire this into charts on the FE as needed (e.g., Chart.js).</div></div>
</div>
<?php include __DIR__ . '/_footer.php'; ?>
