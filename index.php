<?php
// Hubungkan fungsi helpers dan definisikan array 6 kursus (Pertemuan 4)
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu';
$tagline  = 'Belajar dengan Proyek - Setiap tahap menghasilkan hasil nyata.';
$year     = date('Y');

$courses = [
    [
        'code'       => 'WEB-01',
        'name'       => 'Web Dasar',
        'fee'        => 200000,
        'quota'      => 30,
        'registered' => 12,
        'start_date' => '2026-09-21',
    ],
    [
        'code'       => 'PHP-01',
        'name'       => 'PHP Dasar',
        'fee'        => 250000,
        'quota'      => 30,
        'registered' => 18,
        'start_date' => '2026-09-22',
    ],
    [
        'code'       => 'PHP-02',
        'name'       => 'PHP Lanjutan',
        'fee'        => 300000,
        'quota'      => 25,
        'registered' => 24,
        'start_date' => '2026-09-24',
    ],
    [
        'code'       => 'LAR-01',
        'name'       => 'Laravel Fundamental',
        'fee'        => 350000,
        'quota'      => 25,
        'registered' => 25,
        'start_date' => '2026-09-28',
    ],
    [
        'code'       => 'DB-01',
        'name'       => 'MySQL Dasar',
        'fee'        => 275000,
        'quota'      => 20,
        'registered' => 0,
        'start_date' => '2026-10-01',
    ],
    [
        'code'       => 'UI-01',
        'name'       => 'UI Web Dasar',
        'fee'        => 225000,
        'quota'      => 35,
        'registered' => 9,
        'start_date' => '2026-10-03',
    ],
];
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($siteName) ?> - Landing Page</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- HEADER -->
  <header class="site-header">
    <div class="container nav-wrap">
      <a class="brand" href="index.php"><?= htmlspecialchars($siteName) ?></a>
      <nav aria-label="Navigasi utama">
        <a href="index.php">Beranda</a>
        <a href="#keunggulan">Keunggulan</a>
        <a href="#katalog">Katalog</a>
        <a href="#alur">Cara Daftar</a>
        <a href="#kontak">Kontak</a>
        <!-- Penambahan Tautan Form Pendaftaran -->
        <a href="registration.php">Daftar</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <!-- HERO / INTRO -->
    <section class="page-intro">
      <p class="eyebrow">Belajar dengan Proyek</p>
      <h1><?= htmlspecialchars($tagline) ?></h1>
      <p>Temukan kursus teknologi yang relevan untuk meningkatkan keterampilan Anda.</p>
      <!-- Penambahan Tombol CTA Utama -->
      <p><a href="registration.php" class="btn-primary">Daftar Sekarang</a></p>
    </section>

    <!-- KEUNGGULAN -->
    <section id="keunggulan">
      <h2>Mengapa Memilih KursusKu?</h2>
      <article>
        <h3>Materi Terarah</h3>
        <p>Materi disusun bertahap dari dasar hingga praktik.</p>
      </article>
      <article>
        <h3>Belajar dengan Proyek</h3>
        <p>Setiap tahap menghasilkan bagian nyata dari aplikasi.</p>
      </article>
      <article>
        <h3>Pendampingan Praktik</h3>
        <p>Mahasiswa belajar melalui demonstrasi, latihan, dan evaluasi.</p>
      </article>
    </section>

    <!-- KATALOG (PERTEMUAN 4 & 5) -->
    <section id="katalog">
      <h2>Katalog Kursus</h2>
      <p><a href="fee-calculator.php">Lihat Estimasi Biaya</a></p>

      <table>
        <thead>
          <tr>
            <th>Kode</th>
            <th>Nama Kursus</th>
            <th>Biaya</th>
            <th>Mulai</th>
            <th>Sisa Kursi</th>
            <th>Status</th>
            <!-- Penambahan Kolom Aksi -->
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($courses as $course): ?>
            <?php
              $status = statusKursus($course['quota'], $course['registered']);
              $statusClass = $status === 'Penuh' ? 'badge-full' : 'badge-available';
            ?>
            <tr>
              <td><?= htmlspecialchars($course['code']) ?></td>
              <td><?= htmlspecialchars(trim($course['name'])) ?></td>
              <td><?= rupiah($course['fee']) ?></td>
              <td><?= formatTanggal($course['start_date']) ?></td>
              <td><?= sisaKursi($course['quota'], $course['registered']) ?></td>
              <td><span class="<?= $statusClass ?>"><?= $status ?></span></td>
              <!-- Penambahan Tombol Aksi Daftar -->
              <td>
                <?php if ($status === 'Penuh'): ?>
                  <span class="muted">Penuh</span>
                <?php else: ?>
                  <a href="registration.php" class="btn-link">Daftar</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>

    <!-- ALUR PENDAFTARAN -->
    <section id="alur">
      <h2>Cara Mendaftar</h2>
      <ol>
        <li>Pilih kursus yang diminati.</li>
        <li>Isi form pendaftaran.</li>
        <li>Periksa kembali data.</li>
        <li>Kirim pendaftaran dan tunggu konfirmasi.</li>
      </ol>
    </section>

    <!-- MEDIA VIDEO -->
    <section id="media">
      <h2>Kenali Program Kami</h2>
      <p>Gunakan fasilitas belajar secara maksimal untuk mencapai tujuan karier Anda.</p>
      
      <div class="media-frame">
        <video controls width="100%">
          <source src="assets/video/intro-kursus.mp4" type="video/mp4">
          Browser Anda tidak mendukung pemutaran video.
        </video>
      </div>
    </section>

    <!-- KONTAK -->
    <section id="kontak">
      <h2>Kontak</h2>
      <p>Email: luissiregar19@gmail.com</p>
      <p>Alamat: Pasaman Timur</p>
    </section>
  </main>

  <!-- FOOTER -->
  <footer>
    <div class="container">
      <p><small>&copy; <?= $year ?> <?= htmlspecialchars($siteName) ?></small></p>
    </div>
  </footer>

</body>
</html>