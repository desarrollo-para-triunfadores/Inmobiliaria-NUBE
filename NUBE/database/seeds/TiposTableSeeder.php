<?php

use Illuminate\Database\Seeder;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
            'nombre' => 'Departamento',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('tipos')->insert([
            'nombre' => 'Casa',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('tipos')->insert([
            'nombre' => 'Barrio',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('tipos')->insert([
            'nombre' => 'Terreno',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
