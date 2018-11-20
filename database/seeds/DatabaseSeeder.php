<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EstadosTableSeeder::class);
        $this->call(SangueTableSeeder::class);
        $this->call(CompatibilidadesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
    }
}
