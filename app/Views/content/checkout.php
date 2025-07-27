<?= $this->extend('layouts/master') ?>
<?= $this->section('title') ?>Checkout<?= $this->endSection() ?>
<?= $this->section('content') ?>

    <div class="checkout-container row my-3">

        <div class="col-md-7 mb-3 mb-md-0">
            <div class="card p-4 shadow-sm">
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger py-1 mb-2"><?= $validation->listErrors() ?></div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success py-1 mb-2"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger py-1 mb-2"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <?= form_open(route_to('checkout_process')) ?>
                <?= csrf_field() ?>

                <h4 class="mb-3 d-flex align-items-center">
                    <span class="badge-circle me-2">1</span> Customer Information
                </h4>
                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">FIRST NAME</label>
                        <input type="text" name="first_name" id="firstName" class="form-control" value="<?= set_value('first_name') ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">LAST NAME</label>
                        <input type="text" name="last_name" id="lastName" class="form-control" value="<?= set_value('last_name') ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">EMAIL ADDRESS</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= set_value('email') ?>" required>
                </div>
                <div class="mb-4">
                    <label for="phone" class="form-label">PHONE NUMBER</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?= set_value('phone') ?>" required>
                </div>

                <h4 class="mt-4 mb-3 d-flex align-items-center">
                    <span class="badge-circle me-2">2</span> Shipping Address
                </h4>
                <div class="mb-3">
                    <label for="street" class="form-label">Street Address</label>
                    <input type="text" name="street" id="street" class="form-control" value="<?= set_value('street') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apartment" class="form-label">Apartment, Suite, etc. (optional)</label>
                    <input type="text" name="apartment" id="apartment" class="form-control" value="<?= set_value('apartment') ?>">
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-md-4">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="<?= set_value('city') ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="state" class="form-label">Barangay</label>
                        <input type="text" name="state" id="state" class="form-control" value="<?= set_value('state') ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="zip" class="form-label">ZIP Code</label>
                        <input type="text" name="zip" id="zip" class="form-control" value="<?= set_value('zip') ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <select name="country" id="country" class="form-select" required>
                        <option value="">Select Country</option>
                        <option value="Philippines" <?= set_select('country', 'Philippines', true) ?>>Philippines</option>
                    </select>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="save_address" value="1" id="saveAddressCheck" <?= set_checkbox('save_address', '1') ?>>
                    <label class="form-check-label small" for="saveAddressCheck">
                        Save this address for future orders
                    </label>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="billing_same_as_shipping" value="1" id="billingSameAsShippingCheck" <?= set_checkbox('billing_same_as_shipping', '1', true) ?>>
                    <label class="form-check-label small" for="billingSameAsShippingCheck">
                        Billing address same as shipping
                    </label>
                </div>

                <h4 class="mt-4 mb-3 d-flex align-items-center">
                    <span class="badge-circle me-2">3</span> Payment Method
                </h4>
                <div class="row g-2 mb-3">
                    <div class="col-md-6 col-12">
                        <div class="payment-option <?= set_value('payment_method', 'cash_on_delivery') === 'cash_on_delivery' ? 'active' : '' ?>" data-payment-method="cash_on_delivery">
                            <input class="form-check-input" type="radio" name="payment_method" value="cash_on_delivery" id="paymentCashOnDelivery" <?= set_radio('payment_method', 'cash_on_delivery', true) ?>>
                            <i class="fas fa-hand-holding-dollar"></i>
                            Cash on Delivery
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="payment-option <?= set_value('payment_method') === 'self_pick_up' ? 'active' : '' ?>" data-payment-method="self_pick_up">
                            <input class="form-check-input" type="radio" name="payment_method" value="self_pick_up" id="paymentSelfPickUp" <?= set_radio('payment_method', 'self_pick_up') ?>>
                            <i class="fas fa-store"></i>
                            Self Pick Up
                        </div>
                    </div>
                </div>

                <div id="cardDetails" class="mb-4" style="display: none;">
                </div>

                <button type="submit" class="btn btn-dark w-100 py-2 mt-2">Place Order</button>
                <?= form_close() ?>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card p-4 shadow-sm">
                <h4 class="mb-3">Order Summary <small class="float-end text-muted"><?= count($items) ?> Items</small></h4>
                <hr class="my-3">

                <?php foreach ($items as $it): ?>
                    <div class="d-flex mb-3 align-items-center">
                        <img src="<?= base_url($it['thumb']) ?>" class="order-item-img me-3" alt="<?= esc($it['name']) ?>">
                        <div class="flex-grow-1">
                            <h6 class="mb-1"><?= esc($it['name']) ?></h6>
                            <?php if (!empty($it['options'])): ?>
                                <?php foreach ($it['options'] as $key => $value): ?>
                                    <small class="text-muted d-block"><?= esc($key) ?>: <?= esc($value) ?></small>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <small class="text-muted"><?= $it['qty'] ?> &times; <?= number_to_currency($it['price'], 'PHP') ?></small>
                        </div>
                        <span class="fw-bold"><?= number_to_currency($it['qty'] * $it['price'], 'PHP') ?></span>
                    </div>
                <?php endforeach; ?>

                <hr class="my-3">

                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="promoCode">
                    <button class="btn btn-primary" type="button">Apply</button>
                </div>

                <div class="summary-item">
                    <span>Subtotal:</span><span><?= number_to_currency($subtotal, 'PHP') ?></span>
                </div>
                <div class="summary-item">
                    <span>Shipping:</span><span><?= number_to_currency($shipping, 'PHP') ?></span>
                </div>
                <div class="summary-item mb-3">
                    <span>Tax:</span><span><?= number_to_currency($tax, 'PHP') ?></span>
                </div>
                <div class="summary-item summary-total">
                    <span>Total:</span><span><?= number_to_currency($total, 'PHP') ?></span>
                </div>
                <div class="text-center mt-4">
                    <small class="text-muted"><i class="fas fa-lock"></i> Secure Checkout</small>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentOptions = document.querySelectorAll('.payment-option');
            const cardDetailsDiv = document.getElementById('cardDetails');

            function updateActiveState() {
                paymentOptions.forEach(option => {
                    const radio = option.querySelector('input[type="radio"]');
                    if (radio && radio.checked) {
                        option.classList.add('active');
                    } else {
                        option.classList.remove('active');
                    }
                });
            }

            function toggleCardDetails() {
                cardDetailsDiv.style.display = 'none';
            }

            paymentOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const radio = this.querySelector('input[type="radio"]');
                    if (radio) {
                        radio.checked = true;
                        updateActiveState();
                    }
                });
            });

            updateActiveState();
            toggleCardDetails();
        });
    </script>

<?= $this->endSection() ?>