<?php require_once '../app/views/templates/header.php'; ?>

<div class="container">
  <div class="page-header">
    <h1><i class="fas fa-graduation-cap"></i> Daftar Beasiswa Tersedia</h1>
    <p>Pilih beasiswa yang sesuai dengan prestasi dan kebutuhan Anda</p>
  </div>

  <div class="alert alert-info">
    <i class="fas fa-info-circle"></i>
    <div>
      <strong>Informasi Penting:</strong> Pastikan IPK Anda minimal 3.0 untuk dapat mendaftar beasiswa.
      Silakan cek persyaratan setiap jenis beasiswa di bawah ini.
    </div>
  </div>

  <div class="card-grid">
    <?php if (!empty($data['jenis_beasiswa'])): ?>
      <?php foreach ($data['jenis_beasiswa'] as $beasiswa): ?>
        <div class="card">
          <div class="card-header">
            <div class="card-icon">
              <?php if (strpos(strtolower($beasiswa->nama_beasiswa), 'akademik') !== false): ?>
                <i class="fas fa-book"></i>
              <?php elseif (strpos(strtolower($beasiswa->nama_beasiswa), 'non-akademik') !== false): ?>
                <i class="fas fa-trophy"></i>
              <?php else: ?>
                <i class="fas fa-star"></i>
              <?php endif; ?>
            </div>
            <h2 class="card-title"><?= htmlspecialchars($beasiswa->nama_beasiswa) ?></h2>
          </div>
          <div class="card-content">
            <p><?= htmlspecialchars($beasiswa->deskripsi) ?></p>
            <div class="card-badge">
              <i class="fas fa-chart-line"></i>
              Minimal IPK: <?= number_format($beasiswa->min_ipk, 2) ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="empty-state">
        <i class="fas fa-inbox"></i>
        <h3>Belum Ada Beasiswa Tersedia</h3>
        <p>Saat ini belum ada program beasiswa yang dibuka.</p>
      </div>
    <?php endif; ?>
  </div>

  <div class="card" style="text-align: center; margin-top: 30px;">
    <h3 style="margin-bottom: 15px;">
      <i class="fas fa-hand-point-right"></i>
      Siap Mendaftar?
    </h3>
    <p style="color: var(--text-light); margin-bottom: 20px;">
      Pastikan Anda telah memenuhi persyaratan dan siapkan dokumen yang diperlukan
    </p>
    <a href="<?= BASEURL; ?>/BeasiswaController/registrasi" class="btn btn-primary">
      <i class="fas fa-edit"></i>
      Daftar Sekarang
    </a>
  </div>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>