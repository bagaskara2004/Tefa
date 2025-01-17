<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Mitra Management</h1>
<a href="<?= site_url('admin/mitras/create') ?>" class="btn btn-primary">Add New Mitra</a>
<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Website</th>
            <th>Name</th>
            <th>Logo</th>
            <th>Link</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mitras as $mitra): ?>
            <tr>
                <td><?= esc($mitra['id_mitra']) ?></td>
                <td><?= esc($mitra['id_website']) ?></td>
                <td><?= esc($mitra['name']) ?></td>
                <td>
                    <img src="<?= base_url('uploads/' . esc($mitra['logo'])) ?>" alt="Mitra Logo" style="width: 100px; height: auto;">
                </td>
                <td><a href="<?= esc($mitra['link']) ?>" target="_blank"><?= esc($mitra['link']) ?></a></td>
                <td>
                    <a href="<?= site_url('admin/mitras/edit/' . $mitra['id_mitra']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('admin/mitras/delete/' . $mitra['id_mitra']) ?>" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this mitra?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>