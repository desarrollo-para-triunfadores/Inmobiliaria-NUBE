<?php

use Illuminate\Database\Seeder;

class EstadosOportunidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados_oportunidades')->insert([
            'nombre' => 'Inicial',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('estados_oportunidades')->insert([
            'nombre' => 'En negociación',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('estados_oportunidades')->insert([
            'nombre' => 'Prospecto',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('estados_oportunidades')->insert([
            'nombre' => 'En trámite',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('estados_oportunidades')->insert([
            'nombre' => 'Eliminada',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
