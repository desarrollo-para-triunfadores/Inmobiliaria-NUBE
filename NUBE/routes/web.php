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

    //Rutas para métodos genéricos
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
    Route::resource('pagos', 'PagosController');
    Route::resource('contabilidad', 'EstadisticasController');
    Route::resource('notificaciones', 'NotificacionesController');
    Route::resource('mensajes', 'MensajesController');
    Route::resource('oportunidades', 'OportunidadesController');
    Route::resource('solicitudes_servicio', 'SolicitudesServicioController');
    Route::resource('agenda', 'VisitasController');
    Route::resource('tecnicos', 'TecnicosController');

    //Route::get('/verBoleta', 'EstadisticasController@verBoleta')->name('verBoleta');
    
    /*
    Route::get('contabilidad/verBoleta', function()
    {       
        return View::make('contabilidad.verBoleta'); 
    });
    */
    
  //  Route::resource('mail_oportunidad', 'Mail_contacto_OportunidadesController');

   //Route::resource('oportunidades', 'OportunidadesController');
   //Route::resource('mail_oportunidad', 'Mail_contacto_OportunidadesController');
   //Route::post('cargar_archivo_correo', 'Mail_contacto_OportunidadesController@store'); //se llama por ajax (post)
   //Route::post('enviar_correo', 'Mail_contacto_OportunidadesController@enviar');
   //Route::get('form_enviar_correo', 'Mail_contacto_OportunidadesController@crear');


   

    /**
     * Rutas de métodos específicos 
     */

    //Agenda
    Route::get('cargaEventos{id?}', 'CalendarController@index');

    //Barrios
    Route::get('/obtener_inmuebles_barrios', 'BarriosController@obtener_inmuebles')->name('obtener_inmuebles_barrios');
    Route::get('/obtener_edificios_barrios', 'BarriosController@obtener_edificios')->name('obtener_edificios_barrios');

    //Conceptos de liquidaciones    
    Route::get('/obtener_conceptos', 'ConceptosLiquidacionesController@obtener_conceptos')->name('obtener_conceptos');
    Route::get('/registrar_conceptos', 'ConceptosLiquidacionesController@registrar_conceptos')->name('registrar_conceptos');

    //Contabilidad
    Route::name('contabilidad.verBoleta')->get('contabilidad/verBoleta/{id}', 'EstadisticasController@verBoleta');

    //Edificios
    Route::get('/obtener_inmuebles_edificio', 'EdificiosController@obtener_inmuebles')->name('obtener_inmuebles_edificio');

    //Localidades
    Route::get('/obtener_inmuebles_localidad', 'LocalidadesController@obtener_inmuebles')->name('obtener_inmuebles_localidad');
    Route::get('/obtener_edificios_localidad', 'LocalidadesController@obtener_edificios')->name('obtener_edificios_localidad');
    Route::get('/obtener_barrios_localidad', 'LocalidadesController@obtener_barrios')->name('obtener_barrios_localidad');

    //Mensajes   
    Route::get('/obtener_mensajes_conversacion', 'MensajesController@obtener_mensajes_conversacion')->name('obtener_mensajes_conversacion');
    Route::get('/enviar_mensaje', 'MensajesController@enviar_mensaje')->name('enviar_mensaje');
    Route::get('/borrar_conversacion', 'MensajesController@borrar_conversacion')->name('borrar_conversacion');
    Route::get('/cambiar_bandera_escritura', 'MensajesController@cambiar_bandera_escritura')->name('cambiar_bandera_escritura');
    Route::get('/obtener_cabecera', 'MensajesController@obtener_cabecera')->name('obtener_cabecera');
    Route::get('/obtener_listado_conversaciones', 'MensajesController@obtener_listado_conversaciones')->name('obtener_listado_conversaciones');

    //Notificaciones
    Route::get('/ocultar_notificaciones', 'NotificacionesController@ocultar_notificaciones')->name('ocultar_notificaciones');
   
    //Panel de configuración
    Route::get('/configuracion', function () {// esta ruta es solo para zafar, pero hay que hacer un controller con la info de la empresa
        return view('admin.configuracion.main');
    });

    //Técnicos
    Route::name('tecnicos.tecnicosxrubro')->get('tecnicos/tecnicosxrubro/', 'TecnicosController@tecnicosxrubro');

    //Visitas
    Route::get('/actualizar_visita', 'VisitasController@actualizar')->name('actualizar_visita');
    Route::get('cargaEventos{id?}', 'CalendarController@index');
    Route::get('/actualizar_visita', 'VisitasController@actualizar')->name('actualizar_visita');
    Route::get('/eliminar_visita', 'VisitasController@eliminar')->name('eliminar_visita');
    Route::get('/datos_visita', 'VisitasController@eliminar')->name('datos_visita');


});
Auth::routes();
