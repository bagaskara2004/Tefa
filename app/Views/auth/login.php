<?= $this->extend('Component/auth.php') ?>

<?= $this->section('Form') ?>
<form action="/auth/login" method="post" id="formAuth">
  <?= csrf_field() ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?= old('email') ?>" required minlength="10" maxlength="50">
  </div>
  <div class="mb-4">
    <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?= old('password') ?>" required minlength="5" maxlength="50">
  </div>
  <div class="mb-3">
    <div class="g-recaptcha" data-sitekey="6LcfKZIqAAAAAHPIfoy-RQqqUFSw7HadTo9q6PIE"></div>
  </div>
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div class="form-check">
      <input class="form-check-input primary" type="checkbox" id="flexCheckChecked" checked name="remember">
      <label class="form-check-label text-dark" for="flexCheckChecked">
        Ingat saya
      </label>
    </div>
    <a class="text-primary fw-bold" href="/auth/forgot">Lupa Kata Sandi ?</a>
  </div>
  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" id="btnSubmit">Masuk</button>
  <div class="d-flex align-items-center justify-content-center">
    <p class="fs-4 mb-0 fw-bold">Baru di tefa?</p>
    <a class="text-primary fw-bold ms-2" href="/auth/register">Buat akun</a>
  </div>
</form>
<?= $this->endSection() ?>