<?= $this->extend('admin/layout/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('public/assets/css/admin.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <section class="content" style="padding-top: 0;">
        <div class="container-fluid">

            <div class="top-navbar-container">
                <div class="logo-container">
                    <img src="/img/meraki-logo.png" alt="Meraki Gift Shop Logo" class="meraki-logo">
                </div>
                <div class="search-bar-container">
                    <input type="text" placeholder="Search...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
                <div class="nav-icons-container">
                    <a href="#"><i class="far fa-user"></i></a>
                    <a href="#"><i class="far fa-heart"></i></a>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>


            <nav class="main-navigation">
                <div class="d-flex justify-content-between align-items-center px-4">
                    <ul class="nav-left">
                        <li><a href="<?= url_to('admin-dashboard') ?>">HOME</a></li>
                        <li><a href="<?= url_to('products-index') ?>">PRODUCTS</a></li>
                        <li><a href="<?= url_to('admin-orders') ?>">ORDERS</a></li>
                        <li><a href="<?= url_to('admin-customer') ?>">CUSTOMERS</a></li>
                        <li><a href="<?= url_to('admin-sales-report') ?>">SALES REPORT</a></li>
                    </ul>
                </div>
            </nav>


            <!-- Order Cards -->
            <div class="dashboard-content-area">
                <div class="order-card-container">
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                            <div class="order-card">
                                <img src="<?= base_url('public/assets/img/user-placeholder.jpg') ?>" alt="Profile Picture">
                                <p><strong><?= esc($order['full_name']) ?></strong></p>
                                <p><?= esc($order['contact']) ?></p>
                                <p><?= esc($order['address']) ?></p>
                                <p><?= esc($order['city']) ?>, <?= esc($order['state']) ?> <?= esc($order['zip']) ?></p>
                                <p><?= esc($order['country']) ?></p>
                                <hr>
                                <p><strong>DATE OF ORDER:</strong> <?= esc(date('m/d/Y', strtotime($order['order_date']))) ?></p>
                                <p><strong>TIME OF ORDER:</strong> <?= esc(date('h:i A', strtotime($order['order_date']))) ?></p>
                                <p><strong>MODE OF PAYMENT:</strong> <?= esc(strtoupper($order['payment_method'])) ?></p>
                                <p><strong>FB LINK:</strong> <a href="<?= esc($order['fb_link']) ?>" target="_blank"><?= esc($order['fb_link']) ?></a></p>
                                <div class="btn-group">
                                    <button class="btn btn-outline-danger btn-sm">REJECT ORDER</button>
                                    <button class="btn btn-outline-success btn-sm">ACCEPT ORDER</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No orders found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
