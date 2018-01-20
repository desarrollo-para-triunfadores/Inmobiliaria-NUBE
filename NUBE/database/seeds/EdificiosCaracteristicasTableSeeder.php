<?php

use Illuminate\Database\Seeder;

class EdificiosCaracteristicasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '8',
            'edificio_id'  => '1',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);
        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '9',
            'edificio_id'  => '1',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);
        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '14',
            'edificio_id'  => '1',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);    
        
        

        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '8',
            'edificio_id'  => '2',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);
        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '9',
            'edificio_id'  => '2',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);
        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '14',
            'edificio_id'  => '2',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);   



        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '8',
            'edificio_id'  => '3',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);
        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '9',
            'edificio_id'  => '3',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);
        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '14',
            'edificio_id'  => '3',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);   



        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '8',
            'edificio_id'  => '4',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);
        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '9',
            'edificio_id'  => '4',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);
        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '14',
            'edificio_id'  => '4',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);   



        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '8',
            'edificio_id'  => '5',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);
        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '9',
            'edificio_id'  => '5',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);
        DB::table('edificios_caracteristicas')->insert([
            'caracteristica_id' => '14',
            'edificio_id'  => '5',
            'created_at' => date('Y-m-d H:m:s')                     
        ]);   

    }
}
