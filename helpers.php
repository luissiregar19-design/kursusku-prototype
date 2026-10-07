<?php
// 1. Helper Sanitasi Output (e)
if (!function_exists('e')) {
    function e($value): string {
        return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
    }
}

// 2. Helper Format Rupiah (Mendukung nama rupiah & formatRupiah)
if (!function_exists('rupiah')) {
    function rupiah($angka): string {
        return 'Rp ' . number_format((float)$angka, 0, ',', '.');
    }
}

if (!function_exists('formatRupiah')) {
    function formatRupiah($amount): string {
        return rupiah($amount);
    }
}

// 3. Helper Sisa Kursi & Status Kursus (Pertemuan 4)
if (!function_exists('sisaKursi')) {
    function sisaKursi($quota, $registered): int {
        return (int)$quota - (int)$registered;
    }
}

if (!function_exists('statusKursus')) {
    function statusKursus($quota, $registered): string {
        return sisaKursi($quota, $registered) <= 0 ? 'Penuh' : 'Tersedia';
    }
}

// 4. Helper Format Tanggal
if (!function_exists('formatTanggal')) {
    function formatTanggal($tanggal): string {
        if (!$tanggal) return '-';
        return date('d-m-Y', strtotime($tanggal));
    }
}

// 5. Helper Cari Kursus Berdasarkan Kode (Pertemuan 6)
if (!function_exists('findCourse')) {
    function findCourse(array $courses, string $code): ?array {
        foreach ($courses as $course) {
            if (isset($course['code']) && strtolower($course['code']) === strtolower($code)) {
                return $course;
            }
        }
        return null;
    }
}

// 6. Helper Diskon Berdasarkan Tipe Peserta (if / elseif)
if (!function_exists('getDiscountPercent')) {
    function getDiscountPercent(string $participantType): int {
        if ($participantType === 'mahasiswa') {
            return 20;
        } elseif ($participantType === 'guru') {
            return 15;
        }
        return 0;
    }
}

// 7. Helper Label Metode Belajar (switch)
if (!function_exists('getLearningModeLabel')) {
    function getLearningModeLabel(string $mode): string {
        switch ($mode) {
            case 'offline':
                return 'Tatap Muka';
            case 'online':
                return 'Online';
            case 'hybrid':
                return 'Hybrid';
            default:
                return 'Tidak diketahui';
        }
    }
}