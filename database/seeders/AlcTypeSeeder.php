<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlcTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('alctypes')->insert([
            ['id' => 1, 'name' => 'Sör'],
            ['id' => 2, 'name' => 'Bor'],
            ['id' => 3, 'name' => 'Pezsgő'],
            ['id' => 4, 'name' => 'Likőr'],
            ['id' => 5, 'name' => 'Rövidital'],
        ]);
    }
}
