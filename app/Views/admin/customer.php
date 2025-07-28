<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

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
