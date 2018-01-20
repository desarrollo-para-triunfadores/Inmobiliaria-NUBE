<?php

use Illuminate\Database\Seeder;

class GarantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('garantes')->insert([
            'persona_id' => '11',
            'created_at' => date('Y-m-d H:m:s')            
        ]);

        DB::table('garantes')->insert([
            'persona_id' => '12',
            'created_at' => date('Y-m-d H:m:s')            
        ]);

        DB::table('garantes')->insert([
            'persona_id' => '13',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('garantes')->insert([
            'persona_id' => '14',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('garantes')->insert([
            'persona_id' => '15',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('garantes')->insert([
            'persona_id' => '16',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('garantes')->insert([
            'persona_id' => '17',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('garantes')->insert([
            'persona_id' => '18',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('garantes')->insert([
            'persona_id' => '19',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('garantes')->insert([
            'persona_id' => '20',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
