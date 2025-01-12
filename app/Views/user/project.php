<?= $this->extend('Component/user.php') ?>

<?= $this->section('Content') ?>
<?php if (!empty($projects)) : ?>
    <section id="project" class="py-5">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">Our Project</h2>
                    <p class="text-muted">We are proud to present various projects that we have completed with dedication and innovation. Each project is designed to provide the best solution and create an unforgettable experience for users.</p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                <?php foreach ($projects as $project) : ?>
                    <div class="col mb-4">
                        <div>
                            <img class="rounded img-fluid shadow w-100 fit-cover" src="https://res.cloudinary.com/dnppmhczy/image/upload/v1736507757/<?= $project['photo'] ?>" style="height: 250px;">
                            <div class="py-4">
                                <?php foreach (explode(', ', $project['types']) as $types) :?>
                                    <span class="badge bg-primary mb-2"><?= $types ?></span>
                                <?php endforeach?>
                                <h4 class="fw-bold"><?= $project['title'] ?></h4>
                                <p class="text-muted"><?= $project['description'] ?></p>
                                <a class="btn btn-primary px-5" href="<?= $project['url'] ?>" role="button">Visit</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center align-self-center m-auto">
                    <?= $pager->links('project', 'project_pagination') ?>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <h5 class=" text-center text-secondary">No Projects Yet</h5>
    </div>
<?php endif ?>
<?= $this->endSection() ?>