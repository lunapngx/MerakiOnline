<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>
    <h1>Admin Dashboard</h1>
    <p>Welcome to the main administration area. Use the menu on the left to navigate.</p>

    <div style="display: flex; gap: 20px;">
        <div style="background-color: #e8f5e9; padding: 20px; border-radius: 8px;">
            <h3>Total Products</h3>
            <p style="font-size: 2em;"><?= $product_count ?></p>
        </div>
        <div style="background-color: #e3f2fd; padding: 20px; border-radius: 8px;">
            <h3>Total Orders</h3>
            <p style="font-size: 2em;">0</p> </div>
    </div>
<?= $this->endSection() ?>