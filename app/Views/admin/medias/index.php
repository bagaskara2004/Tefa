<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Media Management</h1>
<a href="<?= site_url('admin/media/create') ?>" class="btn btn-primary">Add New Media</a>
<table class="table mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Link</th>
            <th>Icon</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($medias as $media): ?>
            <tr>
                <td><?= esc($no) ?></td>
                <td><?= esc($media['name']) ?></td>
                <td><a href="<?= esc($media['link']) ?>" target="_blank"><?= esc($media['link']) ?></a></td>
                <td><i class="<?= esc($media['icon']) ?>"></i></td>
                <td>
                    <a href="<?= site_url('admin/media/edit/' . $media['id_media']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('admin/media/delete/' . $media['id_media']) ?>" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this media?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>