<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Edit Project</h1>
<form action="<?= site_url('admin/projects/update/' . $project['id_project']) ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_website" value="1"> <!-- Set id_website to 1 -->
    
    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" class="form-control" name="title" value="<?= esc($project['title']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea class="form-control" name="description" required><?= esc($project['description']) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo:</label>
        <input type="file" class="form-control" name="photo" accept="image/*">
        <small>Leave blank if you do not want to change the photo.</small>
    </div>
    <div class="mb-3">
        <label for="url" class="form-label">Project URL:</label>
        <input type="text" class="form-control" name="url" value="<?= esc($project['url']) ?>" required>
    </div>
    <button type="submit" class="btn btn-warning">Update Project</button>
</form>
<?= $this->endSection() ?>