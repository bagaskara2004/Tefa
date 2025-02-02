<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<h1>Projects</h1>
<a href="<?= site_url('admin/projects/create') ?>" class="btn btn-primary">Add New Project</a>
<table class="table mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Photo</th>
            <th>URL</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php foreach ($projects as $project): ?>
            <tr>
                <td><?= esc($no) ?></td>
                <td><?= esc($project['title']) ?></td>
                <td><?= esc($project['description']) ?></td>
                <td>
                    <?php if (!empty($project['photo'])): ?>
                        <img src="https://res.cloudinary.com/dnppmhczy/image/upload/v1734949243/<?= $project['photo'] ?>" alt="Project Photo" style="width: 100px; height: auto;">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
                <td><a href="<?= esc($project['url']) ?>" target="_blank"><?= esc($project['url']) ?></a></td>
                <td><?= esc($project['created']) ?></td>
                <td><?= esc($project['updated']) ?></td>
                <td>
                    <a href="<?= site_url('admin/projects/edit/' . $project['id_project']) ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= site_url('admin/projects/delete/' . $project['id_project']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?');">Delete</a>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>