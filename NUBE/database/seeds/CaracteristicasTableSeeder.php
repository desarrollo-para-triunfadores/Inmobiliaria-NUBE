<?php

use Illuminate\Database\Seeder;

class CaracteristicasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
            DB::table('caracteristicas')->insert([
                'nombre' => 'Piso de parquet',
                'tipo_id' => '1',
                'created_at' => date('Y-m-d H:m:s')
            ]);
           
            DB::table('caracteristicas')->insert([
                'nombre' => 'Pileta',
                'tipo_id' => '1',
                'created_at' => date('Y-m-d H:m:s')
            ]);

            DB::table('caracteristicas')->insert([
                'nombre' => 'Playa cercana',
                'tipo_id' => '1',
                'created_at' => date('Y-m-d H:m:s')
            ]);

            DB::table('caracteristicas')->insert([
                'nombre' => 'Balcón',
                'tipo_id' => '1',
                'created_at' => date('Y-m-d H:m:s')
            ]);
            
            DB::table('caracteristicas')->insert([
                'nombre' => 'Terraza',
                'tipo_id' => '1',
                'created_at' => date('Y-m-d H:m:s')
            ]);

            DB::table('caracteristicas')->insert([
                'nombre' => 'Terraza compartida',
                'tipo_id' => '1',
                'created_at' => date('Y-m-d H:m:s')
            ]);
           
            DB::table('caracteristicas')->insert([
                'nombre' => 'Terraza privada',
                'tipo_id' => '1',
                'created_at' => date('Y-m-d H:m:s')
            ]);

            DB::table('caracteristicas')->insert([
                'nombre' => 'Wi-Fi Libre',
                'tipo_id' => '1',
                'created_at' => date('Y-m-d H:m:s')
            ]);

            DB::table('caracteristicas')->insert([
                'nombre' => 'Picina',
                'tipo_id' => '2',
                'created_at' => date('Y-m-d H:m:s')
            ]);
            
            DB::table('caracteristicas')->insert([
                'nombre' => 'Picina compartida',
                'tipo_id' => '1',
                'created_at' => date('Y-m-d H:m:s')
            ]);

            DB::table('caracteristicas')->insert([
                'nombre' => 'Picina privada',
                'tipo_id' => '1',
                'created_at' => date('Y-m-d H:m:s')
            ]);
           
            DB::table('caracteristicas')->insert([
                'nombre' => 'Cocina amueblada',
                'tipo_id' => '1','created_at' => date('Y-m-d H:m:s')
            ]);

            DB::table('caracteristicas')->insert([
                'nombre' => 'Parquet',
                'tipo_id' => '2',
                'created_at' => date('Y-m-d H:m:s')
            ]);

            DB::table('caracteristicas')->insert([
                'nombre' => 'Céntrico',
                'tipo_id' => '1',
                'created_at' => date('Y-m-d H:m:s')
            ]);
            
            DB::table('caracteristicas')->insert([
                'nombre' => 'Terraza compartida',
                'tipo_id' => '1',
                'created_at' => date('Y-m-d H:m:s')
            ]);
       
    }
}
