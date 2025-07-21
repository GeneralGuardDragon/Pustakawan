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
              <?php if (empty($pinjam)): ?>
                <div class="alert alert-warning">Tidak ada data peminjaman.</div>
              <?php else: ?>
                <div class="row">
                  <?php foreach ($pinjam as $p): ?>
                    <div class="col-md-12 mb-4">
                      <div class="card shadow-sm">
                        <div class="row g-0">
                          <!-- Gambar Buku -->
                          <div class="col-md-3">
                            <img src="<?= base_url('uploads/' . ($p['gambar'] ?: 'nocover.png')) ?>"
                                class="img-fluid rounded-start h-100"
                                alt="<?= esc($p['judul']) ?>"
                                style="object-fit: cover;">
                          </div>

                          <!-- Detail -->
                          <div class="col-md-9">
                            <div class="card-body d-flex flex-column h-100">
                              <h5 class="card-title"><?= esc($p['judul']) ?></h5>
                              <p class="mb-1 text-muted">Penulis: <?= esc($p['penulis']) ?></p>
                              <p class="mb-1 text-muted">Tahun Terbit: <?= esc($p['tahun_terbit']) ?></p>
                              <p class="mb-1"><?= character_limiter(strip_tags($p['deskripsi']), 200) ?></p>
                              <p class="mb-1">⭐ Rating: <?= esc($p['rating']) ?>/5</p>

                              <div class="d-flex flex-wrap mb-2">
                                <span class="me-3">
                                  Status:
                                  <?php
                                    $status = esc($p['status']);
                                    $badge = match ($status) {
                                        'booking'      => 'warning',
                                        'dipinjam'     => 'primary',
                                        'dikembalikan' => 'success',
                                        'dibatalkan'   => 'danger',
                                        default        => 'secondary'
                                    };
                                  ?>
                                  <span class="badge bg-<?= $badge ?>"><?= ucfirst($status) ?></span>
                                </span>
                                <span class="me-3">Tanggal Pinjam: <?= esc($p['tanggal_pinjam']) ?></span>
                                <span>Tanggal Kembali: <?= esc($p['tanggal_kembali'] ?? '-') ?></span>
                              </div>

                              <div class="mt-auto">
                                <?php if ($p['status'] === 'booking'): ?>
                                  <a href="<?= base_url('/pengunjung/buku/cancel/'.$p['id']) ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Batalkan booking?')">Cancel</a>
                                <?php else: ?>
                                  <span class="text-muted">Tidak bisa dibatalkan</span>
                                <?php endif; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
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