<?php

use Illuminate\Database\Seeder;

class PaisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paises')->insert([
            'nombre' => 'Argentina',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Brasil',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Paraguay',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Uruguay',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Chile',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Bolivia',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Colombia',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Alemania',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Inglaterra',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Venezuela',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Ecuador',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'México',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'China',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Japón',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Corea del Sur',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Holanda',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Estados Unidos',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Canadá',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'España',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Portugal',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Sudáfrica',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Senegal',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Turquía',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Arabia Saudita',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Israel',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Francia',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('paises')->insert([
            'nombre' => 'Rusia',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
