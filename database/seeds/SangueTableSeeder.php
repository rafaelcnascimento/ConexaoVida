<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SangueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_sanguineos')->insert([
            [ 'nome' => 'O+' ],
            [ 'nome' => 'O-' ],
            [ 'nome' => 'A+' ],
            [ 'nome' => 'A-' ],
            [ 'nome' => 'B+' ],
            [ 'nome' => 'B-' ],
            [ 'nome' => 'AB+' ],
            [ 'nome' => 'AB-' ],
        ]);
    }
}
