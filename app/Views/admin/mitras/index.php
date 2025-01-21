<?= $this->extend('Component/admin') ?>

<?= $this->section('Content') ?>
<style>
    .chat-body {
        height: 400px;
        display: flex;
        flex-direction: column-reverse;
        overflow-y: auto;
        padding: 15px;
        background-color: rgb(255, 255, 255);
    }

    .message {
        margin-bottom: 10px;
    }

    .message.sent {
        text-align: right;
    }

    .message-bubble {
        display: inline-block;
        padding: 10px;
        border-radius: 15px;
        max-width: 70%;
    }

    .message.sent .message-bubble {
        background-color: #007bff;
        color: #fff;
    }

    .message.received .message-bubble {
        background-color: #f1f1f1;
        color: #000;
    }

    .loading {
        height: 100%;
    }
</style>
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
                    <img src="https://res.cloudinary.com/dnppmhczy/image/upload/v1734949243/<?= $mitra['logo'] ?>" alt="Mitra Logo" style="width: 100px; height: auto;">
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