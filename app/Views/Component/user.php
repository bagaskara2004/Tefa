<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tefa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&amp;display=swap">
    <link rel="stylesheet" href="/assets/css/swiper-icons.css">
    <link rel="stylesheet" href="/assets/css/aos.min.css">
    <link rel="stylesheet" href="/assets/css/Navbar-Centered-Links-icons.css">
    <link rel="stylesheet" href="/assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="/assets/css/Testimonials-Centered-images.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top bg-body py-3" id="navbar">
        <div class="container">
            <div class="navbar-brand d-flex align-items-center"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon" style="background: url(&quot;/assets/img/logos/pnb.png&quot;) center / cover round;"></span><span></span></div><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link <?= $page == 'Home' ? 'active' : '' ?>" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == 'Project' ? 'active' : '' ?>" href="/project">Projek</a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == 'Contact' ? 'active' : '' ?>" href="/contact">Kontak</a></li>
                    <?php if (isset($user)) : ?>
                        <li class="nav-item"><a class="nav-link <?= $page == 'Order' ? 'active' : '' ?>" href="/order">Pesanan</a></li>
                    <?php endif ?>
                </ul>
                <?php if (isset($user)) : ?>
                    <div class="dropdown">
                        <a
                            href="#"
                            id="profileDropdown"
                            class="d-flex align-items-center"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            style="cursor: pointer;">
                            <img
                                src="https://res.cloudinary.com/dnppmhczy/image/upload/v1734949243/<?= $user['photo'] ?>"
                                alt="Profile"
                                style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                        </a>
                        <ul
                            class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="profileDropdown"
                            style="min-width: 150px;">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#userModal">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Keluar</a></li>
                        </ul>
                    </div>
                <?php else : ?>
                    <a href="/auth/login" class="btn text-center" style="background: rgba(255,255,255,0);border-radius: 10em;padding: 0.5em 2em;border-width: 1px;border-color: var(--swiper-theme-color);color: var(--swiper-theme-color);">Sign In</a>
                <?php endif ?>
            </div>
        </div>
    </nav>
    <main>

        <?= $this->renderSection('Content') ?>

        <?php if (isset($user)) : ?>
            <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userModalLabel">Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="https://res.cloudinary.com/dnppmhczy/image/upload/v1734949243/<?= $user['photo'] ?>" alt="User Photo" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" class="mb-3">
                            <h5 id="username"><?= $user['username'] ?></h5>
                            <p id="email">Email : <?= $user['email'] ?></p>
                            <p id="telp">Telp : <?= $user['telp'] ?></p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-warning" data-bs-target="#editModal" data-bs-toggle="modal" data-bs-dismiss="modal">Edit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/editProfile" method="post" class="d-flex flex-column" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Photo :</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" id="flexCheckChecked" name="default">
                                        <label class="form-check-label text-dark" for="flexCheckChecked">
                                            tanpa profile
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username :</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telp" class="form-label">Telp :</label>
                                    <input type="text" class="form-control" id="telp" name="telp" value="<?= $user['telp'] ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary" id="btnSubmit">Simpan</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <div class="position-fixed bottom-0 start-0" id="msgUser">
            <?php if (session()->getFlashdata('errorarray')) { ?>
                <?php foreach (session()->getFlashdata('errorarray') as $err) { ?>
                    <div class="alert alert-danger alert-dismissible fade show m-1" role="alert">
                        <small><?= $err ?></small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
            <?php } ?>
            <?php if (session()->getFlashdata('error')) { ?>
                <div class="alert alert-danger alert-dismissible fade show m-1" role="alert">
                    <small><?= session()->getFlashdata('error') ?></small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <?php if (session()->getFlashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible fade show m-1" role="alert">
                    <small><?= session()->getFlashdata('success') ?></small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
        </div>
    </main>
    <footer class="text-center py-4" style="margin-top: 10em;">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-3">
                <div class="col">
                    <p class="text-muted my-2">Copyright&nbsp;© 2024 Politeknik Negeri Bali</p>
                </div>
                <div class="col">
                    <ul class="list-inline my-2">
                        <?php foreach ($medias as $media) : ?>
                            <li class="list-inline-item me-4">
                                <a href="<?= $media['link'] ?>" class="btn"><i class="bi <?= $media['icon'] ?>"></i></a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="col">
                    <ul class="list-inline my-2">
                        <li class="list-inline-item"><a class="link-secondary" href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a class="link-secondary" href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?= $this->renderSection('Script') ?>
    <script>
        const formUser = document.getElementById('formUser');
        const btnSubmit = document.getElementById('btnSubmit');
        formUser.addEventListener('submit', function() {
            btnSubmit.disabled = true;
            btnSubmit.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
        });
    </script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/js/aos.min.js"></script>
    <script src="/assets/js/bs-init.js"></script>
    <script src="/assets/js/Simple-Slider-swiper-bundle.min.js"></script>
    <script src="/assets/js/Simple-Slider.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>