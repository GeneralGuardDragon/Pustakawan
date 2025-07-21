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
                    <a href="<?= base_url('/user') ?>" class="nav-link">
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

                  <a href="<?= base_url('/peminjaman/create') ?>" class="btn btn-success mb-2">+ Tambah</a>
                    <?php if(session()->getFlashdata('success')): ?>
                      <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                      </div>
                    <?php endif; ?>

                    <div class="card">
                      <div class="card-body">
                        <table class="table table-bordered table-hover">
                          <thead class="table-light">
                            <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Buku</th> <!-- Kolom buku nanti isi gambar + info -->
                              <th>Tgl Pinjam</th>
                              <th>Tgl Kembali</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach($pinjam as $p): ?>
                              <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($p['nama_user']) ?></td>

                                <td>
                                  <div class="d-flex align-items-start">
                                    <?php if (!empty($p['gambar'])): ?>
                                      <img src="<?= base_url('uploads/' . $p['gambar']) ?>" alt="sampul" class="me-2" style="width: 60px; height: 80px; object-fit: cover;">
                                    <?php else: ?>
                                      <img src="<?= base_url('assets/img/nocover.png') ?>" alt="default" class="me-2" style="width: 60px; height: 80px; object-fit: cover;">
                                    <?php endif; ?>

                                    <div>
                                      <strong><?= esc($p['judul']) ?></strong><br>
                                      <small><?= character_limiter(strip_tags($p['deskripsi']), 50) ?></small><br>
                                      <span class="badge bg-warning text-dark">Rating: <?= esc($p['rating']) ?>/5</span>
                                    </div>
                                  </div>
                                </td>

                                <td><?= esc($p['tanggal_pinjam']) ?></td>
                                <td><?= esc($p['tanggal_kembali'] ?? '-') ?></td>
                                <td>
                                  <span class="badge bg-<?= $p['status'] === 'dikembalikan' ? 'success' : 'info' ?>">
                                    <?= esc(ucfirst($p['status'])) ?>
                                  </span>
                                </td>
                                <td>
                                  <a href="<?= base_url('/peminjaman/edit/'.$p['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                  <a href="<?= base_url('/peminjaman/delete/'.$p['id']) ?>" 
                                    class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Hapus transaksi ini?')">Hapus</a>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
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
  <?= $this->include('layout/footer') ?>
  <!--end::Body-->
</html>
