<?php

use Illuminate\Database\Seeder;

class PropietariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('propietarios')->insert([
            'persona_id' => '21',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('propietarios')->insert([
            'persona_id' => '22',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('propietarios')->insert([
            'persona_id' => '23',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('propietarios')->insert([
            'persona_id' => '24',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('propietarios')->insert([
            'persona_id' => '25',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('propietarios')->insert([
            'persona_id' => '26',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('propietarios')->insert([
            'persona_id' => '27',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('propietarios')->insert([
            'persona_id' => '28',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('propietarios')->insert([
            'persona_id' => '29',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('propietarios')->insert([
            'persona_id' => '30',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
