<?= $this->extend('Component/user.php') ?>

<?= $this->section('Content') ?>
<section id="Hero" class="w-100 py-5">
    <div class="container mt-5">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                <h1
                    class="display-1 fw-bold"
                    data-aos="fade-up"
                    data-aos-duration="700"
                    data-aos-offset="50"
                    data-aos-once="true">
                    The Right Software Solution for Your
                    <span class="d-inline-block">
                        <img
                            class="img-fluid d-none d-md-inline-block"
                            src="/assets/img/ilustrasi/Untitled_design__2_-removebg-preview-min.webp"
                            alt="Design Icon"
                            loading="lazy"
                            width="100"
                            height="100" />
                    </span>
                    Business
                </h1>
                <p
                    class="lead text-muted mt-3"
                    data-aos="fade-up"
                    data-aos-duration="700"
                    data-aos-offset="50"
                    data-aos-delay="400"
                    data-aos-once="true">
                    A passionate agency delivers creative software solutions for impactful results.
                </p>
            </div>
        </div>
    </div>
</section>



<section class="text-center" id="portofolio" style="margin-top: 150px">
    <div class="container d-flex justify-content-center">
        <div
            class="carousel slide"
            data-bs-ride="carousel"
            data-bs-interval="3000"
            data-bs-pause="false"
            data-bs-touch="false"
            id="carousel-1"
            style="width: 70%">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img
                        class="w-100 d-block"
                        src="https://www.korsa.io/images/head-img2.png"
                        alt="Slide Image" />
                </div>
                <div class="carousel-item">
                    <img
                        class="w-100 d-block"
                        src="https://www.korsa.io/images/head-img2.png"
                        alt="Slide Image" />
                </div>
                <div class="carousel-item">
                    <img
                        class="w-100 d-block"
                        src="https://www.korsa.io/images/head-img4.png"
                        alt="Slide Image" />
                </div>
            </div>
            <div>
                <a
                    class="carousel-control-prev"
                    href="#carousel-1"
                    role="button"
                    data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a
                    class="carousel-control-next"
                    href="#carousel-1"
                    role="button"
                    data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a>
            </div>
            <div class="carousel-indicators bg-body-tertiary">
                <button
                    type="button"
                    data-bs-target="#carousel-1"
                    data-bs-slide-to="0"
                    class="active"></button>
                <button
                    type="button"
                    data-bs-target="#carousel-1"
                    data-bs-slide-to="1"></button>
                <button
                    type="button"
                    data-bs-target="#carousel-1"
                    data-bs-slide-to="2"></button>
            </div>
        </div>
    </div>
</section>
<section
    id="about"
    style="
            min-height: 100vh;
            position: relative;
            padding-top: 10em;
            margin-top: 10em;
            padding-bottom: 9em;
            width: 100%;
            display: flex;
            align-items: center;
        ">
    <img
        src="/assets/img/ilustrasi/Untitled design (3)-min.webp"
        alt="Background"
        style="
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                z-index: -1;
                max-width: 100%;
                max-height: 100%;
            " />
    <div class="container" style="max-width: 1292px">
        <div class="row">
            <div class="col">
                <h1
                    class="fs-6 text-light"
                    data-aos="fade-up"
                    data-aos-duration="600"
                    data-aos-once="true">
                    About Us
                </h1>
                <h2
                    class="text-light fw-bold mt-3"
                    style="font-size: calc(1.5rem + 3vw)"
                    data-aos="fade-up"
                    data-aos-duration="600"
                    data-aos-once="true">
                    Tefa is a center of innovation in software creation that connects education with industry.
                </h2>
                <p
                    class="text-light mt-4"
                    style="font-size: calc(1rem + 0.5vw)"
                    data-aos="fade-up"
                    data-aos-duration="700"
                    data-aos-delay="150"
                    data-aos-once="true">
                    We are the ones who have the creative idea to create software that attracts attention and puts customer satisfaction first
                </p>
            </div>
        </div>
    </div>
</section>



