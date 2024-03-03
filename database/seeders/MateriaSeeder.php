<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materias')->insert([
            'user_id' => 1,
            'titulo' => Str::random(50),
            'descricao' => Str::random(100),
            'texto_completo' => Str::random(1000),
        ]);
    }
}
