
<div class="row">
    <form>
        <div class="col-xs-2">
            <div class="input-icon right">
                <input type="date"  class="form-control" onchange="/*cambio();" id="fechaInicio" value="" name="fechaInicio" title="Buscar a partir" value="" required/>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="input-icon right">
                <input type="date"  class="form-control" onchange="/*cambio();" id="fechaFin" value="" name="fechaFin" title="Buscar hasta" required/>
            </div>
        </div>
        <button onclick="buscar_entre_fechas()">
            Buscar
        </button>
    </form>
</div>