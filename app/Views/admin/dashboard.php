<?= $this->extend('Component/admin.php') ?>

<?= $this->section('Content') ?>
<div class="row">
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-4">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Pesanan bulan ini</h5>
                    </div>
                    <div>
                        <span class="badge bg-success"><?= $totalOrders ?> Total</span>
                    </div>
                </div>
                <div>
                    <h3 class="fw-semibold mb-3">Pesanan yang ditempatkan: <span class="text-primary"><?= $totalOrders ?></span></h3>
                    <h3 class="fw-semibold mb-3">Pesanan ditolak: <span class="text-danger"><?= $rejectedOrders ?></span></h3>
                    <h3 class="fw-semibold mb-3">Pesanan selesai: <span class="text-success"><?= $finishedOrders ?></span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-lg-12">
                <!-- Pembagian Tahunan -->
                <div class="card overflow-hidden">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4 fw-semibold">Pengguna bulan ini</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3"><?= $newUsers ?></h4>
                                <small class="text-muted">Pengguna baru terdaftar bulan ini</small>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <!-- Pendapatan Bulanan -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-4 fw-semibold">Proyek bulan ini</h5>
                                <h4 class="fw-semibold mb-3"><?= $newProjects ?></h4>
                                <small class="text-muted">Proyek baru dibuat bulan ini</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="mb-4">
                    <h5 class="card-title fw-semibold">Proyek Terbaru</h5>
                </div>
                <ul class="timeline-widget mb-0 position-relative mb-n5">
                    <?php foreach ($recentProjects as $project): ?>
                    <li class="timeline-item d-flex position-relative overflow-hidden">
                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                            <span class="timeline-badge border-2 border-primary flex-shrink-0 my-2"></span>
                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                        </div>
                        <div class="timeline-desc fs-5 text-dark mt-n1">
                            Proyek Baru tercatat: <strong><?= $project['title'] ?></strong>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Pesanan Terbaru</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">ID Pesanan</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">ID Pengguna</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Judul</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Deskripsi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recentOrders as $order): ?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?= $order['id_order'] ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?= $order['id_user'] ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?= $order['title'] ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <h6 class="fw-semibold mb-1"><?= $order['description'] ?></h6>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="py-6 px-6 text-center">
    <p class="mb-0 fs-4">Desain dan Dikembangkan oleh <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a></p>
</div> -->

<?= $this->endSection() ?>