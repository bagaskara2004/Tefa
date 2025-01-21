<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Create Mitra</h1>
<form action="<?= site_url('admin/mitras/store') ?>" method="post" enctype="multipart/form-data">
    <!-- <div class="mb-3">
        <label for="id_website" class="form-label">ID Website:</label>
        <input type="number" class="form-control" name="id_website" required>
    </div> -->
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label for="logo" class="form-label">Logo:</label>
        <input type="file" class="form-control" name="logo" accept="image/*" required>
    </div>
    <div class="mb-3">
        <label for="link" class="form-label">Link:</label>
        <input type="url" class="form-control" name="link" required>
    </div>
    <button type="submit" class="btn btn-success">Create Mitra</button>
</form>
<?= $this->endSection() ?>