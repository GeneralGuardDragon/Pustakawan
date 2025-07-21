<?= $this->include('layout/header') ?>

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
                    <a href="<?= base_url('/pengunjung/buku') ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Koleksi Perputakaan</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="<?= base_url('/pengunjung/history') ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>History Peminjaman</p>
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
              <h3 class="mb-0">Daftar buku</h3>
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
             
            <?php if (empty($buku)): ?>
              <div class="alert alert-warning">Belum ada data buku yang tersedia.</div>
            <?php else: ?>
              <?php foreach ($buku as $b): ?>
                <div class="card mb-4">
                  <div class="row g-0">
                    <!-- Gambar -->
                    <div class="col-md-3">
                      <img src="<?= base_url('uploads/' . ($b['gambar'] ?: 'nocover.png')) ?>" 
                          class="img-fluid rounded-start" 
                          alt="<?= esc($b['judul']) ?>" 
                          style="object-fit: cover; height: 100%; width: 100%;">
                    </div>
                    

                    <!-- Informasi Buku -->
                    <div class="col-md-9">
                      <div class="card-body d-flex flex-column h-100">
                        <h5 class="card-title mb-1"><?= esc($b['judul']) ?></h5>
                        <p class="mb-1 text-muted">Penulis: <?= esc($b['penulis']) ?></p>
                        <p class="mb-2 text-muted">Tahun Terbit: <?= esc($b['tahun_terbit']) ?></p>
                        <p class="card-text"><?= character_limiter(strip_tags($b['deskripsi']), 200) ?></p>
                        <p class="card-text mb-1">⭐ Rating: <?= esc($b['rating']) ?>/5</p>
                        <p class="card-text mb-2">
                          <?php if ($b['stok'] > 0): ?>
                            <span class="badge bg-success"><?= esc($b['stok']) ?> tersedia</span>
                          <?php else: ?>
                            <span class="badge bg-danger">Stok Habis</span>
                          <?php endif; ?>
                        </p>

                        <div class="mt-auto">
                          <?php if ($b['stok'] > 0): ?>
                            <a href="<?= base_url('/pengunjung/buku/booking/' . $b['id']) ?>" class="btn btn-success">
                              Booking
                            </a>
                          <?php else: ?>
                            <button class="btn btn-secondary" disabled>Stok Habis</button>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

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