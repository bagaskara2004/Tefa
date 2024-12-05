<?= $this->extend('Component/user.php') ?>

<?= $this->section('Content') ?>
<section class="position-relative py-4 py-xl-5" style="margin-top: 5em;">
    <div class="container position-relative">
        <div class="row">
            <div class="col" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200" data-aos-once="true"><iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d985.7154086506637!2d115.1628662!3d-8.7990675!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244c13ee9d753%3A0x6c05042449b50f81!2sPoliteknik%20Negeri%20Bali!5e0!3m2!1sid!2sid!4v1727521330800!5m2!1sid!2sid" width="100%" height="100%"></iframe></div>
            <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-duration="600" data-aos-once="true">
                <div style="box-shadow: 0px 0px 12px 9px #7b7b7b15;">
                    <form class="p-3 p-xl-4" method="post">
                        <h4>Order Now</h4>
                        <p class="text-muted">Eros ligula lobortis elementum amet commodo ac nibh ornare, eu lobortis.</p>
                        <div class="mb-3"><label class="form-label" for="name">Judul</label><input class="form-control" type="text" id="name-2" name="judul"></div>
                        <div class="mb-3"><label class="form-label" for="name">Tipe</label><select class="form-select">
                                <option value="">Mobile</option>
                                <option value="">Website</option>
                            </select></div>
                        <div class="mb-3"><label class="form-label" for="description">Description</label><textarea class="form-control" id="description" name="description" rows="6"></textarea></div>
                        <div class="mb-3"><button class="btn" type="button" style="background: rgba(255,255,255,0);border-radius: 10em;padding: 0.5em 1.5em;border-width: 1px;border-color: var(--swiper-theme-color);color: var(--swiper-theme-color);">Send </button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>