<div class="container py-4 py-xl-5" style="margin-top: 10em">
    <div class="row mb-5">
        <div
            class="col-md-8 col-xl-6 text-center mx-auto"
            data-aos="fade-up"
            data-aos-duration="700"
            data-aos-once="true">
            <h2>Why Us</h2>
            <p class="w-lg-50">
                We combine expert expertise and the passion of talented students to deliver the best results that meet your needs.
            </p>
        </div>
    </div>
    <div
        class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3"
        data-aos="fade-up"
        data-aos-duration="700"
        data-aos-once="true">
        <div class="col">
            <div class="d-flex">
                <div class="px-3">
                    <h4>Priced</h4>
                    <p>
                        High-quality service at a more affordable cost than other commercial services.
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex">
                <div class="px-3">
                    <h4>Technology</h4>
                    <p>
                        We use modern tools and methods to deliver efficient and reliable software.
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex">
                <div class="px-3">
                    <h4>Quality</h4>
                    <p>
                        We combine the expertise of experienced experts and the creativity of talented students to deliver the best results that suit your business needs.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="services" class="py-5" style="margin-top: 5em">
    <div class="container py-5">
        <div class="row mb-4 mb-lg-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold mb-2" style="color: var(--bs-body-color)">
                    Our Services
                </p>
                <h3 class="fw-bold">What we can do for you</h3>
            </div>
        </div>
        <div
            class="row row-cols-1 row-cols-md-2 mx-auto"
            style="max-width: 900px">
            <div
                class="col mb-5"
                data-aos="fade-up"
                data-aos-duration="700"
                data-aos-once="true">
                <img
                    class="rounded img-fluid shadow"
                    src="https://www.korsa.io/images/service-3.png" />
            </div>
            <div
                class="col d-md-flex align-items-md-end align-items-lg-center mb-5"
                data-aos="fade-up"
                data-aos-duration="700"
                data-aos-delay="400"
                data-aos-once="true">
                <div>
                    <h5 class="fw-bold">Website</h5>
                    <p class="text-muted mb-4">
                        We create a website for your business. which is certainly trusted and guaranteed quality
                    </p>
                </div>
            </div>
        </div>
        <div
            class="row row-cols-1 row-cols-md-2 mx-auto"
            style="max-width: 900px">
            <div
                class="col order-md-last mb-5"
                data-aos="fade-up"
                data-aos-duration="700"
                data-aos-delay="400"
                data-aos-once="true">
                <img
                    class="rounded img-fluid shadow"
                    src="https://www.korsa.io/images/service-1.png" />
            </div>
            <div
                class="col d-md-flex align-items-md-end align-items-lg-center mb-5"
                data-aos="fade-up"
                data-aos-duration="700"
                data-aos-once="true">
                <div>
                    <h5 class="fw-bold">Mobile Apps</h5>
                    <p class="text-muted mb-4">
                        We create mobile apps for your business. which of course is trusted and guaranteed quality
                    </p>
                </div>
            </div>
        </div>
        <div
            class="row row-cols-1 row-cols-md-2 mx-auto"
            style="max-width: 900px">
            <div
                class="col mb-5"
                data-aos="fade-up"
                data-aos-duration="700"
                data-aos-once="true">
                <img
                    class="rounded img-fluid shadow"
                    src="https://www.korsa.io/images/service-3.png" />
            </div>
            <div
                class="col d-md-flex align-items-md-end align-items-lg-center mb-5"
                data-aos="fade-up"
                data-aos-duration="700"
                data-aos-delay="400"
                data-aos-once="true">
                <div>
                    <h5 class="fw-bold">Desktop Apps</h5>
                    <p class="text-muted mb-4">
                        We create desktop apps for your business. which of course is trusted and guaranteed quality
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container py-4 py-xl-5" style="margin-top: 5em">
    <div
        class="row mb-4 mb-lg-5"
        data-aos="fade-up"
        data-aos-duration="600"
        data-aos-once="true">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>Our Team</h2>
            <p class="w-lg-50">
                We have a team that has experience in the field of technology and has high creativity
            </p>
        </div>
    </div>
    <div
        class="row gy-4 row-cols-2 row-cols-md-4"
        data-aos="fade-up"
        data-aos-duration="600"
        data-aos-delay="200"
        data-aos-once="true">

        <?php foreach ($teams as $team) : ?>
            <div class="col">
                <div class="card border-0 shadow-none">
                    <div class="card-body text-center d-flex flex-column align-items-center p-0">
                        <img
                            class="rounded-circle mb-3 fit-cover"
                            width="130"
                            height="130"
                            src="<?=$team['photo']?>"
                            alt="Profile Picture" />
                        <h5 class="fw-bold text-primary card-title mb-0"><?= $team['name'] ?></h5>
                        <p class="text-muted card-text mb-2"><?= $team['degree'] ?></p>
                        
                    </div>
                </div>
            </div>
        <?php endforeach ?>

    </div>
</div>
<div class="container py-4 py-xl-5" style="margin-top: 5em">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2 data-aos="fade-up" data-aos-duration="700" data-aos-once="true">
                Testimonials
            </h2>
        </div>
    </div>
    <div
        class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-lg-3"
        data-aos="fade-up"
        data-aos-duration="700"
        data-aos-delay="300"
        data-aos-once="true">

        <?php foreach ($testimonials as $testimonial) :?>
        <div class="col">
            <div>
                <p class="bg-body-tertiary border rounded border-0 p-4">
                    <?= $testimonial['message'] ?>
                </p>
                <div class="d-flex">
                    <img
                        class="rounded-circle flex-shrink-0 me-3 fit-cover"
                        width="50"
                        height="50"
                        src="<?=$testimonial['photo']?>" />
                    <div class="text-center d-xxl-flex align-items-xxl-center">
                        <p class="fw-bold text-primary mb-0"><?= $testimonial['username'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
        
    </div>
</div>
<?= $this->endSection() ?>