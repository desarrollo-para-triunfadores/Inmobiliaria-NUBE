<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    {{-- @include('admin.partes.startBox') --}}
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            {{-- @include('admin.partes.grafico2') --}}

            <!-- Chat box -->
            {{-- @include('admin.partes.chat') --}}


            <!-- TO DO List -->
            {{-- @include('listadoTareas.blade.php') --}}

            <!-- quick email widget -->
            {{-- @include('emailWidget.blade.php' --}}

        </section>

        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
            <!-- Map box -->
            {{-- @include('mapBox.blade.php') --}}

            <!-- solid sales graph -->
            {{-- @include('admin.partes.grafico') --}}

            <!-- Calendar -->
            {{-- @include('admin.partes.calendario') --}}
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->

</section>
<!-- /.content -->