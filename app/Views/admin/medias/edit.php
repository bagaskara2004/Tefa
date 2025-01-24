<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Edit Media</h1>
<form action="<?= site_url('admin/media/update/' . $media['id_media']) ?>" method="post">
    <!-- <div class="mb-3">
        <label for="id_website" class="form-label">ID Website:</label>
        <input type="number" class="form-control" name="id_website" value="<?= esc($media['id_website']) ?>" required>
    </div> -->
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" name="name" value="<?= esc($media['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="link" class="form-label">Link:</label>
        <input type="url" class="form-control" name="link" value="<?= esc($media['link']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="icon" class="form-label">Icon:</label>
        <input type="text" class="form-control" name="icon" value="<?= esc($media['icon']) ?>" required placeholder="e.g., bi-twitter">
        <small class="form-text text-muted">Enter the Bootstrap icon class (e.g., <code>bi-twitter</code>).</small>
    </div>
    <button type="submit" class="btn btn-warning">Update Media</button>
    <a href="<?= site_url('admin/medias') ?>" class="btn btn-secondary">Cancel</a>
</form>
<?= $this->endSection() ?>