<?php

use Illuminate\Database\Seeder;

class TecnicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tecnicos')->insert([
            'persona_id' => '42',
            'rubroTecnico_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
