<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>
    <div class="content-wrapper">
        <section class="content" style="padding-top: 0;">
            <div class="container-fluid">
                <div class="dashboard-content-area">
                    <div class="row info-cards-row">
                        <div class="col-lg-3 col-6">
                            <div class="info-card">
                                <div class="inner">
                                    <p>TOTAL SALES</p>
                                    <h3>₱ <?= esc(number_format($total_sales ?? 0, 2)) ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="info-card">
                                <div class="inner">
                                    <p>WEEKLY ORDERS</p>
                                    <h3><?= esc($weekly_orders ?? 0) ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="info-card">
                                <div class="inner">
                                    <p>CUSTOMERS</p>
                                    <h3><?= esc($total_customers ?? 0) ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="info-card">
                                <div class="inner">
                                    <p>PRODUCTS</p>
                                    <h3><?= esc($total_products ?? 0) ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-display-section row">
                        <div class="col-md-6">
                            <div class="product-item">
                                <img src="/img/product1.png" alt="Product 1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-item">
                                <img src="/img/product2.png" alt="Product 2">
                            </div>
                        </div>
                    </div>
                </div>
            </div></section>
    </div>
<?= $this->endSection() ?>