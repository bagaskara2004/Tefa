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
<h2 class="mt-4">Order Management</h2>

<!-- Filter by Status -->
<form method="GET" action="/admin/orders">
    <div class="mb-3">
        <label for="status" class="form-label">Filter by Status</label>
        <select name="status" id="status" class="form-select" onchange="this.form.submit()">
            <option value="">All</option>
            <?php foreach ($statuses as $status): ?>
                <option value="<?= $status['id_status'] ?>" <?= (isset($selectedStatus) && $selectedStatus == $status['id_status']) ? 'selected' : '' ?>>
                    <?= $status['status'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</form>

<!-- Orders Table -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>IdUser</th>
            <th>Title</th>
            <th>Description</th>
            <th>Order Type</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $order['id_user'] ?></td>
                <td><?= $order['title'] ?></td>
                <td><?= $order['description'] ?></td>
                <td><?= $order['types'] ?></td> <!-- Display the order type -->
                <td><?= $order['status'] ?></td>
                <td>
                    <a href="/admin/orders/edit/<?= $order['id_order'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <?php if ($order['id_status'] != 4): // Assuming 4 is the status for "done" ?>
                    <form action="/admin/orders/delete/<?= $order['id_order'] ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="_method" value="DELETE"> <!-- This is not needed if you change the route -->
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?');">Delete</button>
                    </form>
                    <?php endif ?>
                    <?php if ($order['id_status'] == 2) : ?>
                        <button type="button" class="btn btn-success btn-sm chatOrder" data-bs-toggle="modal" data-bs-target="#chatModal" data-id="<?= $order['id_order'] ?>" data-title="<?= $order['title'] ?>">chat</button>
                    <?php endif ?>
                </td>
            </tr>
            <?php $no++ ?>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- modallll chat-->
<div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-2">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="chatModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeChat"></button>
            </div>
            <div class="modal-body chat-body" id="chatBody"></div>
            <div class="modal-footer">
                <div class="text-danger" id="msgError"></div>
                <input type="text" class="form-control me-2 w-100" placeholder="Type a message" id="message">
                <button class="btn btn-primary w-100" id="btnSend"><i class="bi bi-send"></i> Send</button>

            </div>
        </div>
    </div>
</div>

<script>
    const chatOrder = document.getElementsByClassName('chatOrder');
    const closeChat = document.getElementById('closeChat');
    const chatBody = document.getElementById('chatBody');
    const btnSend = document.getElementById('btnSend');
    const input = document.getElementById('message');
    const msgError = document.getElementById('msgError');
    const titleChat = document.getElementById('chatModalLabel');
    const idUser = <?= $user['id_user'] ?>;
    let load;

    Array.from(chatOrder).forEach(e => {
        e.addEventListener('click', function() {
            titleChat.innerHTML = e.getAttribute('data-title');
            chatBody.innerHTML = `
            <div class="d-flex justify-content-center align-items-center loading">
                <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                </div>
            </div>`;
            btnSend.setAttribute('data-id', e.getAttribute('data-id'));
            load = setInterval(function() {
                loadMessage(e.getAttribute('data-id'));
            }, 1000);

        })
    });
    closeChat.addEventListener('click', function() {
        msgError.innerHTML = '';
        clearInterval(load);
    });

    async function loadMessage(idOrder) {
        const message = await getMessage(idOrder);
        if (message.status == 404) {
            msgError.innerHTML = message.message;
        } else {
            const data = makeCard(message.data);
            chatBody.innerHTML = data;
        }
    }

    function getMessage(idOrder) {
        return fetch(`/admin/getMessage/${idOrder}`)
            .then(response => response.json())
            .then(response => {
                if (response.status == 201) {
                    return {
                        status: 201,
                        data: response.data
                    };
                }
                if (response.status == 404) {
                    return {
                        status: 404,
                        message: response.message
                    };
                }
            })
    }

    function makeCard(message) {
        let data = "";
        message.forEach(e => {
            if (e.id_sender == idUser) {
                data +=
                    `
                <div class="message sent">
                    <div class="message-bubble">${e.message}</div>
                </div>
                `;

            } else {
                data +=
                    `
                <div class="message received">
                    <div class="message-bubble">${e.message}</div>
                </div>
                `;
            }
        });
        return data;
    }

    function sendMessage(idOrder, message) {
        return fetch('/admin/sendMessage', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id_order: idOrder,
                    message: message
                })
            })
            .then(response => response.json())
            .then(data => data);
    }

    btnSend.addEventListener('click', async () => {
        const send = await sendMessage(btnSend.getAttribute('data-id'), input.value);
        input.value = '';
        console.log(send);
        if (send.status == 404) {
            msgError.innerHTML = send.message;
        }
        if (send.status == 400) {
            msgError.innerHTML = send.message.message;
        }
        if (send.status == 201) {
            msgError.innerHTML = '';
        }
    });

    input.addEventListener('keydown', async function() {
        if (event.key === 'Enter') {
            const send = await sendMessage(btnSend.getAttribute('data-id'), input.value);
            input.value = '';
            console.log(send);
            if (send.status == 404) {
                msgError.innerHTML = send.message;
            }
            if (send.status == 400) {
                msgError.innerHTML = send.message.message;
            }
            if (send.status == 201) {
                msgError.innerHTML = '';
            }
        }
    })
</script>
<?= $this->endSection() ?>