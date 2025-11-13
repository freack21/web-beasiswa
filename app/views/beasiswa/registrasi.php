<?php require_once '../app/views/templates/header.php'; ?>

<div class="container">
  <div class="page-header">
    <h1><i class="fas fa-edit"></i> Registrasi Beasiswa</h1>
    <p>Lengkapi formulir di bawah ini untuk mendaftar beasiswa</p>
  </div>

  <?php if ($data['ipk'] < 3.0): ?>
    <div class="alert alert-warning">
      <i class="fas fa-exclamation-triangle"></i>
      <div>
        <strong>Maaf!</strong> IPK Anda saat ini adalah <strong><?= number_format($data['ipk'], 2) ?></strong>.
        Anda tidak memenuhi syarat untuk mendaftar beasiswa karena IPK minimal yang dibutuhkan adalah <strong>3.00</strong>.
      </div>
    </div>
  <?php else: ?>
    <div class="alert alert-success">
      <i class="fas fa-check-circle"></i>
      <div>
        <strong>Selamat!</strong> IPK Anda adalah <strong><?= number_format($data['ipk'], 2) ?></strong>.
        Anda memenuhi syarat untuk mendaftar beasiswa. Silakan lengkapi formulir di bawah ini.
      </div>
    </div>
  <?php endif; ?>

  <div class="form-container">
    <form action="<?= BASEURL; ?>/BeasiswaController/daftar" method="POST" enctype="multipart/form-data" id="registrationForm">

      <div class="form-group">
        <label for="nama">
          <i class="fas fa-user"></i> Nama Lengkap
        </label>
        <input type="text"
          class="form-control"
          id="nama"
          name="nama"
          placeholder="Masukkan nama lengkap Anda"
          required>
      </div>

      <div class="form-group">
        <label for="email">
          <i class="fas fa-envelope"></i> Email
        </label>
        <input type="email"
          class="form-control"
          id="email"
          name="email"
          placeholder="contoh@email.com"
          required>
      </div>

      <div class="form-group">
        <label for="nomor_hp">
          <i class="fas fa-phone"></i> Nomor HP
        </label>
        <input type="text"
          class="form-control"
          id="nomor_hp"
          name="nomor_hp"
          placeholder="08123456789"
          pattern="[0-9]+"
          title="Hanya boleh berisi angka"
          required>
      </div>

      <div class="form-group">
        <label for="semester">
          <i class="fas fa-calendar-alt"></i> Semester Saat Ini
        </label>
        <select class="form-control" id="semester" name="semester" required>
          <option value="">-- Pilih Semester --</option>
          <?php for ($i = 1; $i <= 8; $i++): ?>
            <option value="<?= $i ?>">Semester <?= $i ?></option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="ipk">
          <i class="fas fa-chart-line"></i> IPK Terakhir
        </label>
        <input type="text"
          class="form-control readonly"
          id="ipk"
          name="ipk"
          value="<?= number_format($data['ipk'], 2) ?>"
          readonly>
        <small style="color: var(--text-light); display: block; margin-top: 5px;">
          <i class="fas fa-info-circle"></i> IPK diambil otomatis dari sistem
        </small>
      </div>

      <div class="form-group">
        <label for="beasiswa_id">
          <i class="fas fa-graduation-cap"></i> Pilihan Beasiswa
        </label>
        <select class="form-control"
          id="beasiswa_id"
          name="beasiswa_id"
          <?= $data['ipk'] < 3.0 ? 'disabled' : '' ?>
          required>
          <option value="">-- Pilih Beasiswa --</option>
          <?php if (!empty($data['jenis_beasiswa'])): ?>
            <?php foreach ($data['jenis_beasiswa'] as $beasiswa): ?>
              <?php if ($data['ipk'] >= $beasiswa->min_ipk): ?>
                <option value="<?= $beasiswa->id ?>">
                  <?= htmlspecialchars($beasiswa->nama_beasiswa) ?>
                  (Min. IPK: <?= number_format($beasiswa->min_ipk, 2) ?>)
                </option>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="berkas">
          <i class="fas fa-file-upload"></i> Upload Berkas Syarat
        </label>
        <div class="file-input-wrapper">
          <input type="file"
            id="berkas"
            name="berkas"
            accept=".pdf,.jpg,.jpeg,.png,.zip"
            <?= $data['ipk'] < 3.0 ? 'disabled' : '' ?>
            required>
          <label for="berkas" class="file-input-label">
            <i class="fas fa-cloud-upload-alt"></i>
            <span>Klik untuk upload file (PDF, JPG, PNG, ZIP - Max 5MB)</span>
          </label>
        </div>
        <div class="file-name">Belum ada file dipilih</div>
      </div>

      <button type="submit"
        class="btn btn-primary btn-block"
        id="submitBtn"
        <?= $data['ipk'] < 3.0 ? 'disabled' : '' ?>>
        <i class="fas fa-paper-plane"></i>
        Daftar Beasiswa
      </button>

    </form>
  </div>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>