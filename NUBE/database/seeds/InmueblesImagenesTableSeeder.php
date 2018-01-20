<?php

use Illuminate\Database\Seeder;

class InmueblesImagenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_1510029727.jpg',
            'seccion_imagen' => 'portada',            
            'inmueble_id'  => '1',            
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_slide1500132465.jpg',
            'seccion_imagen' => 'slider',            
            'inmueble_id'  => '1',            
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_detalle1_1500132465.jpg',
            'seccion_imagen' => 'detalle',
            'espacio_id'  => '6',
            'inmueble_id'  => '1',            
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_detalle2_1500132465.jpg',
            'seccion_imagen' => 'detalle',
            'espacio_id'  => '4',
            'inmueble_id'  => '1',            
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_detalle3_1500132465.jpg',
            'seccion_imagen' => 'detalle',
            'espacio_id'  => '8',
            'inmueble_id'  => '1',            
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_detalle4_1500132465.jpg',
            'seccion_imagen' => 'detalle',
            'espacio_id'  => '1',
            'inmueble_id'  => '1',            
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_plano1_1500132465.jpg',
            'seccion_imagen' => 'planoMin',            
            'inmueble_id'  => '1',            
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_plano2_1500132465.jpg',
            'seccion_imagen' => 'planoMin',            
            'inmueble_id'  => '1',            
            'created_at' => date('Y-m-d H:m:s')
        ]);




        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_1500132242.jpg',
            'seccion_imagen' => 'portada',            
            'inmueble_id'  => '2',            
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_slide14929773971.jpg',
            'seccion_imagen' => 'slider',            
            'inmueble_id'  => '2',            
            'created_at' => date('Y-m-d H:m:s')
        ]);



        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_1493159869.jpg',
            'seccion_imagen' => 'portada',            
            'inmueble_id'  => '3',            
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_slide1492977397.jpg',
            'seccion_imagen' => 'slider',            
            'inmueble_id'  => '3',            
            'created_at' => date('Y-m-d H:m:s')
        ]);




        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_1510029727.jpg',
            'seccion_imagen' => 'portada',            
            'inmueble_id'  => '4',            
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_slide14929687678.jpg',
            'seccion_imagen' => 'slider',            
            'inmueble_id'  => '4',            
            'created_at' => date('Y-m-d H:m:s')
        ]);



        DB::table('inmuebles_imagenes')->insert([
            'nombre' => 'INube_1495472610.jpg',
            'seccion_imagen' => 'slider',            
            'proyecto_id'  => '1',            
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
