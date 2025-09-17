<?php
require_once __DIR__ . '/_artist_header.php';
$pdo = DB::conn();
$uid = $me['id'];
$err=null;$ok=null;
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) { $err='Invalid CSRF token'; }
    else {
        if (isset($_POST['create'])) {
            $name = $_POST['name'] ?? '';
            $desc = $_POST['description'] ?? '';
            $price = (float)($_POST['price'] ?? 0);
            $stock = (int)($_POST['stock'] ?? 0);
            $cat = (int)($_POST['category_id'] ?? 0);
            $pdo->prepare("INSERT INTO products (artisan_id,category_id,name,description,price,stock,status) VALUES (?,?,?,?,?,?, 'active')")
                ->execute([$uid,$cat,$name,$desc,$price,$stock]);
            $pid = (int)$pdo->lastInsertId();
            $pdo->prepare("INSERT INTO low_stock_alerts (product_id, threshold) VALUES (?, ?)")->execute([$pid, 5]);
            if (!empty($_FILES['image']['name'])) {
              require_once __DIR__ . '/../includes/helpers.php';
              [$okUp,$path] = save_upload($_FILES['image'], 'products');
              if ($okUp) {
                $pdo->prepare("INSERT INTO product_images (product_id,url,is_primary) VALUES (?,?,1)")->execute([$pid,$path]);
              }
            }
            $ok='Product created.';
        } elseif (isset($_POST['update'])) {
            $pid=(int)$_POST['id'];
            $name = $_POST['name'] ?? '';
            $desc = $_POST['description'] ?? '';
            $price = (float)($_POST['price'] ?? 0);
            $stock = (int)($_POST['stock'] ?? 0);
            $cat = (int)($_POST['category_id'] ?? 0);
            $pdo->prepare("UPDATE products SET category_id=?, name=?, description=?, price=?, stock=? WHERE id=? AND artisan_id=?")
                ->execute([$cat,$name,$desc,$price,$stock,$pid,$uid]);
            if (!empty($_FILES['image']['name'])) {
              require_once __DIR__ . '/../includes/helpers.php';
              [$okUp,$path] = save_upload($_FILES['image'], 'products');
              if ($okUp) {
                $pdo->prepare("UPDATE product_images SET is_primary=0 WHERE product_id=?")->execute([$pid]);
                $pdo->prepare("INSERT INTO product_images (product_id,url,is_primary) VALUES (?,?,1)")->execute([$pid,$path]);
              }
            }
            $ok='Product updated.';
        } elseif (isset($_POST['delete'])) {
            $pid=(int)$_POST['id'];
            $pdo->prepare("DELETE FROM products WHERE id=? AND artisan_id=?")->execute([$pid,$uid]);
            $ok='Product deleted.';
        } elseif (isset($_POST['add_variant'])) {
            $pid=(int)$_POST['product_id'];
            $attr = $_POST['attr_name'] ?? '';
            $val = $_POST['attr_value'] ?? '';
            $pd = (float)($_POST['price_delta'] ?? 0);
            $sd = (int)($_POST['stock_delta'] ?? 0);
            $pdo->prepare("INSERT INTO product_variants (product_id,attr_name,attr_value,price_delta,stock_delta) VALUES (?,?,?,?,?)")
                ->execute([$pid,$attr,$val,$pd,$sd]);
            $ok='Variant added.';
        } elseif (isset($_POST['delete_variant'])) {
            $vid=(int)$_POST['variant_id'];
            $pdo->prepare("DELETE pv FROM product_variants pv JOIN products p ON p.id=pv.product_id WHERE pv.id=? AND p.artisan_id=?")
                ->execute([$vid,$uid]);
            $ok='Variant removed.';
        } elseif (isset($_POST['set_threshold'])) {
            $pid=(int)$_POST['product_id'];
            $thr=(int)$_POST['threshold'];
            $pdo->prepare("INSERT INTO low_stock_alerts (product_id, threshold) VALUES(?,?) ON DUPLICATE KEY UPDATE threshold=VALUES(threshold)")
                ->execute([$pid,$thr]);
            $ok='Low stock threshold updated.';
        }
    }
}
$cats = $pdo->query("SELECT id,name FROM categories WHERE is_active=1 ORDER BY name")->fetchAll();
$products = $pdo->prepare("SELECT p.*, (SELECT url FROM product_images WHERE product_id=p.id AND is_primary=1 LIMIT 1) as image FROM products p WHERE artisan_id=? ORDER BY id DESC");
$products->execute([$uid]); $products = $products->fetchAll();
$token = csrf_token();
?>
<h1 style="margin-top:0">Products</h1>
<?php if ($err): ?><div class="card" style="border-color:
<?php if ($ok): ?><div class="card" style="border-color:
<div class="card">
  <h3 style="margin-top:0">Add Product</h3>
  <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>">
    <input type="hidden" name="create" value="1">
    <div class="grid">
      <div>
        <label>Name</label><input name="name" required>
        <label>Category</label>
        <select name="category_id"><?php foreach($cats as $c): ?><option value="<?= (int)$c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option><?php endforeach; ?></select>
        <label>Price</label><input name="price" type="number" step="0.01" required>
        <label>Stock</label><input name="stock" type="number" min="0" required>
      </div>
      <div>
        <label>Primary Image</label><input type="file" name="image" accept="image/*">
        <label>Description</label><textarea name="description" rows="8"></textarea>
      </div>
    </div>
    <button class="btn btn-primary">Create</button>
  </form>
