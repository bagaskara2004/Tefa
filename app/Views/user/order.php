<?= $this->extend('Component/user.php') ?>

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

    /* .chat-body::-webkit-scrollbar {
        width: 8px;
    }

    .chat-body::-webkit-scrollbar-thumb {
        background: #007bff;
        border-radius: 4px;
    }

    .chat-body::-webkit-scrollbar-track {
        background: #e9ecef;
    } */
    .loading {
        height: 100%;
    }
</style>

<section class="position-relative py-4 py-xl-5" style="margin-top: 5em;">
    <div class="container position-relative">
        <div class="row">
            <div class="col mb-2" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200" data-aos-once="true">
                <div style="box-shadow: 0px 0px 12px 9px #7b7b7b15;">
                    <div class="p-3">
                        <h4>Daftar Pesanan</h4>
                        <hr>
                        <div class="overflow-auto" style="max-height: 635px; min-height: 300px;">
                            <?php if (empty($orders)) : ?>
                                <div>
                                    <p class="text-muted text-center">Tidak ada order</p>
                                </div>
                            <?php endif ?>
                            <?php foreach ($orders as $order) : ?>
                                <div style="box-shadow: 0px 0px 12px 9px #7b7b7b15;" class="p-3 m-2 rounded d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 text-break"><?= $order['title'] ?></h6>
                                    <div class="m1"></div>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a data-created="<?= $order['created'] ?>" data-status="<?= $order['status'] ?>" data-title="<?= $order['title'] ?>" data-type="<?= $order['types'] ?>" data-description="<?= $order['description'] ?>" data-bs-toggle="modal" data-bs-target="#orderModal" class="dropdown-item d-flex align-items-center detailOrder">
                                                    <button type="button" class="btn btn-secondary me-2"><i class="bi bi-eye"></i></button>
                                                    <h6 class="text-secondary">Detail</h6>
                                                </a>
                                            </li>
                                            <?php if ($order['id_status'] == 2) : ?>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center chatOrder" data-bs-toggle="modal" data-bs-target="#chatModal" data-id="<?= $order['id_order'] ?>" data-title="<?= $order['title'] ?>">
                                                        <button type="button" class="btn btn-success me-2"><i class="bi bi-chat-dots"></i></button>
                                                        <h6 class="text-secondary">Chat</h6>
                                                    </a>
                                                </li>
                                            <?php else : ?>
                                                <li>
                                                    <a data-title="<?= $order['title'] ?>" data-id="<?= $order['id_order'] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal" class="dropdown-item d-flex align-items-center deleteOrder">
                                                        <button type="button" class="btn btn-danger me-2"><i class="bi bi-trash"></i></button>
                                                        <h6 class="text-danger">Hapus</h6>
                                                    </a>
                                                </li>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 mb-2" data-aos="fade-up" data-aos-duration="600" data-aos-once="true">
                <div style="box-shadow: 0px 0px 12px 9px #7b7b7b15;">
                    <form class="p-3 p-xl-4" method="post" action="/order" id="formUser">
                        <?= csrf_field() ?>
                        <h4>Pesan Sekarang</h4>
                        <p class="text-muted">Nikmati kemudahan memesan produk atau layanan kami. Isi formulir di bawah, dan kami akan segera memprosesnya.</p>
                        <div class="mb-3">
                            <label class="form-label" for="judul">Judul :</label>
                            <input class="form-control" type="text" id="judul" name="judul" value="<?= old('judul') ?>" required minlength="3" maxlength="25">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipe :</label>
                            <?php foreach ($types as $type) : ?>
                                <div class="mb-2">
                                    <input id="<?= $type['type'] ?>" type="checkbox" name="type[]" value="<?= $type['id_type'] ?>">
                                    <label for="<?= $type['type'] ?>"><?= $type['type'] ?></label>
                                </div>
                            <?php endforeach ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">Deskripsi :</label>
                            <textarea class="form-control" id="description" name="description" rows="6" required minlength="20" maxlength="1000"><?= old('description') ?></textarea>
                        </div>

                        <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="6LcfKZIqAAAAAHPIfoy-RQqqUFSw7HadTo9q6PIE"></div>
                        </div>

                        <div class="mb-3">
                            <button id="btnSubmit" class="btn" type="submit" style="background: rgba(255,255,255,0);border-radius: 10em;padding: 0.5em 1.5em;border-width: 1px;border-color: var(--swiper-theme-color);color: var(--swiper-theme-color);">Kirim </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                    <input type="text" class="form-control me-2 w-100" placeholder="Tuliskan pesanmu" id="message">
                    <button class="btn btn-primary w-100" id="btnSend"><i class="bi bi-send"></i> Kirim</button>

                </div>
            </div>
        </div>
    </div>

    <!-- modallll detail-->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">DetailPesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <p><strong>Judul :</strong> <span id="titleModal" class="text-break"></span></p>
                    <p><strong>Status :</strong> <span id="statusModal" class="text-break"></span></p>
                    <p><strong>Dibuat :</strong> <span id="createdModal" class="text-break"></span></p>
                    <p><strong>Tipe :</strong> <span id="typeModal" class="text-break"></span></p>
                    <p><strong>Deskripsi :</strong> <span id="descriptionModal" class="text-break"></span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- modal delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">HapusPesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <p>Apakah kamu yakin hapus <strong id="titleDelete"></strong></p>
                </div>
                <div class="modal-footer">
                    <form action="/order/delete" method="post" class="me-2">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" id="idDelete">
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('Script') ?>
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
        return fetch(`/getMessage/${idOrder}`)
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
        return fetch('/sendMessage', {
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
<script>
    const detailOrder = document.getElementsByClassName('detailOrder');
    const title = document.getElementById('titleModal');
    const status = document.getElementById('statusModal');
    const created = document.getElementById('createdModal');
    const description = document.getElementById('descriptionModal');
    const type = document.getElementById('typeModal');
    Array.from(detailOrder).forEach(e => {
        e.addEventListener('click', function() {
            title.textContent = this.getAttribute('data-title');
            status.textContent = this.getAttribute('data-status');
            created.textContent = this.getAttribute('data-created');
            description.textContent = this.getAttribute('data-description');
            type.textContent = this.getAttribute('data-type');
        });
    });

    const deleteOrder = document.getElementsByClassName('deleteOrder');
    const titleDelete = document.getElementById('titleDelete');
    const idDelete = document.getElementById('idDelete');
    Array.from(deleteOrder).forEach(e => {
        e.addEventListener('click', function() {
            titleDelete.textContent = this.getAttribute('data-title');
            idDelete.value = this.getAttribute('data-id');
        });
    });
</script>
<?= $this->endSection() ?>