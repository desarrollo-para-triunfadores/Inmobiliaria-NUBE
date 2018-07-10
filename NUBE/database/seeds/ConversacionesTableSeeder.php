<?php

use Illuminate\Database\Seeder;

class ConversacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /**
         * Creamos la conversación
         */
        DB::table('conversaciones')->insert([
            'created_at' => date('Y-m-d H:m:s')
        ]);


        /**
         * Indicamos los actores de esa conversación
         */

        DB::table('users_conversaciones')->insert([
            'user_id' => '1',
            'conversacion_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('users_conversaciones')->insert([
            'user_id' => '42',
            'conversacion_id' => '1',
            'created_at' => date('Y-m-d H:m:s')
        ]);


        /**
         * Creamos algunos mensajes de prueba
         */

        DB::table('mensajes')->insert([
            'conversacion_id' => '1',
            'mensaje' => '¡Wep!',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('mensajes')->insert([
            'conversacion_id' => '1',
            'mensaje' => '¿Qué onda?',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('mensajes')->insert([
            'conversacion_id' => '1',
            'mensaje' => 'Acá probando la mensajería del sistema',
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('mensajes')->insert([
            'conversacion_id' => '1',
            'mensaje' => '¡Qué grande esta tarjeta!',
            'created_at' => date('Y-m-d H:m:s')
        ]);


        /**
         * Definimos los estados para esos mensajes. Por cada mensaje de la conversación
         * se definen los estados de este para cada usuario participante de la misma
         */

        /** Mensaje 1 */
        DB::table('estado_users_mensajes')->insert([
            'mensaje_id' => '1',
            'user_id' => '1',
            'enviado' => true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('estado_users_mensajes')->insert([
            'mensaje_id' => '1',
            'user_id' => '42',
            'leido' => true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        /** Mensaje 2 */
        DB::table('estado_users_mensajes')->insert([
            'mensaje_id' => '2',
            'user_id' => '42',
            'enviado' => true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('estado_users_mensajes')->insert([
            'mensaje_id' => '2',
            'user_id' => '1',
            'leido' => true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        /** Mensaje 3 */
        DB::table('estado_users_mensajes')->insert([
            'mensaje_id' => '3',
            'user_id' => '1',
            'enviado' => true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('estado_users_mensajes')->insert([
            'mensaje_id' => '3',
            'user_id' => '42',
            'leido' => true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        /** Mensaje 4 */
        DB::table('estado_users_mensajes')->insert([
            'mensaje_id' => '4',
            'user_id' => '42',
            'enviado' => true,
            'created_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('estado_users_mensajes')->insert([
            'mensaje_id' => '4',
            'user_id' => '1',
            'leido' => false,
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
