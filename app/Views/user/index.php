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
                    Delivering creativity with our design
                    <span class="d-inline-block">
                        <img
                            class="img-fluid d-none d-md-inline-block"
                            src="/assets/img/ilustrasi/Untitled_design__2_-removebg-preview-min.webp"
                            alt="Design Icon"
                            loading="lazy"
                            width="100"
                            height="100" />
                    </span>
                    solutions
                </h1>
                <p
                    class="lead text-muted mt-3"
                    data-aos="fade-up"
                    data-aos-duration="700"
                    data-aos-offset="50"
                    data-aos-delay="400"
                    data-aos-once="true">
                    Passionate agency delivering creative design solutions for
                    impactful results.
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
                    Korsa is a Creative Design Agency With Extensive Experience<br />And
                    Talented Team.
                </h2>
                <p
                    class="text-light mt-4"
                    style="font-size: calc(1rem + 0.5vw)"
                    data-aos="fade-up"
                    data-aos-duration="700"
                    data-aos-delay="150"
                    data-aos-once="true">
                    We are the ones with the creative idea of ​​creating stunning
                    visuals that grab attention and leave a lasting impression!
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
                Curae hendrerit donec commodo hendrerit egestas tempus, turpis
                facilisis nostra nunc. Vestibulum dui eget ultrices.
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
                <div
                    class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon"
                    style="
                                    background: rgb(234, 232, 232);
                                    border-width: 2px;
                                    border-color: var(--bs-body-color);
                                ">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="1em"
                        height="1em"
                        fill="currentColor"
                        viewBox="0 0 16 16"
                        class="bi bi-bell text-dark">
                        <path
                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6"></path>
                    </svg>
                </div>
                <div class="px-3">
                    <h4>Title</h4>
                    <p>
                        Erat netus est hendrerit, nullam et quis ad cras porttitor
                        iaculis. Bibendum vulputate cras aenean.
                    </p>
                    <a href="#">Learn More&nbsp;<svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="1em"
                            height="1em"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            class="bi bi-arrow-right">
                            <path
                                fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                        </svg></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex">
                <div
                    class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon"
                    style="
                                    background: rgb(234, 232, 232);
                                    border-width: 2px;
                                    border-color: var(--bs-body-color);
                                ">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="1em"
                        height="1em"
                        fill="currentColor"
                        viewBox="0 0 16 16"
                        class="bi bi-bezier text-dark">
                        <path
                            fill-rule="evenodd"
                            d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"></path>
                        <path
                            d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                    </svg>
                </div>
                <div class="px-3">
                    <h4>Title</h4>
                    <p>
                        Erat netus est hendrerit, nullam et quis ad cras porttitor
                        iaculis. Bibendum vulputate cras aenean.
                    </p>
                    <a href="#">Learn More&nbsp;<svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="1em"
                            height="1em"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            class="bi bi-arrow-right">
                            <path
                                fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                        </svg></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex">
                <div
                    class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon"
                    style="
                                    background: rgb(234, 232, 232);
                                    border-width: 2px;
                                    border-color: var(--bs-body-color);
                                ">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="1em"
                        height="1em"
                        fill="currentColor"
                        viewBox="0 0 16 16"
                        class="bi bi-flag text-dark">
                        <path
                            d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z"></path>
                    </svg>
                </div>
                <div class="px-3">
                    <h4>Title</h4>
                    <p>
                        Erat netus est hendrerit, nullam et quis ad cras porttitor
                        iaculis. Bibendum vulputate cras aenean.
                    </p>
                    <a href="#">Learn More&nbsp;<svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="1em"
                            height="1em"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            class="bi bi-arrow-right">
                            <path
                                fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                        </svg></a>
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
                    <h5 class="fw-bold">Web Design</h5>
                    <p class="text-muted mb-4">
                        Erat netus est hendrerit, nullam et quis ad cras porttitor
                        iaculis. Bibendum vulputate cras aenean.
                    </p>
                    <button class="btn btn-primary shadow" type="button">
                        Learn more
                    </button>
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
                    <h5 class="fw-bold">Mobile Apps Design</h5>
                    <p class="text-muted mb-4">
                        Erat netus est hendrerit, nullam et quis ad cras porttitor
                        iaculis. Bibendum vulputate cras aenean.
                    </p>
                    <button class="btn btn-primary shadow" type="button">
                        Learn more
                    </button>
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
                Curae hendrerit donec commodo hendrerit egestas tempus, turpis
                facilisis nostra nunc. Vestibulum dui eget ultrices.
            </p>
        </div>
    </div>
    <div
        class="row gy-4 row-cols-2 row-cols-md-4"
        data-aos="fade-up"
        data-aos-duration="600"
        data-aos-delay="200"
        data-aos-once="true">
        <div class="col">
            <div class="card border-0 shadow-none">
                <div class="card-body text-center d-flex flex-column align-items-center p-0">
                    <img
                        class="rounded-circle mb-3 fit-cover"
                        width="130"
                        height="130"
                        src="/assets/img/avatars/avatar6.jpg"
                        alt="Profile Picture" />
                    <h5 class="fw-bold text-primary card-title mb-0">Bagas Drible</h5>
                    <p class="text-muted card-text mb-2">Dosen</p>
                    <ul class="list-inline fs-6 text-muted w-100 mb-0">
                        <li class="list-inline-item text-center">
                            <i class="bi bi-facebook"></i>
                        </li>
                        <li class="list-inline-item text-center">
                            <i class="bi bi-twitter"></i>
                        </li>
                        <li class="list-inline-item text-center">
                            <i class="bi bi-instagram"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 shadow-none">
                <div class="card-body text-center d-flex flex-column align-items-center p-0">
                    <img
                        class="rounded-circle mb-3 fit-cover"
                        width="130"
                        height="130"
                        src="/assets/img/avatars/avatar7.jpg"
                        alt="Profile Picture" />
                    <h5 class="fw-bold text-primary card-title mb-0">Bagas Drible</h5>
                    <p class="text-muted card-text mb-2">Dosen</p>
                    <ul class="list-inline fs-6 text-muted w-100 mb-0">
                        <li class="list-inline-item text-center">
                            <i class="bi bi-facebook"></i>
                        </li>
                        <li class="list-inline-item text-center">
                            <i class="bi bi-twitter"></i>
                        </li>
                        <li class="list-inline-item text-center">
                            <i class="bi bi-instagram"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 shadow-none">
                <div class="card-body text-center d-flex flex-column align-items-center p-0">
                    <img
                        class="rounded-circle mb-3 fit-cover"
                        width="130"
                        height="130"
                        src="/assets/img/avatars/avatar8.jpg"
                        alt="Profile Picture" />
                    <h5 class="fw-bold text-primary card-title mb-0">Bagas Drible</h5>
                    <p class="text-muted card-text mb-2">Dosen</p>
                    <ul class="list-inline fs-6 text-muted w-100 mb-0">
                        <li class="list-inline-item text-center">
                            <i class="bi bi-facebook"></i>
                        </li>
                        <li class="list-inline-item text-center">
                            <i class="bi bi-twitter"></i>
                        </li>
                        <li class="list-inline-item text-center">
                            <i class="bi bi-instagram"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 shadow-none">
                <div class="card-body text-center d-flex flex-column align-items-center p-0">
                    <img
                        class="rounded-circle mb-3 fit-cover"
                        width="130"
                        height="130"
                        src="/assets/img/avatars/avatar9.jpg"
                        alt="Profile Picture" />
                    <h5 class="fw-bold text-primary card-title mb-0">Bagas Drible</h5>
                    <p class="text-muted card-text mb-2">Dosen</p>
                    <ul class="list-inline fs-6 text-muted w-100 mb-0">
                        <li class="list-inline-item text-center">
                            <i class="bi bi-facebook"></i>
                        </li>
                        <li class="list-inline-item text-center">
                            <i class="bi bi-twitter"></i>
                        </li>
                        <li class="list-inline-item text-center">
                            <i class="bi bi-instagram"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

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
        <div class="col">
            <div>
                <p class="bg-body-tertiary border rounded border-0 p-4">
                    Nisi sit justo faucibus nec ornare amet, tortor torquent. Blandit
                    class dapibus, aliquet morbi.
                </p>
                <div class="d-flex">
                    <img
                        class="rounded-circle flex-shrink-0 me-3 fit-cover"
                        width="50"
                        height="50"
                        src="/assets/img/avatars/avatar7.jpg" />
                    <div class="text-center d-xxl-flex align-items-xxl-center">
                        <p class="fw-bold text-primary mb-0">Bagas Drible</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div>
                <p class="bg-body-tertiary border rounded border-0 p-4">
                    Nisi sit justo faucibus nec ornare amet, tortor torquent. Blandit
                    class dapibus, aliquet morbi.
                </p>
                <div class="d-flex">
                    <img
                        class="rounded-circle flex-shrink-0 me-3 fit-cover"
                        width="50"
                        height="50"
                        src="/assets/img/avatars/avatar8.jpg" />
                    <div class="d-xxl-flex align-items-xxl-center">
                        <p class="fw-bold text-primary mb-0">Bagas Drible</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div>
                <p class="bg-body-tertiary border rounded border-0 p-4">
                    Nisi sit justo faucibus nec ornare amet, tortor torquent. Blandit
                    class dapibus, aliquet morbi.
                </p>
                <div class="d-flex">
                    <img
                        class="rounded-circle flex-shrink-0 me-3 fit-cover"
                        width="50"
                        height="50"
                        src="/assets/img/avatars/avatar9.jpg" />
                    <div class="d-xxl-flex align-items-xxl-center">
                        <p class="fw-bold text-primary mb-0">Bagas Drible</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>