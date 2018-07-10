<?php

use Illuminate\Database\Seeder;

class EdificiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('edificios')->insert([
            'nombre' => 'Modena',
            'direccion'=> 'Entre Ríos 142',
            'cochera'=> true,
            'imagen'=> 'sin_imagen.png',
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cant_ascensores'=> '2',
            'cant_pisos'=> '18', 
            'cant_deptos'=> '18',
            'costo_sueldos_personal'=> '10000',
            'valor_ascensores'=> '500000',
            'costo_mant_ascensores'=> '7000',
            'costo_limpieza'=> '8000',
            'costo_seguro'  => '7500',
            'fecha_habilitacion'=> '2010-10-01',
            'administrado_por_sistema'=> true,
            'descripcion'=> 'La nueva sede del BCE es un conjunto arquitectónico formado por tres elementos principales: el Grossmarkthalle (antiguo mercado mayorista de Fráncfort), dotado de nuevas estructuras internas; un rascacielos formado por dos torres de oficinas conectadas por un atrio; y el edificio de entrada, que crea una conexión visual entre el Grossmarkthalle y el rascacielos y es el acceso principal al BCE desde la calle Sonnemannstrasse.',
            'barrio_id' => '1',
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        #Edificio JUAMPY -- No CloudProp
        DB::table('edificios')->insert([
            'nombre' => 'Condominio del Este',
            'direccion'=> 'Monteagudo 695',
            'imagen'=> 'sin_imagen.png',
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cochera'=> true,
            'cant_ascensores'=> '1',
            'cant_pisos'=> '18', 
            'cant_deptos'=> '17',
            'costo_sueldos_personal'=> '22000',
            'valor_ascensores'=> '1500000',
            'costo_mant_ascensores'=> '4000',
            'costo_limpieza'=> '1000',
            'costo_seguro'  => '7500',
            'fecha_habilitacion'=> '2005-10-01',
            'administrado_por_sistema'=> false,
            'descripcion'=> 'Situado en zona centrica de Resistencia, Condominio del Este es un apart residencial con patio frontal, terraza con parrillas y seguridad las 24hs del día.',
            'barrio_id' => '2',
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);



        DB::table('edificios')->insert([
            'nombre' => 'Los Robles',
            'direccion'=> 'Av. Ávalos y Entre Rios',
            'imagen'=> 'sin_imagen.png',
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cochera'=> true,
            'cant_ascensores'=> '2',
            'cant_pisos'=> '18', 
            'cant_deptos'=> '25',
            'costo_sueldos_personal'=> '7500',
            'valor_ascensores'=> '500000',
            'costo_mant_ascensores'=> '7000',
            'costo_limpieza'=> '8000',
            'costo_seguro'  => '7500',
            'fecha_habilitacion'=> '2010-10-01',
            'administrado_por_sistema'=> true,
            'descripcion'=> 'La nueva sede del BCE es un conjunto arquitectónico formado por tres elementos principales: el Grossmarkthalle (antiguo mercado mayorista de Fráncfort), dotado de nuevas estructuras internas; un rascacielos formado por dos torres de oficinas conectadas por un atrio; y el edificio de entrada, que crea una conexión visual entre el Grossmarkthalle y el rascacielos y es el acceso principal al BCE desde la calle Sonnemannstrasse.',
            'barrio_id' => '3',
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);



        DB::table('edificios')->insert([
            'nombre' => 'Torres Sarmiento',
            'direccion'=> 'Juan D. Perón al 1400',
            'imagen'=> 'sin_imagen.png',
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cochera'=> true,
            'cant_ascensores'=> '2',
            'cant_pisos'=> '18', 
            'cant_deptos'=> '18',
            'costo_sueldos_personal'=> '7500',
            'valor_ascensores'=> '500000',
            'costo_mant_ascensores'=> '7000',
            'costo_limpieza'=> '8000',
            'costo_seguro'  => '7500',
            'fecha_habilitacion'=> '2010-10-01',
            'administrado_por_sistema'=> false,
            'descripcion'=> 'La nueva sede del BCE es un conjunto arquitectónico formado por tres elementos principales: el Grossmarkthalle (antiguo mercado mayorista de Fráncfort), dotado de nuevas estructuras internas; un rascacielos formado por dos torres de oficinas conectadas por un atrio; y el edificio de entrada, que crea una conexión visual entre el Grossmarkthalle y el rascacielos y es el acceso principal al BCE desde la calle Sonnemannstrasse.',
            'barrio_id' => '4',
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Torre Vista',
            'direccion'=> 'Salta 289',
            'imagen'=> 'sin_imagen.png',
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cochera'=> true,
            'cant_ascensores'=> '2',
            'cant_pisos'=> '18', 
            'cant_deptos'=> '26',
            'costo_sueldos_personal'=> '7500',
            'valor_ascensores'=> '500000',
            'costo_mant_ascensores'=> '7000',
            'costo_limpieza'=> '8000',
            'costo_seguro'  => '7500',
            'fecha_habilitacion'=> '2010-10-01',
            'administrado_por_sistema'=> false,
            'descripcion'=> 'La nueva sede del BCE es un conjunto arquitectónico formado por tres elementos principales: el Grossmarkthalle (antiguo mercado mayorista de Fráncfort), dotado de nuevas estructuras internas; un rascacielos formado por dos torres de oficinas conectadas por un atrio; y el edificio de entrada, que crea una conexión visual entre el Grossmarkthalle y el rascacielos y es el acceso principal al BCE desde la calle Sonnemannstrasse.',
            'barrio_id' => '5',
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        #Edificio HACHO -- 100% CloudProp
        DB::table('edificios')->insert([
            'nombre' => 'Torre Kuszniruk',
            'direccion'=> 'Corrientes 2247',
            'imagen'=> 'sin_imagen.png',
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cochera'=> false,
            'cant_ascensores'=> '0',
            'cant_pisos'=> '18', 
            'cant_deptos'=> '6',
            'costo_sueldos_personal'=> '0',
            'valor_ascensores'=> '0',
            'costo_mant_ascensores'=> '0',
            'costo_limpieza'=> '0',
            'costo_seguro'  => '0',
            'fecha_habilitacion'=> '2005-10-01',
            'administrado_por_sistema'=> true,
            'descripcion'=> 'Edificio autoadministrado',
            'barrio_id' => '138',
            'localidad_id'=> '5',
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
