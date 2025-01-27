<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Create Admin</h1>
<form action="<?= site_url('admin/admins/store') ?>" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" name="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label for="telp" class="form-label">Phone:</label>
        <input type="text" class="form-control" name="telp" required>
    </div>
    <button type="submit" class="btn btn-success">Create Admin</button>
    <a href="/admin/admins" class="btn btn-secondary">Close</a>
</form>
<?= $this->endSection() ?>