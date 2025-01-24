<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Admin Management</h1>
<a href="<?= site_url('admin/admins/create') ?>" class="btn btn-primary">Add New Admin</a>
<table class="table mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Aktif</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?= esc($no) ?></td>
                <td><?= esc($admin['username']) ?></td>
                <td><?= esc($admin['email']) ?></td>
                <td><?= esc($admin['telp']) ?></td>
                <td><?= esc($admin['actived']) ?></td>
                <td>
                    <form action="<?= site_url('admin/admins/delete/' . $admin['id_user']) ?>" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this admin?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>