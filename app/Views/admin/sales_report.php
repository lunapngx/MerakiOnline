<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>
    <div class="container py-4">
        <div class="sales-wrapper p-4 rounded">
            <div class="table-responsive">
                <table class="table sales-table align-middle mb-0">
                    <thead>
                    <tr>
                        <th class="text-start" style="width: 25%;">Product</th>
                        <th class="text-center" style="width: 15%;">Price</th>
                        <th class="text-center" style="width: 15%;">Stock</th>
                        <th class="text-center" style="width: 20%;">Sales</th>
                        <th class="text-end" style="width: 25%;">...</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td class="text-start"><?= esc($product->name) ?></td>
                                <td class="text-center">₱<?= esc(number_format($product->price, 2)) ?></td>
                                <td class="text-center"><?= esc($product->stock) ?></td>
                                <td class="text-center">₱<?= esc(number_format($product->sales ?? 0, 2)) ?></td>
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
            <div class="sales-summary mt-4 text-start">
                <p class="mb-0"><strong>Total Sales:</strong> ₱<?= esc(number_format($report['total_sales'] ?? 0, 2)) ?></p>
                <p class="mb-0"><strong>Total Orders:</strong> <?= esc($report['total_orders'] ?? 0) ?></p>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>