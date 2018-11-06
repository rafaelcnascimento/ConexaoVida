<?php
use App\Combatibilidade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CompatibilidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('compatibilidades')->insert([
            // O+
            ['receptor_id' => 1, 'doador_id' => 1,],
            ['receptor_id' => 1, 'doador_id' => 2,],
            // O-
            ['receptor_id' => 2, 'doador_id' => 2,],
            // A+
            ['receptor_id' => 3, 'doador_id' => 1,],
            ['receptor_id' => 3, 'doador_id' => 2,],
            ['receptor_id' => 3, 'doador_id' => 3,],
            ['receptor_id' => 3, 'doador_id' => 4,],
            // A-
            ['receptor_id' => 4, 'doador_id' => 2,],
            ['receptor_id' => 4, 'doador_id' => 4,],
            // B+
            ['receptor_id' => 5, 'doador_id' => 1,],
            ['receptor_id' => 5, 'doador_id' => 2,],
            ['receptor_id' => 5, 'doador_id' => 5,],
            ['receptor_id' => 5, 'doador_id' => 6,],
            // B-
            ['receptor_id' => 6, 'doador_id' => 2,],
            ['receptor_id' => 6, 'doador_id' => 6,],
            // AB+            
            ['receptor_id' => 7, 'doador_id' => 1,],
            ['receptor_id' => 7, 'doador_id' => 2,],
            ['receptor_id' => 7, 'doador_id' => 3,],
            ['receptor_id' => 7, 'doador_id' => 4,],
            ['receptor_id' => 7, 'doador_id' => 5,],
            ['receptor_id' => 7, 'doador_id' => 6,],
            ['receptor_id' => 7, 'doador_id' => 7,],
            ['receptor_id' => 7, 'doador_id' => 8,],
            // AB-
            ['receptor_id' => 8, 'doador_id' => 2,],
            ['receptor_id' => 8, 'doador_id' => 4,],
            ['receptor_id' => 8, 'doador_id' => 6,],
            ['receptor_id' => 8, 'doador_id' => 8,],  
        ]);
    }
}
