<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Materia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Materia::factory(20)->create([
            'user_id' => 1,
            'titulo' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis id
            blanditiis accusantium quasi.',
            'descricao' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis id
            blanditiis accusantium quasi, excepturi voluptatem praesentium
            explicabo atque sed nemo',
            'texto_completo' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque
            natus nostrum molestiae fugiat laudantium maxime facilis aut
            adipisci nam praesentium molestias ea deserunt quibusdam unde
            dolorem dolor, sapiente velit aliquam! Lorem ipsum dolor sit,
            amet consectetur adipisicing elit. Eaque placeat dignissimos
            eveniet officia tempora maiores repellendus illum minus
            voluptates totam sint beatae magnam cum rem quam quos, omnis
            delectus ad. Lorem ipsum dolor sit amet consectetur, adipisicing
            elit. Illum sequi modi velit tempore, porro vitae ab delectus
            impedit quo quis in officiis maxime at quaerat! Perferendis
            repellendus veritatis ipsum sit.',
        ]);
    }
}
