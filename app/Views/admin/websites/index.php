<?= $this->extend('Component/admin') ?>
<?= $this->section('Content') ?>
<h1>Websites</h1>
<table class="table mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Email</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        <?php foreach ($websites as $website): ?>
            <tr>
                <td><?= esc($no++) ?></td>
                <td><?= esc($website['email']) ?></td>
                <td><?= esc($website['location']) ?></td>
                <td>
                    <a href="<?= site_url('admin/websites/edit/' . $website['id_website']) ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>