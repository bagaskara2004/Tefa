<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Feedback Management</h1>
<table class="table mt-3 table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Message</th>
            <th>Posted</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($feedbacks as $feedback): ?>
            <tr>
                <td><?= esc($feedback['id_feedback']) ?></td>
                <td><?= esc($feedback['id_user']) ?></td>
                <td><?= esc($feedback['message']) ?></td>
                <td><?= esc($feedback['post'] ? 'Yes' : 'No') ?></td>
                <td>
                    <a href="<?= site_url('admin/feedbacks/edit/' . $feedback['id_feedback']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('admin/feedbacks/delete/' . $feedback['id_feedback']) ?>" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this feedback?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>