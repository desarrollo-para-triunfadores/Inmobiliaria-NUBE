<?php

use Illuminate\Database\Seeder;

class LocalidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('localidades')->insert([
            'nombre' => 'Resistencia',
            'cod_postal' => '3500',
            'provincia_id' => '6',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('localidades')->insert([
            'nombre' => 'Barranqueras',
            'cod_postal' => '3510',
            'provincia_id' => '6',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('localidades')->insert([
            'nombre' => 'Villa Ángela',
            'cod_postal' => '3513',
            'provincia_id' => '6',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('localidades')->insert([
            'nombre' => 'Fontana',
            'cod_postal' => '3519',
            'provincia_id' => '6',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('localidades')->insert([
            'nombre' => 'Posadas',
            'cod_postal' => '3300',
            'provincia_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('localidades')->insert([
            'nombre' => 'Sáenz Peña',
            'cod_postal' => '3700',
            'provincia_id' => '6',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('localidades')->insert([
            'nombre' => 'Corrientes',
            'cod_postal' => '3400',
            'provincia_id' => '2',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('localidades')->insert([
            'nombre' => 'Ituzaingó',
            'cod_postal' => '3302',
            'provincia_id' => '2',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('localidades')->insert([
            'nombre' => 'Puerto Vilelas',
            'cod_postal' => '3503',
            'provincia_id' => '6',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('localidades')->insert([
            'nombre' => 'Colonia Baranda',
            'cod_postal' => '3733',
            'provincia_id' => '6',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('localidades')->insert([
            'nombre' => 'Puerto Tirol',
            'cod_postal' => '3505',
            'provincia_id' => '6',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('localidades')->insert([
            'nombre' => 'Colonia Benitez',
            'cod_postal' => '3505',
            'provincia_id' => '6',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
