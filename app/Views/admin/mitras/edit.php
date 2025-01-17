<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Edit Mitra</h1>
<form action="<?= site_url('admin/mitras/update/' . $mitra['id_mitra']) ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="id_website" class="form-label">ID Website:</label>
        <input type="number" class="form-control" name="id_website" value="<?= esc($mitra['id_website']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" name="name" value="<?= esc($mitra['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="logo" class="form-label">Logo:</label>
        <input type="file" class="form-control" name="logo" accept="image/*">
        <small>Leave blank if you do not want to change the logo.</small>
    </div>
    <div class="mb-3">
        <label for="link" class="form-label">Link:</label>
        <input type="url" class="form-control" name="link" value="<?= esc($mitra['link']) ?>" required>
    </div>
    <button type="submit" class="btn btn-warning">Update Mitra</button>
    <a href="<?= site_url('admin/mitras') ?>" class="btn btn-secondary">Cancel</a>
</form>
<?= $this->endSection() ?>