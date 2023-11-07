<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReferensiBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ReferensiBank::create([
            'kode_satker' => '119312',
            'nama_satker' => 'KPKNL Jakarta V',
            'nomor_rekening' => '0010554978',
            'uraian_rekening' => 'RPL 019 KPKNL Jakarta V utk PDJ Lelang',
            'jenis_rekening' => 'RPL Lelang',
            'nama_bank' => 'BNI',
            'surat_izin' => 'S-6188/MK.5/2015',
            'tanggal_surat' => '24 Juli 2015',
            'status_rekening' => 'Aktif',
        ]);
    }
}
