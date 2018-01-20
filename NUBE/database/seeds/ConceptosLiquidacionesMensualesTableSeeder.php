<?php

use Illuminate\Database\Seeder;

class ConceptosLiquidacionesMensualesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conceptos_liquidaciones_mensuales')->insert([
            'liquidacionmensual_id'=> '1',
            'serviciocontrato_id'=> '1',
            'monto'=> '345.50',
            'periodo'=> '12/2017',
            'primer_vencimiento'=> '2018-01-10',
            'segundo_vencimiento'=> '2018-01-20',
            'servicio_abonado'=> true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('conceptos_liquidaciones_mensuales')->insert([
            'liquidacionmensual_id'=> '1',
            'serviciocontrato_id'=> '2',
            'monto'=> '240.00',
            'periodo'=> '12/2017',
            'primer_vencimiento'=> '2018-01-10',
            'segundo_vencimiento'=> '2018-01-20',
            'servicio_abonado'=> true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('conceptos_liquidaciones_mensuales')->insert([
            'liquidacionmensual_id'=> '1',
            'serviciocontrato_id'=> '3',
            'monto'=> '1180.60',
            'periodo'=> '12/2017',
            'primer_vencimiento'=> '2018-01-10',
            'segundo_vencimiento'=> '2018-01-20',
            'servicio_abonado'=> true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('conceptos_liquidaciones_mensuales')->insert([
            'liquidacionmensual_id'=> '1',
            'serviciocontrato_id'=> '4',
            'monto'=> '500.25',
            'periodo'=> '12/2017',
            'primer_vencimiento'=> '2018-01-10',
            'segundo_vencimiento'=> '2018-01-20',
            'servicio_abonado'=> true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('conceptos_liquidaciones_mensuales')->insert([
            'liquidacionmensual_id'=> '1',
            'serviciocontrato_id'=> '5',
            'monto'=> '180.15',
            'periodo'=> '12/2017',
            'primer_vencimiento'=> '2018-01-10',
            'segundo_vencimiento'=> '2018-01-20',
            'servicio_abonado'=> true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('conceptos_liquidaciones_mensuales')->insert([
            'liquidacionmensual_id'=> '1',
            'serviciocontrato_id'=> '6',
            'monto'=> '98.75',
            'periodo'=> '12/2017',
            'primer_vencimiento'=> '2018-01-10',
            'segundo_vencimiento'=> '2018-01-20',
            'servicio_abonado'=> true,
            'created_at' => date('Y-m-d H:m:s')
        ]);




        DB::table('conceptos_liquidaciones_mensuales')->insert([
            'liquidacionmensual_id'=> '2',
            'serviciocontrato_id'=> '7',
            'monto'=> '550.60',
            'periodo'=> '12/2017',
            'primer_vencimiento'=> '2018-01-10',
            'segundo_vencimiento'=> '2018-01-20',
            'servicio_abonado'=> true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('conceptos_liquidaciones_mensuales')->insert([
            'liquidacionmensual_id'=> '2',
            'serviciocontrato_id'=> '8',
            'monto'=> '240.00',
            'periodo'=> '12/2017',
            'primer_vencimiento'=> '2018-01-10',
            'segundo_vencimiento'=> '2018-01-20',
            'servicio_abonado'=> true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('conceptos_liquidaciones_mensuales')->insert([
            'liquidacionmensual_id'=> '2',
            'serviciocontrato_id'=> '9',
            'monto'=> '1550.00',
            'periodo'=> '12/2017',
            'primer_vencimiento'=> '2018-01-10',
            'segundo_vencimiento'=> '2018-01-20',
            'servicio_abonado'=> true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('conceptos_liquidaciones_mensuales')->insert([
            'liquidacionmensual_id'=> '2',
            'serviciocontrato_id'=> '10',
            'monto'=> '400.00',
            'periodo'=> '12/2017',
            'primer_vencimiento'=> '2018-01-10',
            'segundo_vencimiento'=> '2018-01-20',
            'servicio_abonado'=> true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('conceptos_liquidaciones_mensuales')->insert([
            'liquidacionmensual_id'=> '2',
            'serviciocontrato_id'=> '11',
            'monto'=> '180.15',
            'periodo'=> '12/2017',
            'primer_vencimiento'=> '2018-01-10',
            'segundo_vencimiento'=> '2018-01-20',
            'servicio_abonado'=> true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('conceptos_liquidaciones_mensuales')->insert([
            'liquidacionmensual_id'=> '2',
            'serviciocontrato_id'=> '12',
            'monto'=> '136.40',
            'periodo'=> '12/2017',
            'primer_vencimiento'=> '2018-01-10',
            'segundo_vencimiento'=> '2018-01-20',
            'servicio_abonado'=> true,
            'created_at' => date('Y-m-d H:m:s')
        ]);
 
    }
}
