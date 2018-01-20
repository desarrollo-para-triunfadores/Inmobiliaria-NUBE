<?php

use Illuminate\Database\Seeder;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicios')->insert([
            'nombre' => 'Luz',
            'servicio_compartido' => false,
            'descripcion' => 'Servicio de electricidad',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('servicios')->insert([
            'nombre' => 'Gas',
            'servicio_compartido' => false,
            'descripcion' => 'Servicio de gas comunitario',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('servicios')->insert([
            'nombre' => 'Internet',
            'servicio_compartido' => false,
            'descripcion' => 'Pago del servicio de internet de un tercero',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('servicios')->insert([
            'nombre' => 'Telefonía',
            'servicio_compartido' => false,
            'descripcion' => 'Servicio de telefono (fijo)',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('servicios')->insert([
            'nombre' => 'Pago de impuesto inmobiliario',
            'servicio_compartido' => false,
            'descripcion' => 'El administrador se encarga de abonar éste impuesto municipal',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('servicios')->insert([
            'nombre' => 'Agua',
            'servicio_compartido' => false,
            'descripcion' => 'Servicio de agua potable',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('servicios')->insert([
            'nombre' => 'Periódico',
            'servicio_compartido' => false,
            'descripcion' => 'Servicio de canillita',
            'created_at' => date('Y-m-d H:m:s')
        ]);


        DB::table('servicios')->insert([
            'nombre' => 'Limpieza lugares comunes',
            'servicio_compartido' => true,
            'descripcion' => 'Servicio de limpieza en lugares comunes',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('servicios')->insert([
            'nombre' => 'Seguro',
            'servicio_compartido' => true,
            'descripcion' => 'Pago del seguro',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('servicios')->insert([
            'nombre' => 'Valor ascensores',
            'servicio_compartido' => true,
            'descripcion' => 'Valor ascensores',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('servicios')->insert([
            'nombre' => 'Mantenimiento infraestructura',
            'servicio_compartido' => true,
            'descripcion' => 'Contempla el mantenimiento de los ascensores y otros arreglos circunstanciales',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
