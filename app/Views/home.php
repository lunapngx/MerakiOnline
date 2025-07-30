</nav><?= $this->extend('layouts/master') ?>

<?= $this->section('title') ?>Meraki Shop<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="ecommerce-hero-1 hero section" id="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 content-col" data-aos="fade-right" data-aos-delay="100">
                <div class="content">
                    <span class="promo-badge"></span>
                    <h1><b>Meraki <span>Shop</span></b></h1>
                    <p style="word-spacing: 10px;">Meraki shopping cart system is a heartfelt brand that offers handmade crafts created with soul, creativity, and love. Specializing in crochet pieces, pins, fuzzy crafts, ribbon flower bouquets, other handcrafted pieces and customizable gift packages, Meraki transforms thoughtful gestures into tangible expressions of care. Every product is lovingly handcrafted to bring joy—not just to customers, but also to the special people they gift them to. Whether delivered personally or shipped with care, Meraki aims to create moments of happiness through meaningful, artfully made gifts</p>
                    <div class="hero-cta">
                        <a href="#best-sellers-section" class="btn btn-shop">Shop Now <i class="bi bi-arrow-right"></i></a>
                        <?php if (!auth()->loggedIn()): ?>
                            <a href="<?= url_to('login') ?>" class="btn btn-collection">View Collection</a>
                        <?php else: ?>
                            <a href="<?= url_to('collection') ?>" class="btn btn-collection">View Collection</a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 image-col d-flex justify-content-center align-items-center" data-aos="fade-left" data-aos-delay="200">
                <img src="<?= base_url('assets/img/meraki-landingpage.png') ?>" class="img-fluid custom-image-style" alt="Meraki Shop Hero Image">
            </div>
        </div>
    </div>
</section>

<section id="info-cards" class="info-cards section light-background">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
    </div>
</section>

<section id="category-cards" class="category-cards section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="category-slider swiper init-swiper">
        </div>
    </div>
</section>

<section id="best-sellers-section" class="best-sellers section">
    <div class="container section-title" data-aos="fade-up">
        <h2><b>BEST SELLERS</b></h2>
        <p>The Meraki Best Seller showcases our most popular and highly rated products trusted by customers for their quality and value.</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up"ata-aos-delay="100">
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?= base_url('assets/img/1bestseller-angle1.jpg') ?>" class="img-fluid default-image" alt="Product" loading="lazy">
                        <img src="<?= base_url('assets/img/1bestseller-angle2.jpg') ?>" class="img-fluid hover-image" alt="Product hover" loading="lazy">

                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><a href="<?= url_to('product_detail', 1) ?>">Lorem ipsum dolor sit amet</a></h3>
                        <div class="product-price">
                            <span class="current-price">₱89.99</span>
                        </div>
                        <div class="product-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <span class="rating-count">(42)</span>
                        </div>
                        <a href="<?= route_to('login') ?>" class="btn btn-add-to-cart">
                            <i class="bi bi-bag-plus me-2"></i>Add to Cart
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?= base_url('assets/img/2bestseller-angle1.jpg') ?>" class="img-fluid default-image" alt="Product" loading="lazy">
                        <img src="<?= base_url('assets/img/2bestseller-angle2.jpg') ?>" class="img-fluid hover-image" alt="Product hover" loading="lazy">

                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><a href="<?= base_url('products/2') ?>">Consectetur adipiscing elit</a></h3>
                        <div class="product-price">
                            <span class="current-price">₱64.99</span>
                            <span class="original-price">₱79.99</span>
                        </div>
                        <div class="product-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <span class="rating-count">(28)</span>
                        </div>
                        <button class="btn btn-add-to-cart">
                            <i class="bi bi-bag-plus me-2"></i>Add to Cart
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?= base_url('assets/img/3bestseller-angle1.jpg') ?>" class="img-fluid default-image" alt="Product" loading="lazy">
                        <img src="<?= base_url('assets/img/3bestseller-angle2.jpg') ?>" class="img-fluid hover-image" alt="Product hover" loading="lazy">

                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><a href="<?= base_url('products/3') ?>">Sed do eiusmod tempor incididunt</a></h3>
                        <div class="product-price">
                            <span class="current-price">₱119.00</span>
                        </div>
                        <div class="product-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <span class="rating-count">(56)</span>
                        </div>
                        <button class="btn btn-add-to-cart">
                            <i class="bi bi-bag-plus me-2"></i>Add to Cart
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="250">
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?= base_url('assets/img/4bestseller-angle1.jpg') ?>" class="img-fluid default-image" alt="Product" loading="lazy">
                        <img src="<?= base_url('assets/img/4bestseller-angle2.jpg') ?>" class="img-fluid hover-image" alt="Product hover" loading="lazy">

                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><a href="<?= base_url('products/4') ?>">Ut labore et dolore magna aliqua</a></h3>
                        <div class="product-price">
                            <span class="current-price">₱75.50</span>
                        </div>
                        <div class="product-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <span class="rating-count">(15)</span>
                        </div>
                        <button class="btn btn-add-to-cart">
                            <i class="bi bi-bag-plus me-2"></i>Add to Cart
                        </button>
                    </div>
                </div>
            </div>
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
            // It seems your main.js already uses it.
            pollForNewProducts();
        });
    </script>
</section>


<?= $this->endSection() ?>
</header>