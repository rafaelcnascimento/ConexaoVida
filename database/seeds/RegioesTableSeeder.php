<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegioesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regioes')->insert([
            [ 'nome' => 'Central'],
            [ 'nome' => 'Metropolitana/Litoral'],
            [ 'nome' => 'Noroeste'],
            [ 'nome' => 'Norte'],
            [ 'nome' => 'Oeste'],
            [ 'nome' => 'Serra' ],
            [ 'nome' => 'Sul' ],
        ]);
    }
}
