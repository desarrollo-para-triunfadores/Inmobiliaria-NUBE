<?php

use Illuminate\Database\Seeder;

class InmueblesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Inmuebles para Alquilados


        DB::table('inmuebles')->insert([
            'condicion' => 'alquiler',          
            'valorReal'=> '3330000', 
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
            'cantidadDormitorios'=> '2', 
            'disponible'     => true,        
            'descripcion'   => 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.',      
            'edificio_id'  => '1',       
            'tipo_id'     => '1',   
            'propietario_id'  => '1',      
            'barrio_id'       => '14', 
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('inmuebles')->insert([
            'condicion' => 'alquiler',          
            'valorReal'=> '2250000', 
            'valorVenta'=> '3000000', 
            'valorAlquiler'=> '14500', 
            'superficie'=> '80', 
            'direccion'=> 'Entre Ríos 142', 
            'piso'=> '2', 
            'numDepto'   => '9',          
            'fechaHabilitacion'=> '2018-01-01', 
            'linkVideo'=> 'https://www.youtube.com/watch?v=TgeX-AF7_DE', 
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cantidadAmbientes'=> '5', 
            'cantidadBaños'=> '2', 
            'cantidadGarages'=> '1', 
            'cantidadDormitorios'=> '2', 
            'disponible'     => true,        
            'descripcion'   => 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.',      
            'edificio_id'  => '1',       
            'tipo_id'     => '1',   
            'propietario_id'  => '2',      
            'barrio_id'       => '14', 
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('inmuebles')->insert([
            'condicion' => 'alquiler',          
            'valorReal'=> '3500000', 
            'valorVenta'=> '4500000', 
            'valorAlquiler'=> '13000', 
            'superficie'=> '95', 
            'direccion'=> 'Av. Ávalos y Entre Rios', 
            'piso'=> '3', 
            'numDepto'   => '10',          
            'fechaHabilitacion'=> '2018-01-01', 
            'linkVideo'=> 'https://www.youtube.com/watch?v=TgeX-AF7_DE', 
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cantidadAmbientes'=> '4', 
            'cantidadBaños'=> '2', 
            'cantidadGarages'=> '1', 
            'cantidadDormitorios'=> '2', 
            'disponible'     => true,        
            'descripcion'   => 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.',      
            'edificio_id'  => '3',       
            'tipo_id'     => '1',   
            'propietario_id'  => '3',      
            'barrio_id'       => '14', 
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('inmuebles')->insert([
            'condicion' => 'alquiler',          
            'valorReal'=> '2500000', 
            'valorVenta'=> '3100000', 
            'valorAlquiler'=> '12000', 
            'superficie'=> '90', 
            'direccion'=> 'Juan D. Perón al 1400', 
            'piso'=> '3', 
            'numDepto'   => '7',          
            'fechaHabilitacion'=> '2018-01-01', 
            'linkVideo'=> 'https://www.youtube.com/watch?v=TgeX-AF7_DE', 
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cantidadAmbientes'=> '5', 
            'cantidadBaños'=> '2', 
            'cantidadGarages'=> '1', 
            'cantidadDormitorios'=> '3', 
            'disponible'     => true,        
            'descripcion'   => 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.',      
            'edificio_id'  => '4',       
            'tipo_id'     => '1',   
            'propietario_id'  => '4',      
            'barrio_id'       => '14', 
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('inmuebles')->insert([
            'condicion' => 'alquiler',          
            'valorReal'=> '5000000', 
            'valorVenta'=> '8000000', 
            'valorAlquiler'=> '17000', 
            'superficie'=> '110', 
            'direccion'=> 'Salta 289', 
            'piso'=> '5', 
            'numDepto'   => '8',          
            'fechaHabilitacion'=> '2018-01-01', 
            'linkVideo'=> 'https://www.youtube.com/watch?v=TgeX-AF7_DE', 
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cantidadAmbientes'=> '5', 
            'cantidadBaños'=> '2', 
            'cantidadGarages'=> '1', 
            'cantidadDormitorios'=> '3', 
            'disponible'     => true,        
            'descripcion'   => 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.',      
            'edificio_id'  => '5',       
            'tipo_id'     => '1',   
            'propietario_id'  => '5',      
            'barrio_id'       => '14', 
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);


        
        
                
        //Inmuebles para Alquilar

        DB::table('inmuebles')->insert([
            'condicion' => 'alquiler',          
            'valorReal'=> '3750000', 
            'valorVenta'=> '4200000', 
            'valorAlquiler'=> '11500', 
            'superficie'=> '90', 
            'direccion'=> 'Av. Las Heras 2055', 
            'piso'=> '3', 
            'numDepto'   => '9',          
            'fechaHabilitacion'=> '2018-01-01',  
            'linkVideo'=> 'https://www.youtube.com/watch?v=TgeX-AF7_DE', 
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cantidadAmbientes'=> '5', 
            'cantidadBaños'=> '2', 
            'cantidadGarages'=> '1', 
            'cantidadDormitorios'=> '2', 
            'disponible'     => false,        
            'descripcion'   => 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.',      
            'edificio_id'  => '2',       
            'tipo_id'     => '1',   
            'propietario_id'  => '6',      
            'barrio_id'       => '14', 
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('inmuebles')->insert([
            'condicion' => 'alquiler',          
            'valorReal'=> '4000000', 
            'valorVenta'=> '4500000', 
            'valorAlquiler'=> '12000', 
            'superficie'=> '92', 
            'direccion'=> 'Av. Las Heras 2055', 
            'piso'=> '2', 
            'numDepto'   => '7',          
            'fechaHabilitacion'=> '2018-01-01',  
            'linkVideo'=> 'https://www.youtube.com/watch?v=TgeX-AF7_DE', 
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cantidadAmbientes'=> '4', 
            'cantidadBaños'=> '2', 
            'cantidadGarages'=> '1', 
            'cantidadDormitorios'=> '3', 
            'disponible'     => false,        
            'descripcion'   => 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.',      
            'edificio_id'  => '2',       
            'tipo_id'     => '1',   
            'propietario_id'  => '7',      
            'barrio_id'       => '14', 
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('inmuebles')->insert([
            'condicion' => 'alquiler',          
            'valorReal'=> '2500000', 
            'valorVenta'=> '3000000', 
            'valorAlquiler'=> '10000', 
            'superficie'=> '75', 
            'direccion'=> 'Juan D. Perón al 1400', 
            'piso'=> '4', 
            'numDepto'   => '2',          
            'fechaHabilitacion'=> '2018-01-01', 
            'linkVideo'=> 'https://www.youtube.com/watch?v=TgeX-AF7_DE', 
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cantidadAmbientes'=> '5', 
            'cantidadBaños'=> '2', 
            'cantidadGarages'=> '1', 
            'cantidadDormitorios'=> '3', 
            'disponible'     => false,        
            'descripcion'   => 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.',      
            'edificio_id'  => '4',       
            'tipo_id'     => '1',   
            'propietario_id'  => '8',      
            'barrio_id'       => '14', 
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('inmuebles')->insert([
            'condicion' => 'alquiler',          
            'valorReal'=> '2750000', 
            'valorVenta'=> '3300000', 
            'valorAlquiler'=> '9500', 
            'superficie'=> '70', 
            'direccion'=> 'Av. Ávalos y Entre Rios', 
            'piso'=> '2', 
            'numDepto'   => '4',          
            'fechaHabilitacion'=> '2018-01-01',  
            'linkVideo'=> 'https://www.youtube.com/watch?v=TgeX-AF7_DE', 
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cantidadAmbientes'=> '4', 
            'cantidadBaños'=> '2', 
            'cantidadGarages'=> '1', 
            'cantidadDormitorios'=> '2', 
            'disponible'     => false,        
            'descripcion'   => 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.',      
            'edificio_id'  => '3',       
            'tipo_id'     => '1',   
            'propietario_id'  => '9',      
            'barrio_id'       => '14', 
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('inmuebles')->insert([
            'condicion' => 'alquiler',          
            'valorReal'=> '3100000', 
            'valorVenta'=> '3750000', 
            'valorAlquiler'=> '9500', 
            'superficie'=> '75', 
            'direccion'=> 'Av. Ávalos y Entre Rios', 
            'piso'=> '5', 
            'numDepto'   => '5',          
            'fechaHabilitacion'=> '2018-01-01',  
            'linkVideo'=> 'https://www.youtube.com/watch?v=TgeX-AF7_DE', 
            'longitud' => '-27.4605598',
            'latitud' => '-58.9838905',
            'cantidadAmbientes'=> '5', 
            'cantidadBaños'=> '2', 
            'cantidadGarages'=> '1', 
            'cantidadDormitorios'=> '2', 
            'disponible'     => false,        
            'descripcion'   => 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.',      
            'edificio_id'  => '3',       
            'tipo_id'     => '1',   
            'propietario_id'  => '10',      
            'barrio_id'       => '14', 
            'localidad_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);




        










    }
}
