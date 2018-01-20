<?php

use Illuminate\Database\Seeder;

class InquilinosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inquilinos')->insert([
            'persona_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inquilinos')->insert([
            'persona_id' => '2',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inquilinos')->insert([
            'persona_id' => '3',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inquilinos')->insert([
            'persona_id' => '4',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inquilinos')->insert([
            'persona_id' => '5',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inquilinos')->insert([
            'persona_id' => '6',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inquilinos')->insert([
            'persona_id' => '7',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inquilinos')->insert([
            'persona_id' => '8',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inquilinos')->insert([
            'persona_id' => '9',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('inquilinos')->insert([
            'persona_id' => '10',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
