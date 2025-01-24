<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Create Project</h1>
<form action="<?= site_url('admin/projects/store') ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" class="form-control" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea class="form-control" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Tipe :</label>
        <?php foreach ($types as $type) : ?>
            <div class="mb-2">
                <input id="<?= $type['type'] ?>" type="checkbox" name="type[]" value="<?= $type['id_type'] ?>">
                <label for="<?= $type['type'] ?>"><?= $type['type'] ?></label>
            </div>
        <?php endforeach ?>
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
    <a href="" class="btn btn-secondary">Close</a>
</form>
<?= $this->endSection() ?>