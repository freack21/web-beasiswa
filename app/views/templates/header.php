<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['title'] ?? 'Sistem Beasiswa' ?> - Portal Beasiswa</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>

<body>
  <nav class="navbar">
    <div class="navbar-container">
      <a href="<?= BASEURL; ?>/BeasiswaController/index" class="navbar-brand">
        <i class="fas fa-graduation-cap"></i>
        Portal Beasiswa
      </a>
      <ul class="navbar-menu">
        <li>
          <a href="<?= BASEURL; ?>/BeasiswaController/index" class="<?= ($data['active_page'] ?? '') == 'daftar' ? 'active' : '' ?>">
            <i class="fas fa-list"></i>
            Daftar Beasiswa
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/BeasiswaController/registrasi" class="<?= ($data['active_page'] ?? '') == 'registrasi' ? 'active' : '' ?>">
            <i class="fas fa-edit"></i>
            Registrasi
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/BeasiswaController/hasil" class="<?= ($data['active_page'] ?? '') == 'hasil' ? 'active' : '' ?>">
            <i class="fas fa-check-circle"></i>
            Hasil
          </a>
        </li>
      </ul>
    </div>
  </nav>