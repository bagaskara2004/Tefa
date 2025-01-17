<?= $this->extend('Component/admin') ?>
<?= $this->section('Content') ?>

<h2 class="mt-4">Edit Order</h2>

<form method="POST" action="/admin/orders/update/<?= $order['id_order'] ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= old('title', $order['title']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required><?= old('description', $order['description']) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="id_status" class="form-label">Status</label>
        <select name="id_status" id="id_status" class="form-select" required>
            <?php foreach ($statuses as $status): ?>
                <option value="<?= $status['id_status'] ?>" <?= ($order['id_status'] == $status['id_status']) ? 'selected' : '' ?>>
                    <?= $status['status'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Order</button>
    <a href="/admin/orders" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>