<?= $this->extend('Component/admin') ?>
<?= $this->section('Content') ?>
<h1>Websites</h1>
<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($websites as $website): ?>
            <tr>
                <td><?= esc($website['id_website']) ?></td>
                <td><?= esc($website['email']) ?></td>
                <td><?= esc($website['location']) ?></td>
                <td>
                    <a href="<?= site_url('admin/websites/edit/' . $website['id_website']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('admin/websites/delete/' . $website['id_website']) ?>" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this website?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>