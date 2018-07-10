<?php

use Illuminate\Database\Seeder;

class RubroTecnicoTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('rubrosTecnicos')->insert([
            'nombre' => 'Plomero',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('rubrosTecnicos')->insert([
            'nombre' => 'Electricista',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('rubrosTecnicos')->insert([
            'nombre' => 'Albañil',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('rubrosTecnicos')->insert([
            'nombre' => 'Carpintero',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('rubrosTecnicos')->insert([
            'nombre' => 'Decorador de interiores',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('rubrosTecnicos')->insert([
            'nombre' => 'Jardinero',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('rubrosTecnicos')->insert([
            'nombre' => 'Refrigeraciones',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }

}
