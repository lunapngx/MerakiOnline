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
                    <?php if (!empty($products)): // Add a check if $products is not empty ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= esc($product->name) ?></td>
                                <td>₱<?= esc(number_format($product->price, 2)) ?></td>
                                <td><?= esc($product->stock) ?></td>
                                <td>₱<?= esc(number_format($product->sales ?? 0, 2)) ?></td>
                                <td class="text-end">
                                    <a href="<?= site_url('admin/products/edit/' . $product->id) ?>" class="edit-btn">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No products found in the database.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="sales-summary mt-4">
                <p><strong>Total Sales:</strong> ₱<?= esc(number_format($report['total_sales'] ?? 0, 2)) ?></p>
                <p><strong>Total Orders:</strong> <?= esc($report['total_orders'] ?? 0) ?></p>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>