<?= $this->extend('Component/user.php') ?>

<?= $this->section('Content') ?>
<style>
    .notif {
        position: relative;
    }

    .notif::after {
        content: "";
        position: absolute;
        top: 1px;
        right: 1px;
        width: 13px;
        height: 13px;
        background-color: red;
        border-radius: 50%;
        border: 2px solid white;

    }

    .dropdown-item {
        cursor: pointer;
    }
</style>

<section class="position-relative py-4 py-xl-5" style="margin-top: 5em;">
    <div class="container position-relative">
        <div class="row">
            <div class="col mb-2" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200" data-aos-once="true">
                <div style="box-shadow: 0px 0px 12px 9px #7b7b7b15;">
                    <div class="p-3">
                        <h4>List Order</h4>
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
                                            <li><a data-created="<?= $order['created'] ?>" data-status="<?= $order['status'] ?>" data-title="<?= $order['title'] ?>" data-type="<?= $order['types'] ?>" data-description="<?= $order['description'] ?>" data-bs-toggle="modal" data-bs-target="#orderModal" class="dropdown-item d-flex align-items-center detailOrder">
                                                    <button type="button" class="btn btn-secondary me-2"><i class="bi bi-eye"></i></button>
                                                    <h6 class="text-secondary">Detail</h6>
                                                </a>
                                            </li>
                                            <li><a data-title="<?= $order['title'] ?>" data-id="<?= $order['id_order'] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal" class="dropdown-item d-flex align-items-center deleteOrder">
                                                    <button type="button" class="btn btn-danger me-2"><i class="bi bi-trash"></i></button>
                                                    <h6 class="text-danger">Delete</h6>
                                                </a>
                                            </li>
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
                    <form class="p-3 p-xl-4" method="post" action="/order">
                        <h4>Order Now</h4>
                        <p class="text-muted">Order disini, isi form untuk membuat pesanan. pastikan data sesuai!</p>
                        <div class="mb-3">
                            <label class="form-label" for="judul">Judul</label>
                            <input class="form-control" type="text" id="judul" name="judul" value="<?= old('judul') ?>" required minlength="3" maxlength="25">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipe</label>
                            <?php foreach ($types as $type) : ?>
                                <div class="mb-2">
                                    <input id="<?= $type['type'] ?>" type="checkbox" name="type[]" value="<?= $type['id_type'] ?>">
                                    <label for="<?= $type['type'] ?>"><?= $type['type'] ?></label>
                                </div>
                            <?php endforeach ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="6" required minlength="20" maxlength="1000"><?= old('description') ?></textarea>
                        </div>

                        <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="6LcfKZIqAAAAAHPIfoy-RQqqUFSw7HadTo9q6PIE"></div>
                        </div>

                        <div class="mb-3">
                            <button class="btn" type="submit" style="background: rgba(255,255,255,0);border-radius: 10em;padding: 0.5em 1.5em;border-width: 1px;border-color: var(--swiper-theme-color);color: var(--swiper-theme-color);">Send </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modallll detail-->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">DetailOrder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <p><strong>Title :</strong> <span id="titleModal" class="text-break"></span></p>
                    <p><strong>Status :</strong> <span id="statusModal" class="text-break"></span></p>
                    <p><strong>Created :</strong> <span id="createdModal" class="text-break"></span></p>
                    <p><strong>Type :</strong> <span id="typeModal" class="text-break"></span></p>
                    <p><strong>Description :</strong> <span id="descriptionModal" class="text-break"></span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- modal delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">DeleteOrder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <p>Apakah kamu yakin hapus <strong id="titleDelete"></strong></p>
                </div>
                <div class="modal-footer">
                    <form action="/order/delete" method="post" class="me-2">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" id="idDelete">
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

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