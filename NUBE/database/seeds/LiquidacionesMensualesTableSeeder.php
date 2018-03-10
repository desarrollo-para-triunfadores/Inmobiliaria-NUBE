<?php

use Illuminate\Database\Seeder;

class LiquidacionesMensualesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('liquidaciones_mensuales')->insert([
            'contrato_id'=> '1', 
            'periodo'=> '1/2018',        
            'total' => '57422.50',
            'alquiler' =>'15000.00',
            'subtotal' =>  '57422.50',
            'comision_a_propietario' => '1350.00',
            'gastos_administrativos' => '472.50',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('liquidaciones_mensuales')->insert([
            'contrato_id'=> '2', 
            'periodo'=> '1/2018',
            'total' => '57422.50',
            'alquiler' =>'15000.00',
            'subtotal' =>  '57422.50',
            'comision_a_propietario' => '1350.00',
            'gastos_administrativos' => '472.50',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
