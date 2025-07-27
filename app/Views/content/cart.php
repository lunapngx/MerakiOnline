<?= $this->extend('layouts/master') ?>

<?= $this->section('title') ?>Your Cart<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/cart.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="cart-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-start fw-bold mb-0">CART</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>


        <?php foreach (['success', 'error', 'info'] as $msg): ?>
            <?php if (session()->getFlashdata($msg)): ?>
                <div class="alert alert-<?= $msg ?> alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata($msg) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <div class="cart-grid">
            <div class="cart-items">
                <table>
                    <thead>
                    <tr>
                        <th>PRODUCT</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>TOTAL</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($cartItems)): ?>
                        <?php foreach ($cartItems as $item): ?>
                            <tr>
                                <td>
                                    <div class="product-info-cell">
                                        <img src="<?= base_url('public/assets/img/' . esc($item['image'])) ?>"
                                             alt="<?= esc($item['name']) ?>" class="product-image-small">
                                        <div>
                                            <strong><?= esc($item['name']) ?></strong><br>
                                            <?php if (!empty($item['options'])): ?>
                                                <?php foreach($item['options'] as $key => $value): ?>
                                                    <small class="badge bg-light text-dark"><?= ucfirst($key) ?>: <?= esc($value) ?></small>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            <form action="<?= url_to('cart_remove') ?>" method="post" onsubmit="return confirm('Are you sure you want to remove this item?');">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="rowid" value="<?= esc($item['rowid']) ?>">
                                                <button type="submit" class="btn-remove-link">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>₱<?= number_format($item['price'], 2) ?></td>
                                <td>
                                    <form action="<?= url_to('cart_update') ?>" method="post" class="quantity-form">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="rowid" value="<?= esc($item['rowid']) ?>">
                                        <div class="quantity-controls">
                                            <button type="button" class="btn-minus">−</button>
                                            <input type="number" name="quantity" value="<?= esc($item['qty']) ?>" min="1" max="<?= esc($item['stock'] ?? 99) ?>">
                                            <button type="button" class="btn-plus">+</button>
                                        </div>
                                        <button type="submit" class="d-none update-item-btn"></button>
                                    </form>
                                </td>
                                <td>₱<?= number_format($item['subtotal'], 2) ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-4">Your cart is empty.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <div class="cart-bottom-actions">
                    <div class="coupon-section">
                        <input type="text" placeholder="Coupon code">
                        <button class="btn-apply-coupon">Apply</button>
                    </div>
                    <div class="update-clear-buttons">
                        <form action="<?= url_to('cart_clear') ?>" method="post" onsubmit="return confirm('Are you sure you want to clear your cart?');">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn-clear-cart">Clear Cart</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="order-summary">
                <h3 class="fw-bold text-center">ORDER SUMMARY</h3>
                <div class="summary-line">
                    <span>Subtotal</span>
                    <span id="subtotal">₱<?= number_format($total, 2) ?></span>
                </div>
                <a href="<?= url_to('checkout_view') ?>" class="btn btn-proceed">PROCEED TO CHECKOUT →</a>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.alert .btn-close').forEach(function(button) {
                button.addEventListener('click', function() {
                    this.closest('.alert').style.display = 'none';
                });
            });

            document.querySelectorAll('.quantity-form').forEach(form => {
                const input = form.querySelector('input[name="quantity"]');
                const minus = form.querySelector('.btn-minus');
                const plus = form.querySelector('.btn-plus');
                const updateBtn = form.querySelector('.update-item-btn');

                minus.addEventListener('click', () => {
                    let val = parseInt(input.value);
                    if (val > 1) {
                        input.value = val - 1;
                        form.submit();
                    }
                });

                plus.addEventListener('click', () => {
                    let val = parseInt(input.value);
                    let max = parseInt(input.max);
                    if (val < max) {
                        input.value = val + 1;
                        form.submit();
                    }
                });

                input.addEventListener('change', () => {
                    let val = parseInt(input.value);
                    const min = parseInt(input.min);
                    const max = parseInt(input.max);
                    if (isNaN(val) || val < min) {
                        input.value = min;
                    } else if (val > max) {
                        input.value = max;
                    }
                    form.submit();
                });
            });
        });
    </script>
<?= $this->endSection() ?>