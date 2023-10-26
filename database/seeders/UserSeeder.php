<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as FakerFactory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = FakerFactory::create();

        $roles = ['pembaca', 'penulis', 'pustakawan', 'admin'];
        $accountTypes = ['reguler', 'premium'];

        foreach (range(1, 30) as $index) {
            DB::table('users')->insert([
                'fullname' => $faker->name,
                'username' => $faker->unique()->userName,
                'password' => Hash::make('password'),
                'bio' => 'Hai, aku pengguna baru di Elibin, nice to meet you',
                'role' => $faker->randomElement($roles),
                'account' => $faker->randomElement($accountTypes),
                'gambar' => 'https://image.popbela.com/content-images/post/20180530/22581812-136183890464103-4232093720725422080-n-920c4758ecb290f88731b4ee13a159ce.jpg?width=1600&format=webp&w=1600',
                'followers' => 0,
                'following' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('users')->insert([
            'fullname' => 'Erlang Andriyanputra',
            'username' => 'EranDay',
            'password' => Hash::make('123'),
            'role' => 'admin',
            'account' => 'reguler',
            'gambar' => 'https://i.pinimg.com/originals/df/a6/5c/dfa65c56ef17d9ede0ba1d191a6adde5.gif',
            'followers' => 0,
            'following' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
