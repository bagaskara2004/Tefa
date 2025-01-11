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

<?php if (!empty($mitras)) : ?>
    <section style="margin-top:9em">
        <div class="container text-center">
            <?php foreach ($mitras as $mitra) : ?>
                <a href="<?= $mitra['link'] ?>"> <img class="m-3" src="https://res.cloudinary.com/dnppmhczy/image/upload/v1734609573/<?= $mitra['logo'] ?>"></a>
            <?php endforeach ?>
        </div>
    </section>
<?php endif ?>

<div class="container py-4 py-xl-5" style="margin-top: 9em">
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

<?php if (!empty($teams)) : ?>
    <div class="container py-4 py-xl-5" style="margin-top: 5em">
        <div
            class="row mb-4 mb-lg-5"
            data-aos="fade-up"
            data-aos-duration="600"
            data-aos-once="true">
            <div class="row justify-content-center text-center mb-2 mb-lg-4">
                <div class="col-12 col-lg-8 col-xxl-7 text-center mx-auto">
                    <h2 data-aos="fade-up" data-aos-duration="700" data-aos-once="true">
                        Our Team
                    </h2>
                    <p class="w-lg-50">Behind every successful project, there is a great dedicated team. We are a group of professionals who are passionate about creating the best solutions and delivering outstanding results for our clients.</p>
                </div>
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
                                src="https://res.cloudinary.com/dnppmhczy/image/upload/v1734609573/<?= $team['photo'] ?>"
                                alt="Profile Picture" />
                            <h5 class="fw-bold text-primary card-title mb-0"><?= $team['name'] ?></h5>
                            <p class="text-muted card-text mb-2"><?= $team['degree'] ?></p>

                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>


<?php if (!empty($testimonials)) : ?>
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center text-center mb-2 mb-lg-4">
                <div class="col-12 col-lg-8 col-xxl-7 text-center mx-auto">
                    <h2 data-aos="fade-up" data-aos-duration="700" data-aos-once="true">
                        Our Testimonials
                    </h2>
                    <p class="w-lg-50">We pride ourselves on providing the best services and solutions for our clients. Here are some testimonials from those who have worked with us</p>
                </div>
            </div>
            <div class="row py-5">
                <?php foreach ($testimonials as $testimonial) : ?>
                    <div class="col-md-4 py-2 py-md-2">
                        <div class="bg-light mb-5 mb-md-0 p-2 p-lg-5 text-center position-relative">
                            <img alt="" class="rounded-circle position-absolute translate-middle top-0" height="96" src="https://res.cloudinary.com/dnppmhczy/image/upload/v1734609573/<?= $testimonial['photo'] ?>" width="96">
                            <div class="text-primary mb-md-4 mb-2 mt-5 mt-lg-4">
                                <svg class="bi bi-quote" fill="currentColor" height="48" viewbox="0 0 16 16" width="48" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"></path>
                                </svg>
                            </div>
                            <p class="mb-4"><?= $testimonial['message'] ?></p>
                            <h6 class="mt-4 fw-bold"><?= $testimonial['username'] ?></h6>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?php endif ?>

<?= $this->endSection() ?>