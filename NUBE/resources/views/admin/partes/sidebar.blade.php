<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header" align="center">menú principal</li>
            <!-- Gestión de Usuarios -->
            @cannot('acceso a usuarios','acceso a roles')

            @else
                <li  id="side-usuarios-li"  class="treeview">
                    <a href="#">
                        <i class="fa fa-group" aria-hidden="true"></i>
                        <span>Gestión de usuarios</span>
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul id="side-usuarios-ul" class="treeview-menu">
                        @can('acceso a usuarios')
                            <li id="side-ele-usuarios"><a href="/admin/usuarios"><i class="fa fa-user-circle"></i> Usuarios</a></li>
                        @endcan
                        @can('acceso a roles')
                            <li id="side-ele-roles"><a data-toggle="tooltip" title="roles de los usuarios, util para restringir el acceso a determinadas funciones dentro del sistema" href="/admin/roles"><i class="fa fa-group"></i> Roles</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan


        <!-- Parametros Generales -->

            @cannot('acceso a paises','acceso a provincias', 'acceso a localidades','acceso a barrios', 'acceso a caracteristicas', 'acceso a tipos de caracteristicas')

            @else
                <li  id="side-general-li"  class="treeview">
                    <a href="#">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                        <span>Parámetros generales</span>
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul id="side-general-ul" class="treeview-menu">
                        @can('acceso a servicios')
                            <li id="side-ele-servicios"><a href="/admin/servicios"><i class="fa fa-check-square-o"></i> Servicios</a></li>
                        @endcan

                        @cannot('acceso a paises','acceso a provincias', 'acceso a localidades','acceso a barrios')

                        @else
                            <li id="side-ele-lugares-li">
                                <a href="#"><i class="fa fa-map-marker"></i> Lugares
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul id="side-ele-lugares-ul" class="treeview-menu">

                                    @can('acceso a paises')
                                        <li id="side-ele-lugares-paises"><a href="/admin/paises"><i class="fa fa-circle-o"></i> Paises</a></li>
                                    @endcan

                                    @can('acceso a provincias')
                                        <li id="side-ele-lugares-provincias"><a href="/admin/provincias"><i class="fa fa-circle-o"></i> Provincias</a></li>
                                    @endcan

                                    @can('acceso a localidades')
                                        <li id="side-ele-lugares-localidades"><a href="/admin/localidades"><i class="fa fa-circle-o"></i> Localidades</a></li>
                                    @endcan

                                    @can('acceso a barrios')
                                        <li id="side-ele-lugares-barrios"><a href="/admin/barrios"><i class="fa fa-circle-o"></i> Barrios</a></li>
                                    @endcan

                                </ul>
                            </li>
                        @endcan

                        @cannot('acceso a caracteristicas', 'acceso a tipos de caracteristicas')

                        @else
                            <li id="side-ele-caracteristicas-li">
                                <a href="#"><i class="fa fa-circle-o"></i>Características
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul id="side-ele-caracteristicas-ul" class="treeview-menu">

                                    @can('acceso a caracteristicas')
                                        <li id="side-ele-caracteristicas-tipos"><a href="/admin/tipos_caracteristicas"><i class="fa fa-circle-o"></i> Tipo de característica</a></li>
                                    @endcan

                                    @can('acceso a tipos de caracteristicas')
                                        <li id="side-ele-caracteristicas-caracteristicas"><a href="/admin/caracteristicas"><i class="fa fa-circle-o"></i> Características de inmuebles</a></li>
                                    @endcan

                                </ul>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan



        <!-- Inmuebles -->
            @cannot('acceso a inmuebles','acceso a edificios', 'acceso a proyectos','acceso a propiearios', 'acceso a inquilinos', 'acceso a garantes')

            @else
                <li id="side-inmueble-li" class="treeview">
                    <a href="#">
                        <i class="fa fa-building-o" aria-hidden="true"></i>
                        <span>Inmuebles</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul id="side-inmueble-ul" class="treeview-menu">

                        @can('acceso a inmuebles')
                            <li id="side-ele-propiedades"><a data-toggle="tooltip" title="añadir, editar, eliminar y consultar informacion sobre los inmuebles" href="/admin/inmuebles"><i class="fa fa-building"></i> Propiedades</a></li>
                        @endcan
                        @can('acceso a edificios')
                            <li id="side-ele-edificios"><a href="/admin/edificios"><i class="fa fa-building-o"></i> Edificios</a></li>
                        @endcan
                        @can('acceso a proyectos')
                            <li id="side-ele-proyectos"><a href="/admin/proyectos"><i class="fa fa-file-powerpoint-o"></i> Proyectos</a></li>
                        @endcan
                        @can('acceso a propiearios')
                            <li id="side-ele-propietarios"><a href="/admin/propietarios"><i class="fa fa-user-secret"></i> Propietarios</a></li>
                        @endcan
                        @can('acceso a inquilinos')
                            <li id="side-ele-inquilinos"><a href="/admin/inquilinos"><i class="fa fa-user"></i> Inquilinos</a></li>
                        @endcan
                        @can('acceso a garantes')
                            <li id="side-ele-garantes"><a href="/admin/garantes"><i class="fa fa-user"></i> Garantes</a></li>
                        @endcan

                    </ul>
                </li>
            @endcan

        <!-- Oportunidades -->
            @cannot('acceso a oportunidades','acceso a agenda')

            @else
                <li id="side-oportunidades-li" class="treeview">
                    <a href="#">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <span>Oportunidades</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul id="side-oportunidades-ul" class="treeview-menu">

                        @can('acceso a oportunidades')
                            <li id="side-ele-opotunidades"><a data-toggle="tooltip" title="ver las oportunidades de negocio" href="/admin/oportunidades"><i class="fa fa-eye"></i> Oportunidades</a></li>
                        @endcan
                        @can('acceso a agenda')
                            <li id="side-ele-agenda"><a href="/admin/agenda"><i class="fa fa-calendar"></i> Agenda</a></li>
                        @endcan

                    </ul>
                </li>
            @endcan
        <!-- Contratos -->
            @can('acceso a contratos')
                <li id="side-contratos-li" class="treeview">
                    <a href="#">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                        <span>Contratos</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul id="side-contratos-ul" class="treeview-menu">
                        <li id="side-ele-contratos"><a href="/admin/contratos" title="ver historial de contratos" data-toogle="tooltip"><i class="fa fa-handshake-o"></i> Contratos</a></li>
                    </ul>
                </li>
            @endcan

        <!-- Carga de Impuestos -->
            @cannot('acceso a impuestos','alta de impuestos')

            @else
                <li id="side-impuestos-li" class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        <span>Impuestos</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul id="side-impuestos-ul" class="treeview-menu">
                        @can('acceso a impuestos')
                            <li id="side-ele-visualizar-impuestos"><a data-toggle="tooltip" title="visualizar una lista filtrada de todos los impuestos y servicios cargados" href="/admin/conceptosliquidaciones"><i class="fa fa-list-alt" aria-hidden="true"></i> Registros de impuestos</a></li>
                        @endcan
                        @can('alta de impuestos')
                            <li id="side-ele-cargar-impuestos"><a data-toggle="tooltip" title="cargar los montos para los impuestos asociados a los contratos" href="/admin/conceptosliquidaciones/create"><i class="fa fa-plus-circle" aria-hidden="true"></i> Carga de impuestos</a></li>
                        @endcan

                    </ul>
                </li>
            @endcan

        <!-- Liquidaciones mensuales -->
            @cannot('alta de liquidaciones')

            @else
                <li id="side-liquidaciones-li" class="treeview">
                    <a href="#">
                        <i class="fa fa-calculator" aria-hidden="true"></i>
                        <span>Liquidaciones mensuales</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul id="side-liquidaciones-ul" class="treeview-menu">
                        @can('alta de liquidaciones')
                            <li id="side-ele-generar-liquidacion"><a data-toggle="tooltip" title="visualizar una lista de todos los registros de liquidación mensual que ya están listos para poder ser liquidados" href="/admin/liquidaciones/create"><i class="fa fa-list-alt" aria-hidden="true"></i> Registros listos para liquidar</a></li>
                        @endcan
                        @can('cobro de liquidaciones')
                            <li id="side-ele-cobros"><a data-toggle="tooltip" title="cargar el cobro de una liquidación mensual a un cliente" href="/admin/cobros/create"><i class="fa fa-usd" aria-hidden="true"></i> Cobro de servicios</a></li>
                        @endcan
                    </ul>
                </li>
        @endcan

        <!--CONTABILIDAD -->
            <li id="li14">
                <a data-toggle="tooltip" data-placement="top" title="Acceso a resumenes de movimienos en la empresa"   href="/admin/contabilidad/">
                    <i class="fa fa-bar-chart">
                        <div class="icon-bg bg-orange"></div>
                    </i>
                    <span class="menu-title">Contabilidad</span>
                </a>
            </li>


        <!--Backup de Datos -->
            <li id="li15">
                <a data-toggle="tooltip" data-placement="top" title="Backup de la información almacenada" onclick="backup()"  href="{{--  route('admin.backup.index') --}}">
                    <i class="fa fa-database">
                        <div class="icon-bg bg-orange"></div>
                    </i>
                    <span class="menu-title">Respaldo de datos</span>
                </a>
            </li>

        </ul>
    </section>
</aside>


<script type="text/javascript">
    function backup(){
        var enlace_factura = 'http://localhost/NUBE/backupGN/hacer_backup_NUBE.php';
        window.open(enlace_factura);
    }
</script>