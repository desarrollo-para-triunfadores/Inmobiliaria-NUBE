<?php

use Illuminate\Database\Seeder;

class ContratosPeriodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '1',
            'fin_periodo' => '6',
            'monto_fijo' => '17403.75',
            'monto_incremental' => '15000',
            'contrato_id' => '1',
            'created_at' => date('Y-m-d H:m:s')                       
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '7',
            'fin_periodo' => '12',
            'monto_fijo' => '17403.75',
            'monto_incremental' => '16500',
            'contrato_id' => '1',
            'created_at' => date('Y-m-d H:m:s')                       
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '13',
            'fin_periodo' => '18',
            'monto_fijo' => '17403.75',
            'monto_incremental' => '18150',
            'contrato_id' => '1',
            'created_at' => date('Y-m-d H:m:s')                       
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '19',
            'fin_periodo' => '24',
            'monto_fijo' => '17403.75',
            'monto_incremental' => '19965',
            'contrato_id' => '1',
            'created_at' => date('Y-m-d H:m:s')                       
        ]);



        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '1',
            'fin_periodo' => '6',
            'monto_fijo' => '16823.63',
            'monto_incremental' => '14500',
            'contrato_id' => '2',
            'created_at' => date('Y-m-d H:m:s') 
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '7',
            'fin_periodo' => '12',
            'monto_fijo' => '16823.63',
            'monto_incremental' => '15950',
            'contrato_id' => '2',
            'created_at' => date('Y-m-d H:m:s')                       
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '13',
            'fin_periodo' => '18',
            'monto_fijo' => '16823.63',
            'monto_incremental' => '17545',
            'contrato_id' => '2',
            'created_at' => date('Y-m-d H:m:s')                       
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '19',
            'fin_periodo' => '24',
            'monto_fijo' => '16823.63',
            'monto_incremental' => '19299.50',
            'contrato_id' => '2',
            'created_at' => date('Y-m-d H:m:s')                       
        ]);


        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '1',
            'fin_periodo' => '6',
            'monto_fijo' => '13923',
            'monto_incremental' => '12000',
            'contrato_id' => '4',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '7',
            'fin_periodo' => '12',
            'monto_fijo' => '13923',
            'monto_incremental' => '13200',
            'contrato_id' => '4',
            'created_at' => date('Y-m-d H:m:s')                       
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '13',
            'fin_periodo' => '18',
            'monto_fijo' => '13923',
            'monto_incremental' => '14520',
            'contrato_id' => '4',
            'created_at' => date('Y-m-d H:m:s')                       
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '19',
            'fin_periodo' => '24',
            'monto_fijo' => '13923',
            'monto_incremental' => '15972',
            'contrato_id' => '4',
            'created_at' => date('Y-m-d H:m:s')                       
        ]);




        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '1',
            'fin_periodo' => '6',
            'monto_fijo' => '13923',
            'monto_incremental' => '12000',
            'contrato_id' => '4',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '7',
            'fin_periodo' => '12',
            'monto_fijo' => '13923',
            'monto_incremental' => '13200',
            'contrato_id' => '4',
            'created_at' => date('Y-m-d H:m:s')                       
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '13',
            'fin_periodo' => '18',
            'monto_fijo' => '13923',
            'monto_incremental' => '14520',
            'contrato_id' => '4',
            'created_at' => date('Y-m-d H:m:s')                       
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '19',
            'fin_periodo' => '24',
            'monto_fijo' => '13923',
            'monto_incremental' => '15972',
            'contrato_id' => '4',
            'created_at' => date('Y-m-d H:m:s')                       
        ]);





        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '1',
            'fin_periodo' => '6',
            'monto_fijo' => '18583.32',
            'monto_incremental' => '13000',
            'contrato_id' => '3',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '7',
            'fin_periodo' => '12',
            'monto_fijo' => '18583.32',
            'monto_incremental' => '14300',
            'contrato_id' => '3',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '13',
            'fin_periodo' => '18',
            'monto_fijo' => '18583.32',
            'monto_incremental' => '15730',
            'contrato_id' => '3',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '19',
            'fin_periodo' => '24',
            'monto_fijo' => '18583.32',
            'monto_incremental' => '17303',
            'contrato_id' => '3',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);
        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '25',
            'fin_periodo' => '30',
            'monto_fijo' => '18583.32',
            'monto_incremental' => '19033.30',
            'contrato_id' => '3',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '31',
            'fin_periodo' => '36',
            'monto_fijo' => '18583.32',
            'monto_incremental' => '20936.63',
            'contrato_id' => '3',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '37',
            'fin_periodo' => '42',
            'monto_fijo' => '18583.32',
            'monto_incremental' => '23030.29',
            'contrato_id' => '3',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '43',
            'fin_periodo' => '48',
            'monto_fijo' => '18583.32',
            'monto_incremental' => '25333.32',
            'contrato_id' => '3',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);




        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '1',
            'fin_periodo' => '6',
            'monto_fijo' => '24301.26',
            'monto_incremental' => '17000',
            'contrato_id' => '5',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '7',
            'fin_periodo' => '12',
            'monto_fijo' => '24301.26',
            'monto_incremental' => '18700',
            'contrato_id' => '5',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '13',
            'fin_periodo' => '18',
            'monto_fijo' => '24301.26',
            'monto_incremental' => '20570',
            'contrato_id' => '5',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '19',
            'fin_periodo' => '24',
            'monto_fijo' => '24301.26',
            'monto_incremental' => '22627',
            'contrato_id' => '5',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);
        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '25',
            'fin_periodo' => '30',
            'monto_fijo' => '24301.26',
            'monto_incremental' => '24889.70',
            'contrato_id' => '5',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '31',
            'fin_periodo' => '36',
            'monto_fijo' => '24301.26',
            'monto_incremental' => '27378.67',
            'contrato_id' => '5',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '37',
            'fin_periodo' => '42',
            'monto_fijo' => '24301.26',
            'monto_incremental' => '30116.54',
            'contrato_id' => '5',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);

        DB::table('contratos_periodos')->insert([
            'inicio_periodo' => '43',
            'fin_periodo' => '48',
            'monto_fijo' => '24301.26',
            'monto_incremental' => '33128.19',
            'contrato_id' => '5',
            'created_at' => date('Y-m-d H:m:s')                        
        ]);


    }
}
