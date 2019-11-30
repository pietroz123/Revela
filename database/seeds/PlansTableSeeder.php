<?php

use Illuminate\Database\Seeder;
use App\Plan;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::truncate();

        Plan::create([
            'name' => 'Iniciante',
            'price' => '29.90',
            'number_of_photos' => '5',
            'number_of_months' => '1',
        ]);
        Plan::create([
            'name' => 'Colecionador',
            'price' => '24.90',
            'number_of_photos' => '10',
            'number_of_months' => '3',
        ]);
        Plan::create([
            'name' => 'Nostalgia',
            'price' => '18.90',
            'number_of_photos' => '15',
            'number_of_months' => '6',
        ]);
    }
}
