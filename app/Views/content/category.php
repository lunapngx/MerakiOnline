<?php

use App\Models\CategoryModel;

?>
<?= $this->extend('layouts/master') ?>

<?= $this->section('title') ?>Categories<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/main.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container category-page-grid">
        <div class="category-sidebar">
            <h3>Category</h3>
            <nav class="category-list">
                <ul>
                    <?php
                    // Fetch all categories for the sidebar if 'categories' isn't passed from controller
                    // This assumes CategoryModel is available globally or passed
                    $categoryModel = new CategoryModel();
                    $allCategories = $categoryModel->findAll();
                    ?>
                    <?php if (!empty($allCategories)): ?>
                        <?php foreach ($allCategories as $cat): ?>
                            <?php
                            // Prioritize slug for cleaner URLs, fall back to ID if slug is empty
                            $identifier = !empty($cat->slug) ? $cat->slug : $cat->id;
                            ?>
                            <?php if (!empty($identifier)): // Ensure we have a valid identifier ?>
                                <li>
                                    <a href="<?= url_to('category', $identifier) ?>">
                                        <?= esc($cat->name) ?> <i class="bi bi-chevron-right"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><p>No categories found.</p></li>
                    <?php endif; ?>
            </nav>
        </div>

        <div class="category-main-content">
            <div class="search-filter-bar">
                <input type="text" placeholder="Search products in this category...">
                <button><i class="bi bi-search"></i></button>
                <select>
                    <option value="">Sort By</option>
                    <option value="price-asc">Price: Low to High</option>
                    <option value="price-desc">Price: High to Low</option>
                    <option value="name-asc">Rose</option>
                </select>
            </div>

            <?php if (isset($products) && !empty($products) && is_array($products)): ?>
                <div class="category-product-grid">
                    <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <a href="<?= url_to('product_detail', $product['id']) ?>">
                                <div class="product-image">
                                    <img src="<?= base_url('public/assets/img/' . $product['image']) ?>"
                                         alt="<?= esc($product['name']) ?>">
                                </div>
                            </a>
                            <div class="product-info">
                                <h3>
                                    <a href="<?= url_to('product_detail', $product['id']) ?>"><?= esc($product['name']) ?></a>
                                </h3>
                                <p class="price">₱<?= esc(number_format($product['price'], 2)) ?></p>
                                <form action="<?= url_to('cart_add') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="product_id" value="<?= esc($product['id']) ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn-add-to-cart">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No products found in this category.</p>
            <?php endif; ?>

        </div>
    </div>
    <script>
        var lastUpdateTimestamp = 0;

        function pollForNewProducts() {
            $.ajax({
                url: '<?= url_to('api_check_products') ?>',
                type: 'GET',
                data: { last_update: lastUpdateTimestamp },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        lastUpdateTimestamp = response.last_update;

                        // You need to implement this part based on your HTML structure
                        var newProductsHtml = '';
                        response.products.forEach(function(product) {
                            newProductsHtml += `
                            <div class="col-md-6 col-lg-3">
                                <div class="product-card">
                                    <div class="product-image">
                                        <img src="<?= base_url() ?>${product.image}" class="img-fluid" alt="${product.name}">
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="<?= base_url('product') ?>/${product.id}">${product.name}</a></h3>
                                        <div class="product-price">
                                            <span class="current-price">₱${parseFloat(product.price).toFixed(2)}</span>
                                        </div>
                                        <button class="btn btn-add-to-cart">
                                            <i class="bi bi-bag-plus me-2"></i>Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                        });

                        // Prepend the new products to the list on your page.
                        // Assuming you have a container with the class 'row gy-4' on your homepage and 'category-product-grid' on your category page.
                        $('.row.gy-4, .category-product-grid').prepend(newProductsHtml);

                        // Optional: Show a temporary notification
                        $('body').append('<div class="alert alert-info fixed-bottom m-3">New products have been added!</div>');
                        setTimeout(function() {
                            $('.alert').remove();
                        }, 5000);

                        pollForNewProducts(); // Restart the poll
                    } else if (response.status === 'no_update') {
                        pollForNewProducts(); // If no update, restart the poll to wait for the next check
                    }
                },
                error: function() {
                    // Handle potential errors by retrying the poll after a delay
                    setTimeout(pollForNewProducts, 5000);
                }
            });
        }

        $(document).ready(function() {
            // Start the long polling when the page loads
            // You might need to include a link to jQuery in your master layout for this to work.
            // It seems your `main.js` already uses it.
            pollForNewProducts();
        });
    </script>

<?= $this->endSection() ?>