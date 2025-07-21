<!DOCTYPE HTML>
<html>
    <?= $this->include('layout/header') ?>
<head>
    <title>register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
</head>
<body style="background:#ffffff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <br/><br/>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Register</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('/register') ?>">

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Anda" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Buat password" required>
                            </div>

                            <div class="form-group">
                                <label>Daftar Sebagai</label>
                                <select name="role" class="form-control" required>
                                    <option value="pengunjung">Pengunjung</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Daftar</button>
                            <a href="<?= base_url('/login') ?>" class="btn btn-link">Sudah punya akun?</a>
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
