<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Edit Team</h1>
<form action="<?= site_url('admin/teams/update/' . $team['id_team']) ?>" method="post" enctype="multipart/form-data">
    <!-- <div class="mb-3">
        <label for="id_website" class="form-label">ID Website:</label>
        <input type="hidden" class="form-control" name="id_website" value="<?= esc($team['id_website']) ?>" required>
    </div> -->
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" name="name" value="<?= esc($team['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="degree" class="form-label">Degree:</label>
        <input type="text" class="form-control" name="degree" value="<?= esc($team['degree']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo:</label>
        <input type="file" class="form-control" name="photo" accept="image/*">
        <small>Leave blank if you do not want to change the photo.</small>
    </div>
    <button type="submit" class="btn btn-warning">Update Team</button>
    <a href="<?= site_url('admin/teams') ?>" class="btn btn-secondary">Cancel</a>
</form>
<?= $this->endSection() ?>