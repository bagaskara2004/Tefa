<?= $this->extend('Component/admin') ?>
<?= $this->section('Content') ?>

<h2 class="mt-4">Order Management</h2>

<!-- Filter by Status -->
<form method="GET" action="/admin/orders">
    <div class="mb-3">
        <label for="status" class="form-label">Filter by Status</label>
        <select name="status" id="status" class="form-select" onchange="this.form.submit()">
            <option value="">All</option>
            <?php foreach ($statuses as $status): ?>
                <option value="<?= $status['id_status'] ?>" <?= (isset($selectedStatus) && $selectedStatus == $status['id_status']) ? 'selected' : '' ?>>
                    <?= $status['status'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</form>

<!-- Orders Table -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Order Type</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order['id_order'] ?></td>
                <td><?= $order['title'] ?></td>
                <td><?= $order['description'] ?></td>
                <td><?= $orderTypeNames[$order['id_order']] ?></td> <!-- Display the order type -->
                <td><?= $order['status'] ?></td>
                <td>
                    <a href="/admin/orders/edit/<?= $order['id_order'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/admin/orders/delete/<?= $order['id_order'] ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="_method" value="DELETE"> <!-- This is not needed if you change the route -->
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>