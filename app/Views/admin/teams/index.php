<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Team Management</h1>
<a href="<?= site_url('admin/teams/create') ?>" class="btn btn-primary">Add New Team</a>
<table class="table mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Degree</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php foreach ($teams as $team): ?>
            <tr>
                <td><?= esc($no++) ?></td>
                <td><?= esc($team['name']) ?></td>
                <td><?= esc($team['degree']) ?></td>
                <td><img src="https://res.cloudinary.com/dnppmhczy/image/upload/v1734949243/<?= esc($team['photo']) ?>" alt="Team Photo" width="100"></td>
                <td>
                    <a href="<?= site_url ('admin/teams/edit/' . $team['id_team']) ?>" class="btn btn-warning">Edit</a>
                    <form action="<?= site_url('admin/teams/delete/' . $team['id_team']) ?>" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this team?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>