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

        //Creación del rol de usuario

        $role = Role::create(['name' => 'Administrador']);

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

        //Asignación de permisos a los roles

        $role->givePermissionTo('acceso a usuarios');

        $role->givePermissionTo('acceso a roles');

        $role->givePermissionTo('acceso a servicios');

        $role->givePermissionTo('acceso a paises');

        $role->givePermissionTo('acceso a provincias');

        $role->givePermissionTo('acceso a localidades');

        $role->givePermissionTo('acceso a barrios');

        $role->givePermissionTo('acceso a caracteristicas');

        $role->givePermissionTo('acceso a tipos de caracteristicas');

        $role->givePermissionTo('acceso a inmuebles');

        $role->givePermissionTo('acceso a edificios');

        $role->givePermissionTo('acceso a proyectos');

        $role->givePermissionTo('acceso a propiearios');

        $role->givePermissionTo('acceso a inquilinos');

        $role->givePermissionTo('acceso a garantes');

        $role->givePermissionTo('acceso a oportunidades');

        $role->givePermissionTo('acceso a agenda');

        $role->givePermissionTo('acceso a contratos');

        $role->givePermissionTo('acceso a impuestos');

        $role->givePermissionTo('alta de impuestos');

        $role->givePermissionTo('alta de liquidaciones');

        $role->givePermissionTo('cobro de liquidaciones');

        //Asignación de roles a usuarios

        $user_1->assignRole('Administrador');

        $user_2->assignRole('Administrador');

        $user_3->assignRole('Administrador');
    }
}

