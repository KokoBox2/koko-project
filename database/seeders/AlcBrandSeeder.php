<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlcBrandSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('alcbrands')->insert([
            ['alctype_id' => 1, 'name' => 'Soproni', 'alcpercent' => 5, 'flavour' => 'Malátás'],
            ['alctype_id' => 1, 'name' => 'Dreher', 'alcpercent' => 6, 'flavour' => 'Pörkölt maláta'],
            ['alctype_id' => 2, 'name' => 'Irsai Feher', 'alcpercent' => 12, 'flavour' => 'Gyümölcsös'],
            ['alctype_id' => 2, 'name' => 'Irsai vörös', 'alcpercent' => 13, 'flavour' => 'Bogyós gyümölcs'],
            ['alctype_id' => 3, 'name' => 'Süsü pezsgo', 'alcpercent' => 78, 'flavour' => 'Citrusos'],
            ['alctype_id' => 4, 'name' => 'Limonchello', 'alcpercent' => 17, 'flavour' => 'Vaníliás'],
            ['alctype_id' => 4, 'name' => 'Pálinka', 'alcpercent' => 60, 'flavour' => 'Meggyes'],
            ['alctype_id' => 5, 'name' => 'Jager', 'alcpercent' => 37, 'flavour' => 'Fűszeres'],
        ]);
    }
}
