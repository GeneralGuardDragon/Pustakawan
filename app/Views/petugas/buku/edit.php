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
             <div class="card">
              <div class="card-header">
                <h5>Edit Data Buku</h5>
              </div>
                <div class="card-body">
                  <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                      <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                          <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                      </ul>
                    </div>
                  <?php endif; ?>

                  <form action="<?= base_url('/buku/update/' . $buku['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="form-group mb-3">
                      <label>Judul</label>
                      <input type="text" name="judul" class="form-control" value="<?= esc($buku['judul']) ?>" required>
                    </div>

                    <div class="form-group mb-3">
                      <label>Penulis</label>
                      <input type="text" name="penulis" class="form-control" value="<?= esc($buku['penulis']) ?>" required>
                    </div>

                    <div class="form-group mb-3">
                      <label>Tahun Terbit</label>
                      <input type="number" name="tahun_terbit" class="form-control" value="<?= esc($buku['tahun_terbit']) ?>" min="1000" max="<?= date('Y') ?>" required>
                    </div>

                    <div class="form-group mb-3">
                      <label>Stok</label>
                      <input type="number" name="stok" class="form-control" value="<?= esc($buku['stok']) ?>" min="0" required>
                    </div>

                    <div class="form-group mb-3">
                      <label>Deskripsi</label>
                      <textarea name="deskripsi" class="form-control" rows="4"><?= esc($buku['deskripsi']) ?></textarea>
                    </div>

                    <div class="form-group mb-3">
                      <label>Rating</label>
                      <input type="number" name="rating" class="form-control" value="<?= esc($buku['rating']) ?>" step="0.1" min="0" max="5">
                    </div>

                    <div class="form-group mb-3">
                      <label>Gambar Lama</label><br>
                      <?php if ($buku['gambar']): ?>
                        <img src="<?= base_url('uploads/' . $buku['gambar']) ?>" width="100">
                      <?php else: ?>
                        <p class="text-muted">Tidak ada gambar</p>
                      <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                      <label>Ganti Gambar (Opsional)</label>
                      <input type="file" name="gambar" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('/buku') ?>" class="btn btn-secondary">Batal</a>
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
<?= $this->include('layout/footer') ?>

</html>