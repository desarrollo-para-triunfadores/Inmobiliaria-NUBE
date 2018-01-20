<?php

use Illuminate\Database\Seeder;

class EspaciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('espacios')->insert([
            'nombre' => 'Cocina',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Comedor',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Closet',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Baño',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Garage',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Living',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Salón de juegos',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Habitación 1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Habitación 2',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Habitación 3',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Baño 1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Baño 2',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Baño 3',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Terraza',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('espacios')->insert([
            'nombre' => 'Quincho',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
