<?php
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Kursus - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <header class="site-header">
    <div class="container nav-wrap">
      <a class="brand" href="index.php">KursusKu</a>
      <nav aria-label="Navigasi utama">
        <a href="index.php">Beranda</a>
        <a href="index.php#katalog">Katalog</a>
        <a href="registration.php">Daftar</a>
        <a href="history.php">History Dummy</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="page-intro">
      <p class="eyebrow">Pendaftaran Kursus</p>
      <h1>Mulai belajar bersama KursusKu</h1>
      <p>Gunakan data latihan. Field bertanda wajib harus diisi.</p>
    </section>

    <section class="form-card">
      <form action="process-registration.php" method="POST" class="registration-form">
        <input type="hidden" name="source" value="week-06">

        <div class="form-grid">
          <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input id="name" name="name" type="text" minlength="3" maxlength="100" autocomplete="name" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" maxlength="120" autocomplete="email" required>
          </div>

          <div class="form-group">
            <label for="phone">Nomor HP</label>
            <input id="phone" name="phone" type="tel" maxlength="15" autocomplete="tel" placeholder="Contoh: 081234567890" required>
          </div>

          <div class="form-group">
            <label for="study_program">Program Studi</label>
            <input id="study_program" name="study_program" type="text" maxlength="100" required>
          </div>
        </div>

        <!-- Kursus Dinamis dari Data.php -->
        <div class="form-group">
          <label for="course_code">Kursus yang Dipilih</label>
          <select id="course_code" name="course_code" required>
            <option value="">-- Pilih kursus --</option>
            <?php foreach ($courses as $c): ?>
              <option value="<?= e($c['code']) ?>">
                <?= e($c['name']) ?> - <?= rupiah($c['fee']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Tipe Peserta (Radio Button) -->
        <fieldset class="form-group">
          <legend>Tipe Peserta</legend>
          <label class="choice">
            <input type="radio" name="participant_type" value="mahasiswa" required> Mahasiswa (Diskon 20%)
          </label>
          <label class="choice">
            <input type="radio" name="participant_type" value="guru"> Guru (Diskon 15%)
          </label>
          <label class="choice">
            <input type="radio" name="participant_type" value="umum"> Umum
          </label>
        </fieldset>

        <!-- Metode Belajar (Select) -->
        <div class="form-group">
          <label for="learning_mode">Metode Belajar</label>
          <select id="learning_mode" name="learning_mode" required>
            <option value="">-- Pilih metode --</option>
            <option value="offline">Tatap Muka</option>
            <option value="online">Online</option>
            <option value="hybrid">Hybrid</option>
          </select>
        </div>

        <!-- Jumlah Paket (Select dengan Loop For) -->
        <div class="form-group">
          <label for="package_count">Jumlah Paket</label>
          <select id="package_count" name="package_count" required>
            <?php for ($i = 1; $i <= 3; $i++): ?>
              <option value="<?= $i ?>"><?= $i ?> paket</option>
            <?php endfor; ?>
          </select>
        </div>

        <!-- Minat Tambahan (Checkbox Array) -->
        <fieldset class="form-group">
          <legend>Minat Tambahan</legend>
          <?php foreach ($interestOptions as $val => $label): ?>
            <label class="choice">
              <input type="checkbox" name="interests[]" value="<?= e($val) ?>"> <?= e($label) ?>
            </label>
          <?php endforeach; ?>
        </fieldset>

        <!-- Catatan -->
        <div class="form-group">
          <label for="note">Catatan / Kebutuhan Belajar</label>
          <textarea id="note" name="note" rows="4" maxlength="300" placeholder="Tuliskan kebutuhan belajar Anda (opsional)"></textarea>
          <small class="help">Maksimal 300 karakter.</small>
        </div>

        <button class="btn-primary" type="submit">Kirim Pendaftaran</button>
      </form>
    </section>
  </main>
</body>
</html>