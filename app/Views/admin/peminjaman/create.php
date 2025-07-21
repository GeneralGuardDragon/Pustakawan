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
                    <?php if (session('errors')): ?>
                      <div class="alert alert-danger">
                        <ul class="mb-0">
                          <?php foreach (session('errors') as $e): ?>
                            <li><?= esc($e) ?></li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    <?php endif; ?>

                    <form method="post" action="<?= base_url('/peminjaman/store') ?>">
                      <?= csrf_field() ?>

                      <!-- USER -->
                      <div class="mb-3">
                        <label for="user_id">User</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                          <option value="">-- Pilih User --</option>
                          <?php foreach ($users as $u): ?>
                            <option value="<?= $u['id'] ?>" <?= old('user_id') == $u['id'] ? 'selected' : '' ?>>
                              <?= esc($u['nama']) ?> (<?= esc($u['role']) ?>)
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>

                      <!-- BUKU DENGAN INFO TAMBAHAN -->
                      <?php foreach ($buku as $b): ?>
                        <?= view('layout/buku_radio_card', ['b' => $b]) ?>
                      <?php endforeach; ?>
                      <!-- STATUS -->
                      <div class="mb-3">
                        <label for="status">Status Awal</label>
                        <select name="status" id="status" class="form-control" required>
                          <option value="booking" <?= old('status') == 'booking' ? 'selected' : '' ?>>Booking</option>
                          <option value="dipinjam" <?= old('status') == 'dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                        </select>
                      </div>

                      <button class="btn btn-success">Simpan</button>
                      <a href="<?= base_url('/peminjaman') ?>" class="btn btn-secondary">Batal</a>
                    </form>


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
