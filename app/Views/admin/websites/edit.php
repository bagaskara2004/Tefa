<?= $this->extend('Component/admin') ?>
<?= $this->section('Content') ?>
<h1>Edit Website</h1>
<form action="<?= site_url('admin/websites/update/' . $website['id_website']) ?>" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" value="<?= esc($website['email']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Location:</label>
        <input type="text" class="form-control" name="location" value="<?= esc($website['location']) ?>" required>
    </div>
    <button type="submit" class="btn btn-warning">Update Website</button>
    <a href="<?= site_url('admin/websites') ?>" class="btn btn-secondary">Cancel</a>
</form>
<?= $this->endSection() ?>