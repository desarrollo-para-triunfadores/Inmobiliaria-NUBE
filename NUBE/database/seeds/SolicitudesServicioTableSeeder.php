<?php

use Illuminate\Database\Seeder;

class SolicitudesServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('solicitudesServicio')->insert([
            'tecnico_id'  => 1,
            'contrato_id'  => 1,
            'responsable'  => 'inquilino',
            'rubrotecnico_id'  => 1,
            'motivo'  => 'la canilla del baño gotea',
            'estado'  => 'tomada',
            'created_at' => date('Y-m-d H:m:s')
        ]);

    }
}
