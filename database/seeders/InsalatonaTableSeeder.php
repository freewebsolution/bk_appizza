<?php

namespace Database\Seeders;

use App\Models\Insalatona;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsalatonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Insalatona::insert([
                    [
                        'titolo' => $titolo = 'Nizzarda',
                        'descrizione' => $descrizione = 'Insalata Novella, Gentile, Rucola, Radicchio, pomodorini, oliver verdi, tonno, mozz. Fior di Latte, uova, cipolla di tropea, patate lesse, acciughe',
                        'prezzo' => $prezzo = 12.00,
                        'inevidenza' => $inevidenza = true,
                        'img' => $img = '/assets/insalatone/nizzarda.jpg'
                    ],
                    [
                        'titolo' => $titolo = 'Iceberg',
                        'descrizione' => $descrizione = 'Insalata Iceberg croccante, insalatina dolce o valeriana, rucola, foglie di spinacino, semi di canapa, semi di girasole, ribes rosso disidratato',
                        'prezzo' => $prezzo = 8.00,
                        'inevidenza' => $inevidenza = false,
                        'img' => $img = '/assets/insalatone/iceberg.jpg'
                    ]



            ]);
        }
}
