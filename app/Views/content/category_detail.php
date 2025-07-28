<?= $this->extend('layouts/master') ?> <?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container mt-5">
        <h1><?= esc($category->name) ?></h1>
        <?php if (!empty($category->description)): ?>
            <p><?= esc($category->description) ?></p>
        <?php endif; ?>

        <h2>Products in this Category</h2>
        <?php if (!empty($products)): ?>
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="<?= base_url($product->image ?? 'path/to/default/image.jpg') ?>" class="card-img-top" alt="<?= esc($product->name) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($product->name) ?></h5>
                                <p class="card-text">$<?= esc(number_format($product->price, 2)) ?></p>
                                <a href="<?= url_to('product_detail', $product->id) ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No products found in this category yet.</p>
        <?php endif; ?>
    </div>
<?= $this->endSection() ?>