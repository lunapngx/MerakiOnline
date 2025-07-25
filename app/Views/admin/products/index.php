<h1>Products</h1>
<a href="<?= url_to('products-new') ?>">Add New Product</a>

<?php if (session()->getFlashdata('success')) : ?>
    <div><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<table>
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
            <td><?= $product['id'] ?></td>
            <td><img src="<?= base_url('writable/uploads/' . $product['image']) ?>" alt="" width="50"></td>
            <td><?= $product['name'] ?></td>
            <td>$<?= number_format($product['price'], 2) ?></td>
            <td>
                <a href="<?= url_to('products-edit', $product['id']) ?>">Edit</a>
                <a href="<?= url_to('products-delete', $product['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>