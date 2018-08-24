<?php

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client;

        $response = $client->get('https://servicodados.ibge.gov.br/api/v1/localidades/estados');

        $estados = json_decode($response->getBody(), true);

        $dataToInsert = [];

        foreach ($estados as $estado) {
            $dataToInsert[] = [
                'nome' => $estado['nome'],
                'sigla' => $estado['sigla'],
            ];
        }

        $dataToInsert = collect($dataToInsert)->sortBy('sigla')->toArray();

        DB::table('estados')->insert($dataToInsert);
    }
}
