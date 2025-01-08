<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Create Project</h1>
<form action="<?= site_url('admin/projects/store') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_website" value="1"> <!-- Set id_website to 1 -->
    
    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" class="form-control" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea class="form-control" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo:</label>
        <input type="file" class="form-control" name="photo" accept="image/*" required>
    </div>
    <div class="mb-3">
        <label for="url" class="form-label">Project URL:</label>
        <input type="text" class="form-control" name="url" required>
    </div>
    <button type="submit" class="btn btn-success">Create Project</button>
</form>
<?= $this->endSection() ?>