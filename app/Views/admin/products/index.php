<?= $this->extend('admin/layout/main') ?>

<?= $this->section('title') ?>Products<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Products</h1>
            <a href="<?= url_to('products-new') ?>" class="btn btn-primary">Add New Product</a>
        </div>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= esc($product->id) ?></td>
                    <td><img src="<?= base_url($product->image) ?>" alt="<?= esc($product->name) ?>" width="50"></td>
                    <td><a href="<?= url_to('product-detail', $product->id) ?>"><?= esc($product->name) ?></a></td>
                    <td>$<?= esc(number_format($product->price, 2)) ?></td>
                    <td>
                        <a href="<?= url_to('products-edit', $product->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?= url_to('products-delete', $product->id) ?>" method="post" onsubmit="return confirm('Are you sure?')" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection() ?>