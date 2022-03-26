<?php

namespace Database\Seeders;

use App\Models\Pizza;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Pizza::insert([
                [
                    'titolo' => $titolo = 'La Malga',
                    'descrizione' => $descrizione = 'Mozz. Fior di latte, formaggio Asiago di Malga, Salamino Piccante, fiocco di spuma di Rapa Rossa, Pomodorini Caramellati, olive Taggiasche, Basilico Fresco',
                    'prezzo' => $prezzo = 12.00,
                    'inevidenza' => $inevidenza = true,
                    'img' => $img = 'https://picsum.photos/id/1/200/300'
                ],
                [
                    'titolo' => $titolo = 'Spanara',
                    'descrizione' => $descrizione = 'Mozz. Fior di latte, Taleggio, Noci, Carpaccio di filietto d\'Angus Irlandese, polvere di Olive Taggiasche, uvetta Sultanina',
                    'prezzo' => $prezzo = 15.00,
                    'inevidenza' => $inevidenza = true,
                    'img' => $img = 'https://picsum.photos/id/2/200/300'
                ],

            ]);
        }

}
