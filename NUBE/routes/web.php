<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::auth();

/** Web-Side * */
Route::resource('/', 'frontHomeController');
Route::resource('/inmueble', 'RolesController');
Route::resource('enviar_consulta', 'OportunidadesFrontController'); //Enviar email interesado ? a sistema (se crea Oportunidad en backend)
Route::resource('/detalle', 'frontDetalleController');
Route::resource('/nosotros', 'frontNosotrosController');
Route::resource('/listapropiedades', 'frontListadoController');
Route::resource('/contacto', 'ContactoFrontController');
Route::resource('/mail', 'MailFrontController');
//Route::resource('/contacto/store', 'ContactoFrontController');

Auth::routes();

Route::get('/home', 'HomeController@index');

/** ADMIN-Side* */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('usuarios', 'UsersController');
    Route::resource('roles', 'RolesController');
    Route::resource('paises', 'PaisesController');
    Route::resource('provincias', 'ProvinciasController');
    Route::resource('localidades', 'LocalidadesController');
    Route::resource('barrios', 'BarriosController');
    Route::resource('tipos_caracteristicas', 'TiposController');
    Route::resource('caracteristicas', 'CaracteristicasController');
    Route::resource('inmuebles', 'InmueblesController');
    Route::resource('proyectos', 'ProyectosController');

    Route::resource('edificios', 'EdificiosController');
    Route::resource('servicios', 'ServiciosController');
    Route::resource('propietarios', 'PropietariosController');
    Route::resource('garantes', 'GarantesController');
    Route::resource('inquilinos', 'InquilinosController');
    Route::resource('contratos', 'ContratosController');    
    Route::resource('liquidaciones', 'LiquidacionMensualController');
    Route::resource('conceptosliquidaciones', 'ConceptosLiquidacionesController');

    Route::resource('movimientos', 'MovimientosController');
    Route::resource('cobros', 'CobrosController');
    Route::resource('contabilidad', 'EstadisticasController');

    //Oportunidades

    Route::resource('oportunidades', 'OportunidadesController');
  //  Route::resource('mail_oportunidad', 'Mail_contacto_OportunidadesController');

   //Route::resource('oportunidades', 'OportunidadesController');
   //Route::resource('mail_oportunidad', 'Mail_contacto_OportunidadesController');
  //Route::post('cargar_archivo_correo', 'Mail_contacto_OportunidadesController@store'); //se llama por ajax (post)
  //Route::post('enviar_correo', 'Mail_contacto_OportunidadesController@enviar');
    //Route::get('form_enviar_correo', 'Mail_contacto_OportunidadesController@crear');

    Route::resource('agenda', 'VisitasController');
    Route::get('cargaEventos{id?}', 'CalendarController@index');


    Route::get('/actualizar_visita', 'VisitasController@actualizar')->name('actualizar_visita');
    Route::get('/eliminar_visita', 'VisitasController@eliminar')->name('eliminar_visita');
    Route::get('/datos_visita', 'VisitasController@eliminar')->name('datos_visita');
    Route::get('/configuracion', function () {
  // esta ruta es solo para zafar, pero hay que hacer un controller con la info de la empresa
        return view('admin.configuracion.main');
    });
});
Auth::routes();
