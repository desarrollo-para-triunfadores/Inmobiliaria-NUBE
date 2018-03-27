<?php

use Illuminate\Database\Seeder;

class RubrosTecnicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubrostecnicos')->insert([
            'nombre' => 'Plomero',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('rubrostecnicos')->insert([
            'nombre' => 'Electricista',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('rubrostecnicos')->insert([
            'nombre' => 'Albañil',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('rubrostecnicos')->insert([
            'nombre' => 'Carpintero',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('rubrostecnicos')->insert([
            'nombre' => 'Decorador de interiores',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('rubrostecnicos')->insert([
            'nombre' => 'Jardinero',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('rubrostecnicos')->insert([
            'nombre' => 'Refrigeraciones',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
