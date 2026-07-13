<?php

namespace App\Services;

class KlasifikasiService
{
    public function klasifikasi($keterangan)
    {
        if (empty(trim($keterangan))) {
            return "Tidak Diketahui";
        }

        $python = base_path('ml/venv/Scripts/python.exe');
        $script = base_path('ml/predict.py');

        $escapedText = escapeshellarg($keterangan);

        $command = "\"{$python}\" \"{$script}\" {$escapedText}";

        $output = shell_exec($command);

        if (!$output) {
            return "Tidak Diketahui";
        }

        $hasil = trim($output);

        if ($hasil == "ERROR") {
            return "Tidak Diketahui";
        }

        return $hasil;
    }
}
