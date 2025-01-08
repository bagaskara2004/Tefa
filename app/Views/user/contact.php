<?= $this->extend('Component/user.php') ?>

<?= $this->section('Content') ?>
<section class="position-relative py-4 py-xl-5" style="margin-top: 5em;">
    <div class="container position-relative">
        <div class="row">
            <div class="col" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200" data-aos-once="true"><iframe allowfullscreen="" frameborder="0" src="<?= $location ?>" width="100%" height="100%"></iframe></div>
            <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-duration="600" data-aos-once="true">
                <div style="box-shadow: 0px 0px 12px 9px #7b7b7b15;">
                    <form class="p-3 p-xl-4" method="post" action="/order">
                        <h4>Order Now</h4>
                        <p class="text-muted">Order disini, isi form untuk membuat pesanan. pastikan data sesuai!</p>
                        <div class="mb-3">
                            <label class="form-label" for="judul">Judul</label>
                            <input class="form-control" type="text" id="judul" name="judul" value="<?= old('judul') ?>" required minlength="3" maxlength="25">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipe</label>
                            <?php foreach ($types as $type) : ?>
                                <div class="mb-2">
                                    <input id="<?= $type['type'] ?>" type="checkbox" name="type[]" value="<?= $type['id_type'] ?>">
                                    <label for="<?= $type['type'] ?>"><?= $type['type'] ?></label>
                                </div>
                            <?php endforeach ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="6" required minlength="20" maxlength="1000"><?= old('description') ?></textarea>
                        </div>

                        <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="6LcfKZIqAAAAAHPIfoy-RQqqUFSw7HadTo9q6PIE"></div>
                        </div>

                        <div class="mb-3">
                            <button class="btn" type="submit" style="background: rgba(255,255,255,0);border-radius: 10em;padding: 0.5em 1.5em;border-width: 1px;border-color: var(--swiper-theme-color);color: var(--swiper-theme-color);">Send </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>