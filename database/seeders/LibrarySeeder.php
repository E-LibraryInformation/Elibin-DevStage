<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('library')->insert([
            'library' => 'Lib-Skenda',
            'alamat' => 'Jl. Brig Jend. Hasan Basri No.6, Sungai Miai, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70124',
            'gmaps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.2197719127676!2d114.58745297407918!3d-3.295680841122166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4211bbc1be42d%3A0xd93490f4e3d79a8e!2sSMK%20Negeri%202%20Banjarmasin!5e0!3m2!1sid!2sid!4v1699053342249!5m2!1sid!2sid'
        ]);
    }
}
