<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container py-4">
    <div class="sales-wrapper p-4 rounded">
        <div class="table-responsive">
            <table class="table sales-table align-middle mb-0">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Sales</th>
                    <th class="text-end">...</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= esc($product['name']) ?></td>
                        <td><?= esc($product['price']) ?></td>
                        <td><?= esc($product['stock']) ?></td>
                        <td><?= esc($product['sales']) ?></td>
                        <td class="text-end">
                            <a href="<?= site_url('admin/products/edit/' . $product['id']) ?>" class="edit-btn">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
