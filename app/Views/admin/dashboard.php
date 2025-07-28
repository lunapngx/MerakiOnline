<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>
    <div class="content-wrapper">
        <div class="content-header" style="display: none;">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= url_to('admin-dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div></div></div></div>
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
                    <ul>
                        <li><a href="<?= url_to('admin-dashboard') ?>">HOME</a></li>
                        <li><a href="<?= url_to('products-index') ?>">PRODUCTS</a></li>
                        <li><a href="<?= url_to('admin-orders') ?>">ORDERS</a></li>
                        <li><a href="<?= url_to('admin-users') ?>">CUSTOMERS</a></li>
                        <li><a href="#">SALES REPORT</a></li>
                    </ul>
                </nav>
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