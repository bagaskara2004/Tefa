<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<div class="row">
    <div class="col-12">
        <h1>Edit Order</h1>

        <form method="post" action="">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= $order['title'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required><?= $order['description'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="id_status" id="status" class="form-select">
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
    </div>
</div>
<?= $this->endSection() ?>