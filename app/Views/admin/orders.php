<?= $this->extend('admin/layout/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/admin.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container admin-dashboard-page">
        <div class="admin-header-nav mb-4 bg-white py-3 shadow-sm rounded-bottom">
            <div class="container d-flex justify-content-center">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" href="<?= url_to('admin-dashboard') ?>">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= url_to('admin_products') ?>">PRODUCTS</a></li>
                    <li class="nav-item"><a class="nav-link active" href="<?= url_to('admin_orders') ?>">ORDERS</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= url_to('admin_sales_report') ?>">SALES REPORT</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= url_to('admin_account') ?>">ADMIN ACCOUNT</a></li>
                </ul>
            </div>
        </div>

        <h2>Manage Orders</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <table class="table table-hover" id="orders-table">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                            <tr id="order-row-<?= esc($order['id']) ?>">
                                <td><?= esc($order['id']) ?></td>
                                <td><?= esc($order['username']) ?></td>
                                <td>₱<?= esc(number_format($order['total_amount'], 2)) ?></td>
                                <td class="order-status-cell"><?= esc(ucfirst($order['status'])) ?></td>
                                <td>
                                    <button class="btn btn-success btn-sm confirm-order-btn" data-order-id="<?= esc($order['id']) ?>">Confirm</button>
                                    <button class="btn btn-danger btn-sm cancel-order-btn" data-order-id="<?= esc($order['id']) ?>">Cancel</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No orders found.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        // Add this JavaScript at the bottom of your file or in a separate script file
        <script>
            // This is where the real-time listening code would go.
            // It would listen for an event like "new_order" and dynamically add a new row to the table.
            // When the admin clicks 'Confirm' or 'Cancel', it would send a request to your backend to update the status.
        </script>

    </div>
<?= $this->endSection() ?>