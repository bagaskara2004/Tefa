<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Create Media</h1>
<form action="<?= site_url('admin/media/store') ?>" method="post">
    <!-- <div class="mb-3">
        <label for="id_website" class="form-label">ID Website:</label>
        <input type="number" class="form-control" name="id_website" required>
    </div> -->
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label for="link" class="form-label">Link:</label>
        <input type="url" class="form-control" name="link" required>
    </div>
    <div class="mb-3">
        <label for="icon" class="form-label">Icon:</label>
        <input type="text" class="form-control" name="icon" required placeholder="e.g., bi-twitter">
        <small class="form-text text-muted">Enter the Bootstrap icon class (e.g., <code>bi-twitter</code>).</small>
    </div>
    <button type="submit" class="btn btn-success">Create Media</button>
    <a href="/admin/medias" class="btn btn-secondary">Close</a>
</form>
<?= $this->endSection() ?>