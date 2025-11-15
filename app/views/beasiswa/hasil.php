<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container">
  <div class="page-header">
    <h1><i class="fas fa-check-circle"></i> Hasil Pendaftaran Beasiswa</h1>
    <p>Daftar semua pendaftaran beasiswa yang telah diajukan</p>
  </div>

  <div class="table-container">
    <?php if (!empty($data['pendaftaran'])): ?>
      <div style="overflow-x: auto;">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>HP</th>
              <th>Semester</th>
              <th>IPK</th>
              <th>Beasiswa</th>
              <th>Berkas</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['pendaftaran'] as $item): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($item->nama) ?></td>
                <td><?= htmlspecialchars($item->email) ?></td>
                <td><?= htmlspecialchars($item->nomor_hp) ?></td>
                <td><?= $item->semester ?></td>
                <td>
                  <strong><?= number_format($item->ipk, 2) ?></strong>
                </td>
                <td>
                  <span class="badge badge-info">
                    <?= htmlspecialchars($item->nama_beasiswa ?? 'N/A') ?>
                  </span>
                </td>
                <td>
                  <?php if ($item->berkas): ?>
                    <a href="<?= BASEURL; ?>/uploads/<?= htmlspecialchars($item->berkas) ?>"
                      target="_blank"
                      style="color: var(--primary-color); text-decoration: none; display: flex;align-items: center;gap: 0.5rem;">
                      <i class="fas fa-download"></i> Lihat
                    </a>
                  <?php else: ?>
                    <span style="color: var(--text-light);">-</span>
                  <?php endif; ?>
                </td>
                <td>
                  <span class="badge badge-warning">
                    <i class="fas fa-clock"></i>
                    <?= htmlspecialchars($item->status_ajuan) ?>
                  </span>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div style="margin-top: 20px; padding: 15px; background-color: var(--light-bg); border-radius: 8px;">
        <p style="margin: 0; color: var(--text-light);">
          <i class="fas fa-info-circle"></i>
          <strong>Total Pendaftaran:</strong> <?= count($data['pendaftaran']) ?> pendaftar
        </p>
      </div>
    <?php else: ?>
      <div class="empty-state">
        <i class="fas fa-inbox"></i>
        <h3>Belum Ada Pendaftaran</h3>
        <p>Belum ada data pendaftaran beasiswa yang masuk.</p>
        <a href="<?= BASEURL; ?>/registrasi" class="btn btn-primary" style="margin-top: 20px;">
          <i class="fas fa-edit"></i>
          Daftar Sekarang
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>