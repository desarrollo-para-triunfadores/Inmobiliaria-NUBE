<?php

use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Inicio Personas que sirven para inquilinos (1-10)

        DB::table('personas')->insert([
            'nombre' => 'Norma G',
            'apellido' => 'Alvarez Rodriguez',
            'sexo' => 'Femenino',
            'dni' => '42146964',
            'fecha_nac' => '1957-10-15',
            'telefono' => '(362) 443 - 8084',
            'telefono_contacto' => '(362) 443 - 0300',
            'email'   => 'juribe@idiomas.udea.edu.co',                      
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Gabriela',
            'apellido' => 'De La Cruz Rodriguez',
            'sexo' => 'Femenino',
            'dni' => '40673760',
            'fecha_nac' => '1967-02-22',
            'telefono' => '(362) 442 - 6145',
            'telefono_contacto' => '(362) 442 - 6005',
            'email'   => 'hersy@epm.net.co',                      
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Analia L',
            'apellido' => 'Eginini Rodriguez',
            'sexo' => 'Femenino',
            'dni' => '42532753',
            'fecha_nac' => '1988-11-22',
            'telefono' => '(362) 447 - 6394',
            'telefono_contacto' => '(362) 443 - 2168',
            'email'   => 'urestrepo @idiomas.udea.edu.co',                      
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Isaac E',
            'apellido' => 'Martinez Rodriguez',
            'sexo' => 'Masculino',
            'dni' => '43278119',
            'fecha_nac' => '1968-05-12',
            'telefono' => '(362) 445 - 1406',
            'telefono_contacto' => '(362) 447 - 4779',
            'email'   => ' vivian_981@yahoo.com',                      
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Carmen E',
            'apellido' => 'Gonzales',
            'sexo' => 'Femenino',
            'dni' => '71241786',
            'fecha_nac' => '1978-12-11',
            'telefono' => '(362) 446 - 0306',
            'telefono_contacto' => '(362) 442 - 8475',
            'email'   => 'julianaparis@hotmail.com',                      
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Roque G',
            'apellido' => 'Gonzales',
            'sexo' => 'Masculino',
            'dni' => '45743257',
            'fecha_nac' => '1990-12-31',
            'telefono' => '(362) 443 - 2363',
            'telefono_contacto' => '(362) 444 - 6512',
            'email'   => 'domini26@latinmail.com',                      
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('personas')->insert([
            'nombre' => 'Alberto A',
            'apellido' => 'Espinoza',
            'sexo' => 'Masculino',
            'dni' => '46202533',
            'fecha_nac' => '1987-11-13',
            'telefono' => '(362) 446 - 2756',
            'telefono_contacto' => '(362) 443 - 8482',
            'email'   => ' julianaparis@hotmail.com',                      
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Carlos R',
            'apellido' => 'Espinoza',
            'sexo' => 'Masculino',
            'dni' => '42264899',
            'fecha_nac' => '1955-09-10',
            'telefono' => '(362) 443 - 5921',
            'telefono_contacto' => '(362) 443 - 8482',
            'email'   => ' yessy_39@hotmail.com',                      
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Graciela L',
            'apellido' => 'Espinoza',
            'sexo' => 'Femenino',
            'dni' => '32476447',
            'fecha_nac' => '1971-01-02',
            'telefono' => '(362) 444 - 9305',
            'telefono_contacto' => '(362) 442 - 8797',
            'email'   => 'ashida_barak@yahoo.com',                      
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Juan A D J',
            'apellido' => 'Espinoza',
            'sexo' => 'Masculino',
            'dni' => '23230565',
            'fecha_nac' => '1956-03-13',
            'telefono' => '(362) 446 - 1367',
            'telefono_contacto' => '(362) 442 - 4022',
            'email'   => 'menadel@hotmail.com',                      
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

//Fin Personas que sirven para inquilinos (1-10)

//Inicio Personas que sirven para garantes (11-20)

        DB::table('personas')->insert([
            'nombre' => 'Hector R',
            'apellido' => 'Espinoza',
            'sexo' => 'Masculino',
            'dni' => '78682726',
            'fecha_nac' => '1989-10-10',
            'telefono' => '(362) 446 - 3838',
            'telefono_contacto' => '(362) 443 - 8325',
            'email'   => 'm.fdez_87@hotmail.com',    
            'direccion' => 'Juan Domingo Perón 396',                  
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Aguistina',
            'apellido' => 'Galarza',
            'sexo' => 'Femenino',
            'dni' => '12270734',
            'fecha_nac' => '1981-04-05',
            'telefono' => '(362) 446 - 1311',
            'telefono_contacto' => '(362) 443 - 8325',
            'email'   => 'reinald_34@hotmail.com',       
            'direccion' => 'Donovan 174',               
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Albertina G De',
            'apellido' => 'Galarza',
            'sexo' => 'Femenino',
            'dni' => '12682277',
            'fecha_nac' => '1963-04-10',
            'telefono' => '(362) 443 - 5004',
            'telefono_contacto' => '(362) 446 - 1311',
            'email'   => 'ibrahin@cied.rimed.cu',    
            'direccion' => 'Juan Domingo Perón 455',                  
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Carlos A',
            'apellido' => 'Galarza',
            'sexo' => 'Masculino',
            'dni' => '16351202',
            'fecha_nac' => '1989-08-08',
            'telefono' => '(362) 444 - 7177',
            'telefono_contacto' => '(362) 443 - 5004',
            'email'   => 'acampadaalcoy@gmail.com',    
            'direccion' => 'Salta 446',                  
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Carolina E',
            'apellido' => 'Galarza',
            'sexo' => 'Femenino',
            'dni' => '13115783',
            'fecha_nac' => '1981-09-02',
            'telefono' => '(362) 446 - 3069',
            'telefono_contacto' => '(362) 444 - 7177',
            'email'   => 'acampada.algeciras@gmail.com',   
            'direccion' => 'Av. Belgrano 410',                   
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Julio N',
            'apellido' => 'Fernandez Nuñez',
            'sexo' => 'Masculino',
            'dni' => '27390202',
            'fecha_nac' => '1955-07-16',
            'telefono' => '(362) 446 - 3069',
            'telefono_contacto' => '(362) 446 - 7445',
            'email'   => 'difusio.acampadabdn@gmail.com',    
            'direccion' => 'Av. Manuel Belgrano 511',                  
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Magdalena N De',
            'apellido' => 'Gomez Nuñez',
            'sexo' => 'Femenino',
            'dni' => '12075202',
            'fecha_nac' => '1965-07-09',
            'telefono' => '(362) 447 - 9854',
            'telefono_contacto' => '(362) 442 - 3393',
            'email'   => 'dryburgos@gmail.com',        
            'direccion' => 'Jujuy 715',              
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Narvajas',
            'apellido' => 'Gomez Nunez',
            'sexo' => 'Masculino',
            'dni' => '59427123',
            'fecha_nac' => '1971-02-06',
            'telefono' => '(362) 442 - 3177',
            'telefono_contacto' => '(362) 442 - 4040',
            'email'   => 'castello15m@gmail.com',      
            'direccion' => 'Moreno 940',                
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Emilio Alberto',
            'apellido' => 'Rached',
            'sexo' => 'Masculino',
            'dni' => '27789946',
            'fecha_nac' => '1925-06-23',
            'telefono' => '(362) 443 - 8052',
            'telefono_contacto' => '(362) 443 - 2640',
            'email'   => 'iabarcae@yahoo.es',      
            'direccion' => 'Santiago del Estero, 3500',                
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Natalia Gabriela ',
            'apellido' => 'Neme',
            'sexo' => 'Femenino',
            'dni' => '30231555',
            'fecha_nac' => '1956-12-03',
            'telefono' => '(362) 443 - 2640',
            'telefono_contacto' => '(362) 446 - 7319',
            'email'   => 'alexus3@hotmail.com',      
            'direccion' => 'Av. 25 de Mayo 980',                
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

//Fin Personas que sirven para garantes (11-20)

//Inicio Personas que sirven para propietarios únicamente (21-30)

        DB::table('personas')->insert([
            'nombre' => ' Marcelo Ramon de la Santisima Trinidad',
            'apellido' => 'Lugones',
            'sexo' => 'Masculino',
            'dni' => '18758730',
            'fecha_nac' => '1991-11-22',
            'telefono' => '(362) 446 - 7319',
            'telefono_contacto' => '(362) 448 - 8882',
            'email'   => 'luuuuuuci@hotmail.com', 
            'direccion' => 'S B D Mte Alto 55',                     
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Teresita Candida',
            'apellido' => 'Hazurun',
            'sexo' => 'Femenino',
            'dni' => '17333490',
            'fecha_nac' => '1968-06-13',
            'telefono' => '(362) 444 - 6866',
            'telefono_contacto' => '(362) 448 - 8882',
            'email'   => 'kristian_siempre_azul@hotmail.com',   
            'direccion' => 'Calle Corrientes 905',                   
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Paola Anabel',
            'apellido' => 'Griggio',
            'sexo' => 'Femenino',
            'dni' => '34662263',
            'fecha_nac' => '1989-11-11',
            'telefono' => '(362) 442 - 7958',
            'telefono_contacto' => '(362) 447 - 3172',
            'email'   => 'mapuchin@hotmail.com',      
            'direccion' => 'Marcelo T. de Alvear 1097',                
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Guillermo Antonio',
            'apellido' => 'Novara',
            'sexo' => 'Masculino',
            'dni' => '38082134',
            'fecha_nac' => '1992-01-02',
            'telefono' => '(362) 446 - 6439',
            'telefono_contacto' => '(362) 447 - 3172',
            'email'   => 'arahuetes@manquehue.net',          
            'direccion' => 'Marcelo T. de Alvear 1301',            
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Ricardo Luis',
            'apellido' => 'Corbalan',
            'sexo' => 'Masculino',
            'dni' => '30226561',
            'fecha_nac' => '1985-12-16',
            'telefono' => '(362) 476 - 4523',
            'telefono_contacto' => '(362) 443 - 5252',
            'email'   => 'eduardo.arancibia@grange.cl',     
            'direccion' => 'San Fernando 335',                 
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Elba Cristina',
            'apellido' => 'Alvarez',
            'sexo' => 'Femenino',
            'dni' => '13934021',
            'fecha_nac' => '1987-05-06',
            'telefono' => '(362) 441 - 7610',
            'telefono_contacto' => '(362) 446 - 6439',
            'email'   => 'leonor.araya@gmail.com',      
            'direccion' => 'Av. Rivadavia 1130',                
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Ramón',
            'apellido' => 'Goitea',
            'sexo' => 'Masculino',
            'dni' => '23423358',
            'fecha_nac' => '1976-09-11',
            'telefono' => '(362) 444 - 0105',
            'telefono_contacto' => '(362) 441 - 7610',
            'email'   => 'paulifran@hotmail.com',  
            'direccion' => 'La Rioja 1199',                    
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Guillermo Elias Ruben',
            'apellido' => 'Ganón',
            'sexo' => 'Masculino',
            'dni' => '20596506',
            'fecha_nac' => '1980-02-06',
            'telefono' => '(362) 443 - 4581',
            'telefono_contacto' => '(362) 444 - 0105',
            'email'   => 'bad.girl.-@hotmail.es',      
            'direccion' => 'Fotheringam 45',                
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Omar D',
            'apellido' => 'Avalos Fernandez',
            'sexo' => 'Masculino',
            'dni' => '26387675',
            'fecha_nac' => '1956-02-03',
            'telefono' => '(362) 441 - 7610',
            'telefono_contacto' => '(362) 476 - 4523',
            'email'   => 'aargomedo@hecsa.cl',      
            'direccion' => 'Jujuy 1870',                
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('personas')->insert([
            'nombre' => 'Rodrigo',
            'apellido' => 'Alvarez Fernandez',
            'sexo' => 'Masculino',
            'dni' => '24771656',
            'fecha_nac' => '1985-01-14',
            'telefono' => '(362) 445 - 1462',
            'telefono_contacto' => '(362) 476 - 4523',
            'email'   => 'joy_pao_@hotmail.com',  
            'direccion' => 'Mendoza 2662',                    
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);
        
        DB::table('personas')->insert([
            'nombre' => 'Gabriel N',
            'apellido' => 'Banquero Fernandez',
            'sexo' => 'Masculino',
            'dni' => '27872450',
            'fecha_nac' => '1975-08-10',
            'telefono' => '(362) 442 - 1576',
            'telefono_contacto' => '(362) 497 - 2426',
            'email'   => 'Sergio.Aspe@adretail.cl',    
            'direccion' => 'García Merou 2901',                  
            'foto_perfil' => 'sin imagen',
            'localidad_id' => '1',
            'pais_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);


    }
}
