<h1>Products</h1>
<a href="<?= url_to('products-new') ?>">Add New Product</a>

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
            <td><?= esc($product['id']) ?></td>
            <td><img src="<?= base_url($product['image']) ?>" alt="<?= esc($product['name']) ?>" width="50"></td>
            <td><?= esc($product['name']) ?></td>
            <td>$<?= esc(number_format($product['price'], 2)) ?></td>
            <td>
                <a href="<?= url_to('products-edit', $product['id']) ?>">Edit</a>
                <form action="<?= url_to('products-delete', $product['id']) ?>" method="post" onsubmit="return confirm('Are you sure?')">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-link">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>