<?php
function rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
function sisaKursi($quota, $registered) {
    return $quota - $registered;
}
function statusKursus($quota, $registered) {
    return sisaKursi($quota, $registered) <= 0 ? 'Penuh' : 'Tersedia';
}

// Format Tanggal (YYYY-MM-DD ke DD-MM-YYYY)
function formatTanggal($tanggal) {
    return date('d-m-Y', strtotime($tanggal));
}