<?php

use Illuminate\Database\Seeder;
use App\User;
use App\City;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'Adriana Alana Fernanda Figueiredo',
            'email' => 'dri@gmail.com',
            'birthday' => '1995-12-18',
            'cellphone' => '(15) 99113-9586',
            'phone' => '(15) 3505-9959',
            'city_id' => City::where('name', 'Sorocaba')->first()->id,
            'zip_code' => '18061-230',
            'neighborhood' => 'Vila Barão',
            'street' => 'Rua Manoel Lourenço Rodrigues',
            'street_number' => '607',
            'street_complement' => '',
            'allow_notifications' => true,
            'password' => bcrypt('adriana123'),
        ]);
    }
}
