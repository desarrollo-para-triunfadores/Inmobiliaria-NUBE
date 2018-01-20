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
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('liquidaciones_mensuales')->insert([
            'contrato_id'=> '2',           
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
