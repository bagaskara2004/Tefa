<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
	<meta charset="utf-8" />
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
	<title>Tefa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" /> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/css/Inter.css" />
	<link rel="stylesheet" href="assets/css/Montserrat.css" />
	<link rel="stylesheet" href="assets/css/Montserrat%20Alternates.css" />
	<link rel="stylesheet" href="assets/css/swiper-icons.css" />
	<link rel="stylesheet" href="assets/css/aos.min.css" />
	<link rel="stylesheet" href="assets/css/Navbar-Centered-Links-icons.css" />
	<link
		rel="stylesheet"
		href="assets/css/Simple-Slider-swiper-bundle.min.css" />
	<link rel="stylesheet" href="assets/css/Simple-Slider.css" />
	<link rel="stylesheet" href="assets/css/Testimonials-Centered-images.css" />
</head>

<body>
	<nav class="navbar navbar-expand-md fixed-top bg-body py-3" id="navbar">
		<div class="container">
			<a class="navbar-brand d-flex align-items-center" href="#"><span
					class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"
					style="
							background: url('assets/img/https___www.pnb-gianyar.ac.id_wp-content_uploads_2022_05_Logo-Politeknik-Negeri-Bali.png')
								center / cover round;
						"></span><span></span></a><button
				data-bs-toggle="collapse"
				class="navbar-toggler"
				data-bs-target="#navcol-1">
				<span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navcol-1">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link active" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/about">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/project">Project</a>
					</li>
					<li class="nav-item"><a class="nav-link" href="#">Order</a></li>
					<li class="nav-item"><a class="nav-link" href="/auth">Login</a></li>
				</ul>
				<button
					class="btn text-center"
					type="button"
					style="
							background: rgba(255, 255, 255, 0);
							border-radius: 10em;
							padding: 0.5em 2em;
							border-width: 1px;
							border-color: var(--swiper-theme-color);
							color: var(--swiper-theme-color);
						">
					Order Now
				</button>
			</div>
		</div>
	</nav>
	<?= $this->renderSection('content') ?>
	<footer class="text-center py-4" style="margin-top: 10em">
		<div class="container">
			<div class="row row-cols-1 row-cols-lg-3">
				<div class="col">
					<p class="text-muted my-2">
						Copyright&nbsp;© 2024 Politeknik Negeri Bali
					</p>
				</div>
				<div class="col">
					<ul class="list-inline my-2">
						<li class="list-inline-item me-4">
							<div
								class="bs-icon-circle bs-icon"
								style="
										background: rgba(70, 87, 113, 0);
										border: 1px solid var(--bs-emphasis-color);
									">
								<i
									xmlns="http://www.w3.org/2000/svg"
									width="1em"
									height="1em"
									fill="currentColor"
									viewBox="0 0 16 16"
									class="bi bi-facebook text-black">

								</i>
							</div>
						</li>
						<li class="list-inline-item me-4">
							<div
								class="bs-icon-circle bs-icon-primary bs-icon"
								style="
										background: rgba(70, 87, 113, 0);
										border: 1px solid var(--bs-emphasis-color);
									">
								<i
									xmlns="http://www.w3.org/2000/svg"
									width="1em"
									height="1em"
									fill="currentColor"
									viewBox="0 0 16 16"
									class="bi bi-twitter text-black">
									
								</i>
							</div>
						</li>
						<li class="list-inline-item">
							<div
								class="bs-icon-circle bs-icon-primary bs-icon"
								style="
										background: rgba(70, 87, 113, 0);
										border: 1px solid var(--bs-emphasis-color);
									">
								<i
									xmlns="http://www.w3.org/2000/svg"
									width="1em"
									height="1em"
									fill="currentColor"
									viewBox="0 0 16 16"
									class="bi bi-instagram text-black">
									
								</i>
							</div>
						</li>
					</ul>
				</div>
				<div class="col">
					<ul class="list-inline my-2">
						<li class="list-inline-item">
							<a class="link-secondary" href="#">Privacy Policy</a>
						</li>
						<li class="list-inline-item">
							<a class="link-secondary" href="#">Terms of Use</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	<!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
	<script src="assets/js/aos.min.js"></script>
	<script src="assets/js/bs-init.js"></script>
	<script src="assets/js/Simple-Slider-swiper-bundle.min.js"></script>
	<script src="assets/js/Simple-Slider.js"></script>
</body>

</html>