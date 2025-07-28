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

    <label for="category_id">Category:</label> // Add this section
    <select name="category_id" id="category_id" required>
        <option value="">Select Category</option>
        <?php if (isset($categories) && !empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <option value="<?= esc($category['id']) ?>" <?= set_select('category_id', $category['id'], (isset($product['category_id']) && $product['category_id'] == $category['id'])) ?>><?= esc($category['name']) ?></option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="">No categories available</option>
        <?php endif; ?>
    </select>
    <?php if (isset($validation) && $validation->hasError('category_id')) : ?>
        <div class="text-danger"><?= $validation->getError('category_id') ?></div>
    <?php endif; ?>

    <label for="image">Current Image:</label>
    <?php if ($product['image']): ?>
        <img src="<?= base_url($product['image']) ?>" alt="<?= esc($product['name']) ?>" width="100">
    <?php else: ?>
        <p>No image uploaded.</p>
    <?php endif; ?>

    <button type="submit">Update Product</button>
</form>