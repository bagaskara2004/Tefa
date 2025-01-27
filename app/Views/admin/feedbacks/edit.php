<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Edit Feedback</h1>
<form action="<?= site_url('admin/feedbacks/update/' . $feedback['id_feedback']) ?>" method="post">
    <div class="mb-3">
        <input type="number" hidden class="form-control" name="id_user" value="<?= esc($feedback['id_user']) ?>" required>
    </div>
    <div class="mb-3">
        <textarea class="form-control" hidden name="message" required><?= esc($feedback['message']) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="post" class="form-label">Post:</label>
        <input type="checkbox" name="post" value="1" <?= $feedback['post'] ? 'checked' : '' ?>> Check to post
    </div>
    <button type="submit" class="btn btn-warning">Update Feedback</button>
    <a href="<?= site_url('admin/feedbacks') ?>" class="btn btn-secondary">Cancel</a>
</form>
<?= $this->endSection() ?>