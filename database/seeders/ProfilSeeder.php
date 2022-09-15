<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profil::create([
        	'nama_profil' => 'SONAR',
        	'jenis_apk' => 'Penyewaan Lapangan Bulutangkis',
        	'lokasi' => 'Kediri',
        	'no_profil' => '082244745603'
        ]);
    }
}
