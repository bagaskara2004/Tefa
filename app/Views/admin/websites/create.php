<?= $this->extend('Component/admin') ?>
<?= $this->section('Content') ?>
<h1>Create Website</h1>
<form action="<?= site_url('admin/websites/store') ?>" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Location:</label>
        <input type="text" class="form-control" name="location" required>
    </div>
    <button type="submit" class="btn btn-success">Create Website</button>
</form>
<?= $this->endSection() ?>