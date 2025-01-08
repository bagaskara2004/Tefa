<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<div class="row">
    <div class="col-12">
        <h1>Orders</h1>

        <form method="get" action="">
            <div class="mb-3">
                <label for="status" class="form-label">Filter by Status:</label>
                <select name="status" id="status" class="form-select">
                    <option value="">All</option>
                    <?php foreach ($statuses as $status): ?>
                        <option value="<?= $status['id_status'] ?>" <?= (isset($_GET['status']) && $_GET['status'] == $status['id_status']) ? 'selected' : '' ?>>
                            <?= $status['status'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order['title'] ?></td>
                        <td><?= $order['description'] ?></td>
                        <td><?= $order['id_status'] ?></td>
                        <td>
                            <a href="/admin/orders/edit/<?= $order['id_order'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?= site_url('admin/orders/delete/' . $order['id_order']) ?>" method="post" style="display:inline;">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Order?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>