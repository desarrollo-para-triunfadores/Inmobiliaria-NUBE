<?php

use Illuminate\Database\Seeder;

class ContratosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('contratos')->insert([
            'tipo_renta'  => 'creciente', 
            'periodos' => '6',
            'fecha_desde' => '2018-01-01',
            'fecha_hasta' => '2020-01-01',  
            'incremento' => '10',
            'comision_propietario' => '9',
            'comision_inquilino' => '3.15',
            'monto_basico' => '15000',             
            'inquilino_id' => '1',
            'inmueble_id'  => '1', 
            'garante_id' => '1',
            'created_at' => date('Y-m-d H:m:s')    
        ]);

        DB::table('contratos')->insert([
            'tipo_renta'  => 'fija', 
            'periodos' => '6',
            'fecha_desde' => '2018-01-01',
            'fecha_hasta' => '2020-01-01',  
            'incremento' => '10',
            'comision_propietario' => '9',
            'comision_inquilino' => '3.15',
            'monto_basico' => '14500',             
            'inquilino_id' => '2',
            'inmueble_id'  => '2', 
            'garante_id' => '2',
            'created_at' => date('Y-m-d H:m:s')    
        ]);

        DB::table('contratos')->insert([
            'tipo_renta'  => 'creciente', 
            'periodos' => '6',
            'fecha_desde' => '2018-01-01',
            'fecha_hasta' => '2022-01-01',  
            'incremento' => '10',
            'comision_propietario' => '9',
            'comision_inquilino' => '3.15',
            'monto_basico' => '13000',             
            'inquilino_id' => '3',
            'inmueble_id'  => '3', 
            'garante_id' => '3',
            'created_at' => date('Y-m-d H:m:s')    
        ]);

        DB::table('contratos')->insert([
            'tipo_renta'  => 'creciente', 
            'periodos' => '6',
            'fecha_desde' => '2018-01-01',
            'fecha_hasta' => '2020-01-01', 
            'incremento' => '10',
            'comision_propietario' => '9',
            'comision_inquilino' => '3.15',
            'monto_basico' => '12000',             
            'inquilino_id' => '4',
            'inmueble_id'  => '4', 
            'garante_id' => '4',
            'created_at' => date('Y-m-d H:m:s')    
        ]);

        DB::table('contratos')->insert([
            'tipo_renta'  => 'fija', 
            'periodos' => '6',
            'fecha_desde' => '2018-01-01',
            'fecha_hasta' => '2022-01-01',  
            'incremento' => '10',
            'comision_propietario' => '9',
            'comision_inquilino' => '3.15',
            'monto_basico' => '17000',             
            'inquilino_id' => '5',
            'inmueble_id'  => '5', 
            'garante_id' => '5',
            'created_at' => date('Y-m-d H:m:s')    
        ]);
    }
}
