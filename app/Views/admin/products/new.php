<h1>Add New Product</h1>

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

<form action="<?= url_to('products-create') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label for="name">Name:</label>
    <input type="text" name="name" value="<?= old('name') ?>">

    <label for="description">Description:</label>
    <textarea name="description"><?= old('description') ?></textarea>

    <label for="price">Price:</label>
    <input type="number" name="price" step="0.01" value="<?= old('price') ?>">

    <label for="stock">Stock:</label>
    <input type="number" name="stock" value="<?= old('stock') ?>">

    <label for="image">Image:</label>
    <input type="file" name="image">

    <button type="submit">Create Product</button>
</form>