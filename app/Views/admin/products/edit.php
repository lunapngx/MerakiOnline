<h1>Edit Product</h1>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>
<?php if (session('errors') !== null) : ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php foreach (session('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<form action="<?= url_to('products-update', $product['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PUT">

    <label for="name">Name:</label>
    <input type="text" name="name" value="<?= old('name', $product['name']) ?>">

    <label for="description">Description:</label>
    <textarea name="description"><?= old('description', $product['description']) ?></textarea>

    <label for="price">Price:</label>
    <input type="number" name="price" step="0.01" value="<?= old('price', $product['price']) ?>">

    <label for="stock">Stock:</label>
    <input type="number" name="stock" value="<?= old('stock', $product['stock']) ?>">

    <label for="image">Current Image:</label>
    <?php if ($product['image']): ?>
        <img src="<?= base_url($product['image']) ?>" alt="<?= esc($product['name']) ?>" width="100">
    <?php else: ?>
        <p>No image uploaded.</p>
    <?php endif; ?>

    <label for="image">New Image:</label>
    <input type="file" name="image">

    <button type="submit">Update Product</button>
</form>