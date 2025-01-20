<?= $this->extend('Component/auth.php') ?>

<?= $this->section('Form') ?>
<form action="/auth/register" method="post" id="formAuth">
  <?= csrf_field() ?>
  <div class="mb-3">
    <label for="exampleInputtext1" class="form-label">Nama Pengguna</label>
    <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" autocomplete="off" name="username" value="<?= old('username') ?>" required minlength="3" maxlength="25">
  </div>
  <div class="mb-4">
    <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?= old('password') ?>" required minlength="5" maxlength="50">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" name="email" value="<?= old('email') ?>" required minlength="10" maxlength="50">
  </div>
  <div class="mb-4">
    <label for="exampleInputTelp1" class="form-label">Telp</label>
    <input type="text" class="form-control" id="exampleInputTelp1" name="telp" value="<?= old('telp') ?>" required minlength="10" maxlength="15">
  </div>
  <div class="mb-3">
    <div class="g-recaptcha" data-sitekey="6LcfKZIqAAAAAHPIfoy-RQqqUFSw7HadTo9q6PIE"></div>
  </div>
  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" id="btnSubmit">Daftar</button>
  <div class="d-flex align-items-center justify-content-center">
    <p class="fs-4 mb-0 fw-bold">Sudah memiliki akun?</p>
    <a class="text-primary fw-bold ms-2" href="/auth/login">Masuk</a>
  </div>
</form>
<?= $this->endSection() ?>