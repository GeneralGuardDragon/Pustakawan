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
            <div class="col-sm-6">
              <h3 class="mb-0">Dashboard</h3>
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
 <?= $this->include('layout/footer') ?>
</html>