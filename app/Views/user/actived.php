<?= $this->extend('Component/auth.php') ?>

<?= $this->section('Form') ?>
<form action="/actived/form" method="post">
    <!-- Input fields for OTP -->
    <div class="row g-1 justify-content-center mb-4">
        <!-- Kolom input, berubah sesuai layar -->
        <div class="col-4 col-sm-2">
            <input type="text" class="form-control text-center otp-input" maxlength="1" required name="input1" value="<?= old('input1')?>">
        </div>
        <div class="col-4 col-sm-2">
            <input type="text" class="form-control text-center otp-input" maxlength="1" required name="input2" value="<?= old('input2')?>">
        </div>
        <div class="col-4 col-sm-2">
            <input type="text" class="form-control text-center otp-input" maxlength="1" required name="input3" value="<?= old('input3')?>">
        </div>
        <div class="col-4 col-sm-2">
            <input type="text" class="form-control text-center otp-input" maxlength="1" required name="input4" value="<?= old('input4')?>">
        </div>
        <div class="col-4 col-sm-2">
            <input type="text" class="form-control text-center otp-input" maxlength="1" required name="input5" value="<?= old('input5')?>">
        </div>
        <div class="col-4 col-sm-2">
            <input type="text" class="form-control text-center otp-input" maxlength="1" required name="input6" value="<?= old('input6')?>">
        </div>
    </div>
    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Verify</button>
    <div class="d-flex align-items-center justify-content-center">
        <p class="fs-4 mb-0 fw-bold">Not receiving OTP?</p>
        <a class="text-primary fw-bold ms-2" href="/actived/resendotp">Resend OTP</a>
    </div>
</form>
<?= $this->endSection() ?>