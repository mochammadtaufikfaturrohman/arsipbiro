<?php

namespace App\Services;

class KlasifikasiService
{
    public function klasifikasi($Judul_Arsip, $Keterangan)
    {
        $text = $Judul_Arsip . ' ' . $Keterangan;

        $python = base_path('ml/venv/Scripts/python.exe');

        $script = base_path('ml/predict.py');

        $escapedText = escapeshellarg($text);

        $command = "\"$python\" \"$script\" $escapedText";

        $output = shell_exec($command);

        if (!$output) {
            return 'Tidak Diketahui';
        }

        return trim($output);
    }
}