<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>$ {{ App\Movimiento::totalEntrada() - App\Movimiento::totalSalida() }}</h3>
                <p>Saldo</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">saber más <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{App\Propietario::all()->count()}}</h3>
                <p>Propietarios Registrados</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">saber más <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                @if(App\Movimiento::totalEntrada())
                    <h3>$ {{ App\Movimiento::totalEntrada() }}<sup style="font-size: 20px"></sup></h3>
                @else
                    <h3>-<sup style="font-size: 20px"></sup></h3>
                @endif    
            <p>Entradas</p>
            </div>
            <div class="icon">
                <i class="fa fa-long-arrow-up"></i>
            </div>
            <a href="#" class="small-box-footer">saber más <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                    <h3>${{App\Movimiento::totalSalida() }}</h3>
                <p>Salidas</p>
            </div>
            <div class="icon">
                <i class="fa fa-long-arrow-down"></i>
            </div>
            <a href="#" class="small-box-footer">saber más <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>