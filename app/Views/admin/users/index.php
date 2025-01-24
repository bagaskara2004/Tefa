<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<div class="row">
    <div class="col-12">
        <h1>Users</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>IdUser</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['id_user']) ?></td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><img src="https://res.cloudinary.com/dnppmhczy/image/upload/v1734949243/<?= $user['photo'] ?>" alt="User Photo" width="100"></td>
                        <td>
                        <form action="<?= site_url('admin/users/delete/' . $user['id_user']) ?>" method="post" style="display:inline;">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>