</div>
<div class="card">
  <h3 style="margin-top:0">Your Products</h3>
  <table>
    <thead><tr><th>Item</th><th>Price</th><th>Stock</th><th>Variants</th><th>Low-stock</th><th>Actions</th></tr></thead>
    <tbody>
    <?php foreach($products as $p): 
      $pid=(int)$p['id'];
      $vars = $pdo->prepare("SELECT * FROM product_variants WHERE product_id=?"); $vars->execute([$pid]); $vars = $vars->fetchAll();
      $thr = $pdo->prepare("SELECT threshold FROM low_stock_alerts WHERE product_id=?"); $thr->execute([$pid]); $thr = $thr->fetchColumn();
    ?>
      <tr>
        <td>
          <div style="display:flex;gap:12px;align-items:flex-start">
            <?php if($p['image']): ?><img src="<?= htmlspecialchars($p['image']) ?>" style="width:64px;height:64px;object-fit:cover;border-radius:8px"><?php endif; ?>
            <div>
              <div style="font-weight:600"><?= htmlspecialchars($p['name']) ?></div>
              <div class="badge"><?= htmlspecialchars($p['status']) ?></div>
              <div class="muted"><?= htmlspecialchars(mb_strimwidth($p['description'] ?? '',0,120,'…','UTF-8')) ?></div>
            </div>
          </div>
        </td>
        <td>LKR <?= number_format($p['price'],2) ?></td>
        <td><?= (int)$p['stock'] ?></td>
        <td>
          <?php foreach($vars as $v): ?>
            <div class="badge"><?= htmlspecialchars($v['attr_name']) ?>: <?= htmlspecialchars($v['attr_value']) ?> (Δ <?= (float)$v['price_delta'] ?> / <?= (int)$v['stock_delta'] ?>)
              <form style="display:inline" method="post"><input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>"><input type="hidden" name="variant_id" value="<?= (int)$v['id'] ?>"><input type="hidden" name="delete_variant" value="1"><button class="btn" style="margin-left:6px">x</button></form>
            </div>
          <?php endforeach; ?>
          <form method="post" class="badge" style="margin-top:8px">
            <input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>">
            <input type="hidden" name="add_variant" value="1"><input type="hidden" name="product_id" value="<?= $pid ?>">
            <input name="attr_name" placeholder="Size/Color" style="width:120px">
            <input name="attr_value" placeholder="M/Blue" style="width:110px">
            <input name="price_delta" type="number" step="0.01" placeholder="+0.00" style="width:90px">
            <input name="stock_delta" type="number" placeholder="+0" style="width:80px">
            <button class="btn">Add</button>
          </form>
        </td>
        <td>
          <form method="post">
            <input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>">
            <input type="hidden" name="set_threshold" value="1"><input type="hidden" name="product_id" value="<?= $pid ?>">
            <input name="threshold" type="number" value="<?= (int)($thr ?: 5) ?>" style="width:80px"> <button class="btn">Save</button>
          </form>
        </td>
        <td>
          <details>
            <summary class="btn">Edit</summary>
            <form method="post" enctype="multipart/form-data" style="margin-top:8px">
              <input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>">
              <input type="hidden" name="update" value="1">
              <input type="hidden" name="id" value="<?= $pid ?>">
              <label>Name</label><input name="name" value="<?= htmlspecialchars($p['name']) ?>">
              <label>Category</label><select name="category_id"><?php foreach($cats as $c): ?><option value="<?= (int)$c['id'] ?>" <?= $p['category_id']==$c['id']?'selected':'' ?>><?= htmlspecialchars($c['name']) ?></option><?php endforeach; ?></select>
              <label>Price</label><input name="price" type="number" step="0.01" value="<?= htmlspecialchars($p['price']) ?>">
              <label>Stock</label><input name="stock" type="number" value="<?= (int)$p['stock'] ?>">
              <label>New Primary Image</label><input type="file" name="image" accept="image/*">
              <label>Description</label><textarea name="description" rows="6"><?= htmlspecialchars($p['description']) ?></textarea>
              <button class="btn btn-primary">Update</button>
            </form>
          </details>
          <form method="post" onsubmit="return confirm('Delete product?')" style="margin-top:6px">
            <input type="hidden" name="csrf" value="<?= htmlspecialchars($token) ?>">
            <input type="hidden" name="delete" value="1"><input type="hidden" name="id" value="<?= $pid ?>">
            <button class="btn">Delete</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php require_once __DIR__ . '/_artist_footer.php'; ?>
