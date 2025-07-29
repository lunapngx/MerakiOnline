<h1>Product Details</h1>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if (isset($product)): ?>
    <h2><?= esc($product['name']) ?></h2>
    <p><strong>Description:</strong> <?= esc($product['description']) ?></p>
    <p><strong>Price:</strong> $<?= esc(number_format($product['price'], 2)) ?></p>
    <p><strong>Stock:</strong> <?= esc($product['stock']) ?></p>
    <?php if ($product['image']): ?>
        <img src="<?= base_url($product['image']) ?>" alt="<?= esc($product['name']) ?>" style="max-width: 300px;">
    <?php else: ?>
        <p>No image available.</p>
    <?php endif; ?>

    <a href="<?= url_to('admin-products') ?>">Back to Products</a>
<?php else: ?>
    <p>Product not found.</p>
<?php endif; ?>