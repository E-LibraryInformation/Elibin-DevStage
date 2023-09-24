<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; //

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach(range(1, 20) as $index) {
            $stok = $faker->numberBetween(0, 10); // Menghasilkan angka acak antara 0 dan 10
            $status = ($stok === 0) ? 'Unavailable' : 'Available';

            $rating = $faker->randomFloat(1, 0, 5);
            $rating = number_format($rating, 1); // Menghasilkan nilai rating dengan 1 digit desimal

            DB::table('books')->insert([
                'judul' => $faker->sentence(3),
                'sinopsis' => $faker->text(200),
                'stok' => $stok,
                'status' => $status,
                'penulis' => $faker->name,
                'rak' => 'RBUK-' . $faker->randomNumber(3),
                'rating' => $rating,
                'gambar' => 'books/dummy.avif'
                // 'created_at' => Carbon::now(),
                // 'updated_at' => Carbon::now()
            ]);
        }
    }
}
