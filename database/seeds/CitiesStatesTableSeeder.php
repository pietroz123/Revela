<?php

use Illuminate\Database\Seeder;
use App\City;
use App\State;


class CitiesStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();
        State::truncate();

        date_default_timezone_set('America/Sao_Paulo');

        $row = 1;
        
        if (($handle = fopen(base_path() . '/database/seeds/resources/Meso_Micro.csv', "r")) !== FALSE) {

            while ( (($data = fgetcsv($handle, 1000, ";")) !== FALSE) ) {

                if ($row == 1) {
                    $row++;
                    continue;
                }

                $num = count($data);
                echo "Inserting $row of 38976:\n";
                $row++;

                // UF
                $co_uf              = $data[2];
                $sigla_uf           = $data[3];
                $nome_uf            = $data[4];

                State::firstOrCreate([
                    'id' => $co_uf,
                    'name' => $nome_uf,
                    'abbrev' => $sigla_uf,
                ]);

                
                // Municipio
                $co_municipio       = $data[5];
                $nome_municipio     = $data[6];
                
                City::firstOrCreate([
                    'id' => $co_municipio,
                    'name' => $nome_municipio,
                    'state_id' => $co_uf,
                ]);

            }
            
            fclose($handle);
        }
    }
}
