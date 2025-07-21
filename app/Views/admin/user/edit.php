<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Akademik</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE | Dashboard v3" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
        <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <!-- DATATABLES BS 4 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
        <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <!-- DATATABLES BS 4 -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <?php if (session()->get('logged_in')): ?>
                    <span class="d-none d-md-inline">
                    Selamat Datang <?= session()->get('nama'); ?>
                    </span>
                <?php endif; ?>
              </a>
            </li>
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary btn-flat float-end">Sign out</a>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="/dashboard" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="/assets/img/lambang-unimma.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Akademik Nara</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
            <li class="nav-item menu-open">
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="<?= base_url('/akun') ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Data Akun</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="<?= base_url('/buku') ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Data Buku</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="<?= base_url('/peminjaman') ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Data Peminjaman</p>
                    </a>
                    </li>
                </ul>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
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
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Akun User</h5>
                        </div>
                        <div class="card-body">
                            <?php if(session('errors')): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                <?php foreach(session('errors') as $e): ?>
                                    <li><?= esc($e) ?></li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif; ?>

                            <form method="post" action="<?= base_url('/user/update/'.$user['id']) ?>">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label>Nama</label>
                                <input name="nama" class="form-control" value="<?= esc($user['nama']) ?>">
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>">
                            </div>

                            <div class="mb-3">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="<?= esc($user['tanggal_lahir']) ?>">
                            </div>

                            <div class="mb-3">
                                <label>Password <small class="text-muted">(kosongkan jika tidak diubah)</small></label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                <?php foreach(['admin','petugas','pengunjung'] as $r): ?>
                                    <option value="<?= $r ?>" <?= $r == $user['role'] ? 'selected' : '' ?>>
                                    <?= ucfirst($r) ?>
                                    </option>
                                <?php endforeach; ?>
                                </select>
                            </div>

                            <button class="btn btn-primary">Update</button>
                            <a href="<?= base_url('/user') ?>" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                        </div>


                    <!-- Stop Di sini -->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
        <!--end::App Content-->
    </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">Muhammad Farhan 23.0504.0064</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          Copyright &copy; 2014-2024&nbsp;
          <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
  </body>
<style>
    /* Pusatkan logo ke tengah layar */
    .logo-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 20vh; /* penuh layar */
    background-color:rgb(255, 255, 255); /* sesuaikan dengan tema */
    }

    /* Kontainer logo */
    .logo-container {
    position: relative;
    display: inline-block;
    overflow: hidden;
    width: 150px; /* ubah ukuran sesuai kebutuhan */
    height: auto;
    }

    /* Gambar logo */
    .logo-img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 12px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    /* Efek kilau */
    .shine {
    position: absolute;
    top: 0;
    left: -75%;
    width: 50%;
    height: 100%;
    background: linear-gradient(120deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.6) 50%, rgba(255,255,255,0.1) 100%);
    transform: skewX(-25deg);
    animation: shineAnim 3s infinite ease-in-out;
    }
    .logo-description {
    margin-top: 16px;
    font-size: 16px;
    font-weight: 500;
    color: #333;
    line-height: 1.4;
    text-align: center;
    }

    /* Keyframes kilau */
    @keyframes shineAnim {
    0% { left: -75%; }
    100% { left: 125%; }
    }
</style>
  <!--end::Body-->
</html>
