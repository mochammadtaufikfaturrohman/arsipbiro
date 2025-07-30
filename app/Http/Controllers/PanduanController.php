<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanduanController extends Controller
{
    /**
     * Menampilkan halaman utama daftar panduan arsip.
     */
    public function index()
    {
        // Jika kamu ingin mengirim daftar jenis arsip ke view:
        $arsipList = [
            [
                'slug' => 'dinamis',
                'title' => 'Arsip Dinamis',
                'desc' => 'Arsip yang digunakan secara langsung dalam kegiatan organisasi sehari-hari.'
            ],
            [
                'slug' => 'statis',
                'title' => 'Arsip Statis',
                'desc' => 'Arsip yang tidak lagi aktif digunakan, namun disimpan karena nilai sejarah.'
            ],
            [
                'slug' => 'vital',
                'title' => 'Arsip Vital',
                'desc' => 'Arsip penting yang dibutuhkan untuk kelangsungan organisasi.'
            ],
            [
                'slug' => 'permanen',
                'title' => 'Arsip Permanen',
                'desc' => 'Arsip yang disimpan selamanya karena nilai hukum atau budaya.'
            ],
            [
                'slug' => 'fisik',
                'title' => 'Arsip Fisik',
                'desc' => 'Arsip dalam bentuk fisik seperti kertas, dokumen cetak.'
            ],
            [
                'slug' => 'retensi-pendek',
                'title' => 'Arsip Retensi Jangka Pendek',
                'desc' => 'Arsip yang disimpan kurang dari 5 tahun.'
            ],
            [
                'slug' => 'retensi-panjang',
                'title' => 'Arsip Retensi Jangka Panjang',
                'desc' => 'Arsip yang disimpan lebih dari 5 tahun.'
            ],
            [
                'slug' => 'elektronik',
                'title' => 'Arsip Elektronik',
                'desc' => 'Arsip digital yang disimpan secara elektronik.'
            ]
        ];

        return view('panduan.index', compact('arsipList'));
    }

    /**
     * Menampilkan detail panduan arsip berdasarkan jenis.
     */
    public function show($jenis)
    {
        $arsipList = [
            'dinamis' => [
                'title' => 'Arsip Dinamis',
                'desc' => 'Arsip dinamis adalah arsip yang digunakan secara langsung dalam kegiatan sehari-hari organisasi dan memiliki nilai guna administrasi.'
            ],
            'statis' => [
                'title' => 'Arsip Statis',
                'desc' => 'Arsip statis adalah arsip yang tidak aktif lagi digunakan, namun tetap disimpan karena memiliki nilai sejarah atau penting secara hukum.'
            ],
            'vital' => [
                'title' => 'Arsip Vital',
                'desc' => 'Arsip vital adalah arsip yang sangat penting bagi keberlangsungan hidup organisasi, seperti akta pendirian, dokumen kepemilikan, dan lainnya.'
            ],
            'permanen' => [
                'title' => 'Arsip Permanen',
                'desc' => 'Arsip permanen adalah arsip yang disimpan untuk selamanya karena memiliki nilai hukum, sejarah, atau budaya tinggi.'
            ],
            'fisik' => [
                'title' => 'Arsip Fisik',
                'desc' => 'Arsip fisik merupakan arsip dalam bentuk dokumen cetak atau kertas yang disimpan secara manual.'
            ],
            'retensi-pendek' => [
                'title' => 'Arsip Retensi Jangka Pendek',
                'desc' => 'Arsip ini hanya disimpan dalam waktu singkat (kurang dari 5 tahun) sebelum dimusnahkan.'
            ],
            'retensi-panjang' => [
                'title' => 'Arsip Retensi Jangka Panjang',
                'desc' => 'Arsip ini memiliki nilai guna dalam waktu lama, lebih dari 5 tahun, untuk keperluan referensi atau hukum.'
            ],
            'elektronik' => [
                'title' => 'Arsip Elektronik',
                'desc' => 'Arsip elektronik adalah dokumen digital yang tersimpan dan dikelola secara elektronik.'
            ]
        ];

        if (!array_key_exists($jenis, $arsipList)) {
            abort(404);
        }

        $arsip = $arsipList[$jenis];

        return view('panduan.detail', compact('arsip'));
    }
}
