<?= $this->extend('layouts/master') ?>

<?= $this->section('title') ?>
<?= esc($title) ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <h2 class="text-center mb-4"><?= esc($category->name) ?> Products</h2>

    <?php if (empty($products)) : ?>
        <p class="text-center">No products found in this category.</p>
    <?php else : ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($products as $product): ?>
                <div class="col">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <?php if (!empty($product->image)): ?>
                            <img src="<?= base_url('uploads/' . $product->image) ?>" class="card-img-top" alt="<?= esc($product->name) ?>" style="height: 250px; object-fit: cover;">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($product->name) ?></h5>
                            <p class="card-text text-primary fw-bold">₱<?= number_format($product->price, 2) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
