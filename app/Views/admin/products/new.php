<h1>Add New Product</h1>
<form action="<?= url_to('products-create') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label for="name">Name:</label>
    <input type="text" name="name">

    <label for="description">Description:</label>
    <textarea name="description"></textarea>

    <label for="price">Price:</label>
    <input type="number" name="price" step="0.01">

    <label for="stock">Stock:</label>
    <input type="number" name="stock">

    <label for="image">Image:</label>
    <input type="file" name="image">

    <button type="submit">Create Product</button>
</form>