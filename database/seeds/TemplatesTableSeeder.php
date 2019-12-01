<?php

use Illuminate\Database\Seeder;
use App\Template;

class TemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Template::truncate();

        Template::create([
            'name' => 'Clássico',
            'photo_path' => 'img/templates/classico.png',
        ]);
        Template::create([
            'name' => 'Dia-a-Dia',
            'photo_path' => 'img/templates/dia-a-dia.jpg',
        ]);
        Template::create([
            'name' => 'Férias com Amigos',
            'photo_path' => 'img/templates/ferias-amigos.jpg',
        ]);
        Template::create([
            'name' => 'Férias com Família',
            'photo_path' => 'img/templates/ferias-familia.jpg',
        ]);
        Template::create([
            'name' => 'Halloween',
            'photo_path' => 'img/templates/halloween.png',
        ]);
        Template::create([
            'name' => 'Natal',
            'photo_path' => 'img/templates/natal.jpeg',
        ]);
    }
}
