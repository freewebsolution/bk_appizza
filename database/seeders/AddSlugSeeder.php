<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddSlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slug = uniqId();
        DB::table('pizza')->update([
            'slug' => $slug
        ]);
        DB::table('insalatona')->update([
            'slug' => $slug
        ]);
    }
}
