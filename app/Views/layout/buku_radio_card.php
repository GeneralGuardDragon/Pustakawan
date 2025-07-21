<?php helper('text'); ?>

<div class="col-md-4 mb-4">
  <label class="d-block" style="cursor: pointer">
    <!-- Radio (disembunyikan tapi tetap berfungsi) -->
    <input type="radio" name="buku_id" value="<?= $b['id'] ?>" class="d-none" required 
      <?= old('buku_id') == $b['id'] ? 'checked' : '' ?>>

    <!-- Kartu buku -->
    <div class="card <?= old('buku_id') == $b['id'] ? 'border-primary' : '' ?>">
      <img src="<?= base_url('uploads/' . ($b['gambar'] ?: 'nocover.png')) ?>" 
           class="card-img-top" 
           alt="<?= esc($b['judul']) ?>" 
           style="object-fit: cover; height: 180px;">

      <div class="card-body">
        <h5 class="card-title"><?= esc($b['judul']) ?></h5>
        <p class="card-text"><?= character_limiter(strip_tags($b['deskripsi']), 80) ?></p>
        <p class="text-muted mb-0">Rating: <?= esc($b['rating']) ?>/5</p>
        <p class="text-muted">Stok: <?= esc($b['stok']) ?></p>
      </div>
    </div>
  </label>
</div>
