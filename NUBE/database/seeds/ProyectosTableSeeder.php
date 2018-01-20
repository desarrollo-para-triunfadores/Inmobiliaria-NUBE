<?php

use Illuminate\Database\Seeder;

class ProyectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('proyectos')->insert([
            'condicion' => 'alquiler',                     
            'valorVenta'=> '4000000', 
            'valorAlquiler'=> '15000', 
            'superficie'=> '85', 
            'direccion'=> 'Entre Ríos 142', 
            'piso'=> '4', 
            'numDepto'   => '5',          
            'fechaHabilitacion'=> '2018-01-01', 
            'linkVideo'=> 'https://www.youtube.com/watch?v=TgeX-AF7_DE', 
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cantidadAmbientes'=> '5', 
            'cantidadBaños'=> '2', 
            'cantidadGarages'=> '1', 
            'disponible'     => true,        
            'descripcion1'   => 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.', 
            'descripcion2'   => 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.',           
            'edificio_id'  => '1',       
            'tipo_id'     => '1',   
            'propietario_id'  => '1',      
            'barrio_id'       => '14', 
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')            
        ]);


    }
}
