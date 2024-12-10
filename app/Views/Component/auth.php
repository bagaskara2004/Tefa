<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tefa</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                  <div class="text-nowrap logo-img text-center d-block pt-3 pb-4 w-100">
                    <img src="/assets/img/logos/tefa.png" width="150" alt="">
                  </div>
                <?= $this->renderSection('Form') ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="position-fixed bottom-0 start-0">
      <?php if (session()->getFlashdata('errorarray')) { ?>
        <?php foreach (session()->getFlashdata('errorarray') as $err) { ?>
          <div class="alert alert-danger alert-dismissible fade show m-1" role="alert">
            <small><?= $err ?></small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
      <?php } ?>
      <?php if (session()->getFlashdata('error')) { ?>
        <div class="alert alert-danger alert-dismissible fade show m-1" role="alert">
          <small><?= session()->getFlashdata('error') ?></small>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } ?>
      <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success alert-dismissible fade show m-1" role="alert">
          <small><?= session()->getFlashdata('success') ?></small>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } ?>
    </div>
  </div>
  <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/auth.js"></script>
</body>

</html>