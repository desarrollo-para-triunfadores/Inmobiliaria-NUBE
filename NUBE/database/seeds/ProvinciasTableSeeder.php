<?php

use Illuminate\Database\Seeder;

class ProvinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')->insert([
            'nombre' => 'Misiones',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Corrientes',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Entre Rios',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Buenos Aires',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'La Pampa',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Chaco',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Formosa',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Salta',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Tucumán',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Santiago del Estero',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Córdoba',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'San Luis',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'San Juan',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Mendoza',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Neuquén',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Chubut',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Río Negro',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Santa Cruz',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Tierra del Fuego',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);  
        DB::table('provincias')->insert([
            'nombre' => 'Santa Fe',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);   
        DB::table('provincias')->insert([
            'nombre' => 'Catamarca',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);   
        DB::table('provincias')->insert([
            'nombre' => 'La Rioja',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Jujuy',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
