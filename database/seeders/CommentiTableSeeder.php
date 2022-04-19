<?php

namespace Database\Seeders;

use App\Models\Commenti;
use Illuminate\Database\Seeder;

class CommentiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commenti::insert([
            [
                'testo' => $testo = 'Commento a pizza Sicilia',
                'pizza_id' => $pizza_id = 3,
                'user_id' => $user_id = 2
            ],
//            [
//                'testo' => $testo = 'Commento ad insalatona Nizzarda',
//                'insalatona_id'=>$insalatona_id = 1,
//                'user_id' => $user_id = 2
//            ],

        ]);
    }
}
