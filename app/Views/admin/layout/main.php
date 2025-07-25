<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Admin Panel' ?></title>
    <style>
        body { font-family: sans-serif; display: flex; }
        .sidebar { width: 250px; background-color: #2c3e50; color: white; padding: 20px; min-height: 100vh; }
        .sidebar a { color: white; text-decoration: none; display: block; padding: 10px 0; }
        .sidebar a:hover { text-decoration: underline; }
        .content { flex-grow: 1; padding: 20px; }
        .header { background-color: #ecf0f1; padding: 10px 20px; text-align: right; }
    </style>
</head>
<body>
<div class="sidebar">
    <h2>Admin Menu</h2>
    <a href="<?= url_to('admin-dashboard') ?>">Dashboard</a>
    <a href="<?= url_to('products-index') ?>">Products</a>
    <a href="#">Orders</a>
    <a href="#">Categories</a>
    <hr>
    <a href="<?= url_to('logout') ?>">Logout</a>
</div>

<div class="content">
    <div class="header">
        Logged in as: <strong><?= user()->email ?? 'Admin' ?></strong>
    </div>

    <main>
        <?= $this->renderSection('content') ?>
    </main>
</div>
</body>
</html>