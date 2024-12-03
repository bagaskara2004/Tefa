<?= $this->extend('user\user') ?>
<?= $this->section('content') ?>
<section id="project" class="py-5">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2 class="fw-bold">Our Project</h2>
                <p class="text-muted">Curae hendrerit donec commodo hendrerit egestas tempus, turpis facilisis nostra nunc. Vestibulum dui eget ultrices.</p>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
            <?php foreach ($projek as $p): ?>
                <div class="col mb-4">
                    <div><a href="#"><img class="rounded img-fluid shadow w-100 fit-cover" src="https://www.korsa.io/images/service-3.png" style="height: 250px;"></a>
                        <div class="py-4"><span class="badge bg-primary mb-2">Website</span>
                            <h4 class="fw-bold"><?= esc($p['judul_projek']) ?></h4>
                            <p class="text-muted"><?= esc($p['deskripsi_projek']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- <div class="row">
            <div class="col d-flex justify-content-center align-self-center m-auto">
                #$pager->links('default', 'my_pager') ?>
            </div>
        </div> -->

    </div>
</section>
<?= $this->endSection() ?>