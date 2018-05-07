<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersRolesPermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creacion de usuarios
        /**
         * Usuarios sin personas registradas
         */
        $user_1 = User::create([
            'name' => 'Hacho Kuszniruk',
            'email' => 'hacho_k@outlook.com',
            'password' => bcrypt('123123'),
            'imagen' => 'usuario_1499775381.jpg'
        ]);

        $user_2 = User::create([
            'name' => 'Juan Pablo Cáceres',
            'email' => 'jpcaceres.nea@gmail.com',
            'password' => bcrypt('123123'),
            'imagen' => 'usuario_1499215225.jpg'
        ]);

        $user_3 = User::create([
            'name' => 'Juan Rubio',
            'email' => 'juanrubio_96@hotmail.com',
            'password' => bcrypt('123123'),
            'imagen' => 'usuario_1499775474.jpg'
        ]);

        $user_4 = User::create([
            'name' => 'Andrea Ríos López',
            'email' => 'rioslopezandrea@gmail.com',
            'password' => bcrypt('123123'),
            'imagen' => 'andrea_rioslopez.png'
        ]);

        $user_5 = User::create([
            'name' => 'Mirta Larsson',
            'email' => 'm.larsson@hotmail.com',
            'password' => bcrypt('123123'),
            'imagen' => 'mirta_larsson.png'
        ]);

        
        /**
         * Usuarios con personas registradas
         */

        $user_6 = User::create([
            'name' => 'Norma G',
            'email' => 'juribe@idiomas.udea.edu.co',
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_7 = User::create([
            'name' => 'Andrea',
            'email' => 'hersy@epm.net.co',
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_8 = User::create([
            'name' => 'Analia L',
            'email' => 'urestrepo@idiomas.udea.edu.co',
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_9 = User::create([
            'name' => 'Isaac E',
            'email' => 'vivian_981@yahoo.com',
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_10 = User::create([
            'name' => 'Carmen E',
            'email' => 'julianaparis2@hotmail.com',        
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_11 = User::create([
            'name' => 'Roque G',
            'email' => 'domini26@latinmail.com',
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_12 = User::create([
            'name' => 'Alberto A',
            'email' => 'julianaparis@hotmail.com',
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_13 = User::create([
            'name' => 'Carlos R',
            'email' => ' yessy_39@hotmail.com', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_14 = User::create([
            'name' => 'Graciela L',
            'email' => 'ashida_barak@yahoo.com', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_15 = User::create([
            'name' => 'Jose',
            'email' => 'menadel@hotmail.com', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);
       
        $user_16 = User::create([
            'name' => 'Hector Ruben',
            'email' => 'm.fdez_87@hotmail.com',    
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_17 = User::create([
            'name' =>'Martha',
            'email' => 'reinald_34@hotmail.com',
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_18 = User::create([
            'name' => 'Albertina G De',
            'email' => 'ibrahin@cied.rimed.cu',  
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_19 = User::create([
            'name' => 'Carlos',
            'email' => 'acampadaalcoy@gmail.com',
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_20 = User::create([
            'name' => 'Carolina E',
            'email' => 'acampada.algeciras@gmail.com',
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_21 = User::create([
            'name' => 'Julio N',
            'email' => 'difusio.acampadabdn@gmail.com', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_22 = User::create([
            'name' => 'Magdalena N De',
            'email' => 'dryburgos@gmail.com',    
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_23 = User::create([
            'name' => 'Narvajas',
            'email' => 'castello15m@gmail.com', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_24 = User::create([
            'name' => 'Emilio Alberto',
            'email' => 'iabarcae@yahoo.es',    
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_25 = User::create([
            'name' => 'Natalia Gabriela ',
            'email' => 'alexus3@hotmail.com',      
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_26 = User::create([
            'name' => 'Marcelo Ramon de la Santisima Trinidad',
            'email' => 'luuuuuuci@hotmail.com', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_27 = User::create([
            'name' => 'Juan',
            'email' => 'kristian_siempre_azul@hotmail.com', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_28 = User::create([
            'name' => 'Paola Anabel',
            'email' => 'mapuchin@hotmail.com',
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_29 = User::create([
            'name' => 'Guillermo Antonio',
            'email' => 'arahuetes@manquehue.net', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_30 = User::create([
            'name' => 'Ricardo Luis',
            'email' => 'eduardo.arancibia@grange.cl',   
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_31 = User::create([
            'name' => 'Elba Cristina',
            'email' => 'leonor.araya@gmail.com', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_32 = User::create([
            'name' =>'Ramón',
            'email' => 'paulifran@hotmail.com', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);
        
        $user_33 = User::create([
            'name' => 'Guillermo Elias Ruben',
            'email' => 'bad.girl.-@hotmail.es', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_34 = User::create([
            'name' => 'Omar D',
            'email' => 'aargomedo@hecsa.cl', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_35 = User::create([
            'name' => 'Rodrigo',
            'email' => 'joy_pao_@hotmail.com',  
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_36 = User::create([
            'name' => 'Gabriel N',
            'email' => 'Sergio.Aspe@adretail.cl', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_37 = User::create([
            'name' => 'Marcelo',
            'email' => 'marcemarin@gmail.com', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_38 = User::create([
            'name' => 'Alejandro',
            'email' => 'ale.rodriguez@gmail.com', 
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_39 = User::create([
            'name' => 'Damian',
            'email' => 'damian.freidenberger@gmail.com',  
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_40 = User::create([
            'name' => 'Alejandro',
            'email' => 'ale.alba@gmail.com',  
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_41 = User::create([
            'name' => 'Sergio',
            'email' =>  'sergio.sanab@gmail.com',    
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

        $user_42 = User::create([
            'name' =>  'Claudia',
            'email' => 'claudiana@gmail.com',    
            'password' => bcrypt('123123'),
            'imagen' => 'sin_imagen.png'
        ]);

       

        $role_admin = Role::create(['name' => 'Administrador']);

        $role_cliente = Role::create(['name' => 'Cliente']);

        $role_personal = Role::create(['name' => 'Personal']);

        $role_personal = Role::create(['name' => 'Propietario']);

        $role_personal = Role::create(['name' => 'Inquilino']);

        //Creación de los permisos

        /**
         * Notación:
         * modulo : acceder al módulo.
         * modulo_a : dar de alta un elemento en el módulo.
         * modulo_b : dar de baja un elemento en el módulo.
         * modulo_m : modificar un elemento en el módulo.
         */

        Permission::create(['name' => 'acceso a usuarios']);

        Permission::create(['name' => 'acceso a roles']);

        Permission::create(['name' => 'acceso a servicios']);

        Permission::create(['name' => 'acceso a paises']);

        Permission::create(['name' => 'acceso a provincias']);

        Permission::create(['name' => 'acceso a localidades']);

        Permission::create(['name' => 'acceso a barrios']);

        Permission::create(['name' => 'acceso a caracteristicas']);

        Permission::create(['name' => 'acceso a tipos de caracteristicas']);

        Permission::create(['name' => 'acceso a inmuebles']);

        Permission::create(['name' => 'acceso a edificios']);

        Permission::create(['name' => 'acceso a proyectos']);

        Permission::create(['name' => 'acceso a propiearios']);

        Permission::create(['name' => 'acceso a inquilinos']);

        Permission::create(['name' => 'acceso a garantes']);

        Permission::create(['name' => 'acceso a oportunidades']);

        Permission::create(['name' => 'acceso a agenda']);

        Permission::create(['name' => 'acceso a contratos']);

        Permission::create(['name' => 'acceso a impuestos']);

        Permission::create(['name' => 'alta de impuestos']);

        Permission::create(['name' => 'alta de liquidaciones']);

        Permission::create(['name' => 'cobro de liquidaciones']);

        Permission::create(['name' => 'pagos de liquidaciones']);

        
        
        //Asignación de permisos al rol de administrador

        $role_admin->givePermissionTo('acceso a usuarios');

        $role_admin->givePermissionTo('acceso a roles');

        $role_admin->givePermissionTo('acceso a servicios');

        $role_admin->givePermissionTo('acceso a paises');

        $role_admin->givePermissionTo('acceso a provincias');

        $role_admin->givePermissionTo('acceso a localidades');

        $role_admin->givePermissionTo('acceso a barrios');

        $role_admin->givePermissionTo('acceso a caracteristicas');

        $role_admin->givePermissionTo('acceso a tipos de caracteristicas');

        $role_admin->givePermissionTo('acceso a inmuebles');

        $role_admin->givePermissionTo('acceso a edificios');

        $role_admin->givePermissionTo('acceso a proyectos');

        $role_admin->givePermissionTo('acceso a propiearios');

        $role_admin->givePermissionTo('acceso a inquilinos');

        $role_admin->givePermissionTo('acceso a garantes');

        $role_admin->givePermissionTo('acceso a oportunidades');

        $role_admin->givePermissionTo('acceso a agenda');

        $role_admin->givePermissionTo('acceso a contratos');

        $role_admin->givePermissionTo('acceso a impuestos');

        $role_admin->givePermissionTo('alta de impuestos');

        $role_admin->givePermissionTo('alta de liquidaciones');

        $role_admin->givePermissionTo('cobro de liquidaciones');

        $role_admin->givePermissionTo('pagos de liquidaciones');
  


        //Asignación de roles a usuarios administradores

        $user_1->assignRole('Administrador');

        $user_2->assignRole('Administrador');

        $user_3->assignRole('Administrador');

        $user_4->assignRole('Administrador');

        $user_5->assignRole('Propietario');


        //Asignación de permisos al rol de clientes

       /**
        * Es mejor si después desde el sistema se escojen los permisos para el rol. 
        * Acá solo vamos a asignar el rol a los usuarios por ahora.
        */

        //Asignación de roles a usuarios clientes

        $user_6->assignRole('Cliente');

        $user_7->assignRole('Cliente');
        
        $user_8->assignRole('Cliente');

        $user_9->assignRole('Cliente');

        $user_10->assignRole('Cliente');

        $user_11->assignRole('Cliente');

        $user_12->assignRole('Cliente');

        $user_13->assignRole('Cliente');

        $user_14->assignRole('Cliente');

        $user_15->assignRole('Cliente');

        $user_16->assignRole('Cliente');

        $user_17->assignRole('Cliente');

        $user_18->assignRole('Cliente');

        $user_19->assignRole('Cliente');

        $user_20->assignRole('Cliente');

        $user_21->assignRole('Cliente');

        $user_22->assignRole('Cliente');

        $user_23->assignRole('Cliente');

        $user_24->assignRole('Cliente');

        $user_25->assignRole('Cliente');

        $user_26->assignRole('Cliente');

        $user_27->assignRole('Cliente');

        $user_28->assignRole('Cliente');

        $user_29->assignRole('Cliente');

        $user_30->assignRole('Cliente');

        $user_31->assignRole('Cliente');

        $user_32->assignRole('Cliente');

        $user_33->assignRole('Cliente');

        $user_34->assignRole('Cliente');

        $user_35->assignRole('Cliente');

        $user_36->assignRole('Cliente');

        $user_37->assignRole('Cliente');

        $user_38->assignRole('Cliente');

        $user_39->assignRole('Cliente');

        $user_40->assignRole('Cliente');

        $user_41->assignRole('Cliente');

        $user_42->assignRole('Cliente');
        

    }
}
