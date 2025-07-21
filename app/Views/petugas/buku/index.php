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
    content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
  <meta
    name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
  <!--end::Primary Meta Tags-->
  <!--begin::Fonts-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
    crossorigin="anonymous" />
  <!--end::Fonts-->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
    integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(OverlayScrollbars)-->
  <!--begin::Third Party Plugin(Bootstrap Icons)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(Bootstrap Icons)-->
  <!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="/css/adminlte.css" />
  <!--end::Required Plugin(AdminLTE)-->
  <!-- apexcharts -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
    integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
    crossorigin="anonymous" />
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
            class="brand-image opacity-75 shadow" />
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
            data-accordion="false">
            <li class="nav-item menu-open">
              <ul class="nav nav-treeview">
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
            <div class="col-sm-6">
              <h3 class="mb-0">Dasrboard</h3>
            </div>
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
            <br />
            <a href="<?= base_url('/buku/create') ?>" class="btn btn-success btn-md">
              <span class="fa fa-plus"></span> Tambah Buku
            </a>
            <br />

            <?php if (session()->getFlashdata('success')): ?>
              <div class="alert alert-success" style="margin-top: 10px;">
                <?= session()->getFlashdata('success') ?>
              </div>
            <?php endif; ?>

               <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
                        <th>Rating</th>
                        <th style="text-align: center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($buku as $b): ?>
                        <tr>
                          <td><?= $no++ ?></td>

                          <!-- Gambar Sampul -->
                          <td style="text-align:center;">
                            <?php if ($b['gambar']): ?>
                              <img src="<?= base_url('uploads/' . $b['gambar']) ?>" alt="Sampul" width="60" height="80">
                            <?php else: ?>
                              <span class="text-muted">-</span>
                            <?php endif; ?>
                          </td>

                          <td><?= esc($b['judul']) ?></td>
                          <td><?= esc($b['penulis']) ?></td>
                          <td><?= esc($b['tahun_terbit']) ?></td>
                          <td><?= esc($b['stok']) ?></td>

                          <!-- Deskripsi -->
                          <td><?= esc(word_limiter($b['deskripsi'], 20)) ?></td>

                          <!-- Rating -->
                          <td><?= esc($b['rating']) ?>/5</td>

                          <!-- Tombol Aksi -->
                          <td style="text-align: center;">
                            <a href="<?= base_url('/buku/edit/' . $b['id']) ?>" class="btn btn-warning btn-sm">
                              <span class="fa fa-edit"></span>
                            </a>
                            <a href="<?= base_url('/buku/delete/' . $b['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                              <span class="fa fa-trash"></span>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
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
    <?= $this->include('layout/footer') ?>

</html>