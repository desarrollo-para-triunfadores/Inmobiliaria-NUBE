<?php

use Illuminate\Database\Seeder;

class OportunidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('oportunidades')->insert([
            'nombre_interesado'=> 'Juancho Tacorta',  
            'telefono'=> '(362) 442 - 6005', 
            'mensaje'=> 'Buenas, estoy interezado en el departamento 5 del inmueble de Entre Ríos 142', 
            'email'  => 'juribe@idiomas.udea.edu.co',                                
            'estado_id'   => '1',  
            'inmueble_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('oportunidades')->insert([
            'nombre_interesado'=> 'Martín Zapiola',  
            'telefono'=> '(362) 443 - 2168', 
            'mensaje'=> 'Buenas, estoy interezado en el departamento número 5 del inmueble de Av. Ávalos y Entre Rios',     
            'email'  => 'vivian_981@yahoo.com',                                
            'estado_id'   => '1',  
            'inmueble_id'=> '2',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('oportunidades')->insert([
            'nombre_interesado'=> 'Carlos Vergara',  
            'telefono'=> '(362) 447 - 4779', 
            'mensaje'=> 'Buenas, estoy interezado en el departamento número 10 del inmueble de Av. Ávalos y Entre Rios', 
            'email'  => 'domini26@latinmail.com',                                
            'estado_id'   => '1',  
            'inmueble_id'=> '3',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('oportunidades')->insert([
            'nombre_interesado'=> 'Diego Manzo',  
            'telefono'=> '(362) 442 - 8475', 
            'mensaje'=> 'Buenas, estoy interezado en el departamento número 2 del inmueble de Juan D. Perón al 1400. El departamento del cuato piso.', 
            'email'  => 'julianaparis@hotmail.com',                                
            'estado_id'   => '1',  
            'inmueble_id'=> '4',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('oportunidades')->insert([
            'nombre_interesado'=> 'Carlos Zapiola',  
            'telefono'=> '(362) 444 - 6512', 
            'mensaje'=> 'Buenas, estoy interezado en el departamento 7 del edificio de Juan D. Perón al 1400', 
            'email'  => 'yessy_39@hotmail.com',                                
            'estado_id'   => '1',  
            'inmueble_id'=> '5',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('oportunidades')->insert([
            'nombre_interesado'=> 'Gustavo Sandoval',  
            'telefono'=> '(362) 443 - 8482', 
            'mensaje'=> 'Buenas, estoy interezado en el departamento número 4 del inmueble de Av. Ávalos y Entre Rios',       
            'email'  => 'ashida_barak@yahoo.com',                                
            'estado_id'   => '1',  
            'inmueble_id'=> '6',
            'created_at' => date('Y-m-d H:m:s')
        ]);
       
        DB::table('oportunidades')->insert([
            'nombre_interesado'=> 'Quico Valenzuela',  
            'telefono'=> '(362) 442 - 8797', 
            'mensaje'=> 'Buenas, estoy interezado en el departamento 9 de inmueble de Av. Las Heras 2055', 
            'email'  => 'hacho_k@gmail.com',                                
            'estado_id'   => '1',  
            'inmueble_id'=> '7',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('oportunidades')->insert([
            'nombre_interesado'=> 'Juan Moreira',  
            'telefono'=> '(362) 443 - 8325', 
            'mensaje'=> 'Buenas, estoy interezado en el departamento 9 del inmueble de Entre Ríos 142', 
            'email'  => 'menadel@hotmail.com',                                
            'estado_id'   => '1',  
            'inmueble_id'=> '8',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('oportunidades')->insert([
            'nombre_interesado'=> 'Florencia Kozlowski',  
            'telefono'=> '(362) 443 - 0300', 
            'mensaje'=> 'Buenas, estoy interezado en el departamento 7 del inmueble de Av. Las Heras 2055', 
            'email'  => 'acampadaalcoy@gmail.com',                                
            'estado_id'   => '1',  
            'inmueble_id'=> '9',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('oportunidades')->insert([
            'nombre_interesado'=> 'Ivana Caravajal',  
            'telefono'=> '(362) 443 - 8325', 
            'mensaje'=> 'Buenas, estoy interezado en el departamento 7 del inmueble de Av. Las Heras 2055',   
            'email'  => 'reinald_34@hotmail.com',                                
            'estado_id'   => '1',  
            'inmueble_id'=> '9',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('oportunidades')->insert([
            'nombre_interesado'=> 'Lidia Sosa',  
            'telefono'=> '(362) 443 - 5004', 
            'mensaje'=> 'Buenas, estoy interezado en el departamento 5 del inmueble de Entre Ríos 142',    
            'email'  => 'm.fdez_87@hotmail.com',                                
            'estado_id'   => '1',  
            'inmueble_id'=> '10',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('oportunidades')->insert([
            'nombre_interesado'=> 'Nicolás Carpo',  
            'telefono'=> '(362) 444 - 7177', 
            'mensaje'=> 'Buenas, estoy interezado en el departamento 9 de inmueble de Av. Las Heras 2055',
            'email'  => 'kristian_siempre_azul@hotmail.com',                                
            'estado_id'   => '1',  
            'inmueble_id'=> '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        


    }
}
