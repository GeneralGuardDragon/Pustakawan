<?= $this->include('layout/header') ?>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <link href="<?= base_url(); ?>/css/custom.css" rel="stylesheet">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <!--end::Header-->
      <!--begin::Sidebar-->
        <!--end::Sidebar Brand-->
       <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--begin::App Content-->
        <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                    <!-- Taruh sini -->
                        <div class="logo-wrapper">
                            <div class="logo-container">
                                <img src="<?= base_url('assets/img/lambang-unimma.png') ?>" alt="Logo Unimma" class="logo-img" />
                                <div class="shine"></div>
                            </div>
                        </div>
                        <p class="logo-description">
                        Sistem Pustakawan Terintegrasi <br>
                        Perputakaan Pusat Penelitian 
                        </p>
                    <div class="container d-flex justify-content-center align-items-center" style="min-height: 10vh;">
                      <div class="login-box">
                        <div class="card card-primary">
                          <div class="card-header text-center">
                            <h3 class="card-title">Login</h3>
                          </div>
                          <div class="card-body">
                            <?php if (session()->getFlashdata('error')) : ?>
                              <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                            <?php endif; ?>

                            <form action="<?= base_url('login') ?>" method="post">
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                              </div>
                              <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                              </div>
                              <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
                            </form>

                            <p class="mb-0 mt-3 text-center">
                              <a href="<?= base_url('/register') ?>">Belum punya akun?</a>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Stop Di sini -->
            </div>
            <!--end::Row-->
        </div>
    </div>
        <!--end::App Content-->
    </main>
      <!--end::App Main-->
      <!--begin::Footer-->
<?= $this->include('layout/footer') ?>
  <!--end::Body-->
</html>
