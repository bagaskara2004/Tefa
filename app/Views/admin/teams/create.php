<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Create Team</h1>
<form action="<?= site_url('admin/teams/store') ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="id_website" class="form-label">ID Website:</label>
        <input type="number" class="form-control" name="id_website" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label for="degree" class="form-label">Degree:</label>
        <input type="text" class="form-control" name="degree" required>
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo:</label>
        <input type="file" class="form-control" name="photo" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-success">Create Team</button>
</form>
<?= $this->endSection() ?>