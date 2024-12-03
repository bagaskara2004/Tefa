

<?= $this->extend('user\user') ?>
<?= $this->section('content') ?>
		<section class="py-4 py-md-5 my-5">
			<div class="container py-md-5">
				<div class="row justify-content-center">
					<!-- Image Section -->
					<div
						class="col-md-6 text-center"
						style="max-width: 500px; margin-bottom: 30px">
						<img
							class="img-fluid"
							src="assets/img/ilustrasi/undraw_welcome_cats_thqn%20(2).svg"
							alt="Welcome Cats" />
					</div>
					<!-- Form Section -->
					<div class="col-md-5 col-xl-4 text-center text-md-start">
						<h2 class="display-6 fw-bold mb-5">
							<span
								class="underline pb-1"
								style="
									font-size: 36px;
									color: var(--bs-body-color);
									line-height: normal;
								"
								>Login</span
							>
						</h2>
						<form method="post" data-bs-theme="light">
							<div class="mb-3">
								<input
									class="form-control"
									type="text"
									name="username"
									placeholder="Username" />
							</div>
							<div class="mb-3">
								<input
									class="form-control"
									type="password"
									name="password"
									placeholder="Password" />
							</div>
							<div class="mb-5">
								<button
									class="btn btn-primary shadow"
									type="submit"
									style="background: rgb(13, 110, 253)">
									Login
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<?= $this->endSection() ?>