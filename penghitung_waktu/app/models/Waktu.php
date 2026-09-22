<?php

class Waktu
{
    public function hitungSelisih(
        string $mulai,
        string $selesai
    ): array {
        $awal = strtotime($mulai);
        $akhir = strtotime($selesai);

        // Cek format waktu
        if ($awal === false || $akhir === false) {
            return [
                'success' => false,
                'message' => 'Format waktu tidak valid.'
            ];
        }

        // Jika waktu selesai melewati tengah malam
        if ($akhir < $awal) {
            $akhir += 86400;
        }

        // Hitung selisih waktu dalam detik
        $selisih = $akhir - $awal;

        return [
            'success' => true,
            'jam' => intdiv($selisih, 3600),
            'menit' => intdiv($selisih % 3600, 60),
            'detik' => $selisih % 60
        ];
    }
}