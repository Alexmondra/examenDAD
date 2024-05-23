<div class="modal-content">
    <form id="formUpdate" action="{{$entrada->id ? route('entrada.update', $entrada) : route('entrada.store')}}" method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title">Entradas</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @if($entrada->id)
                @method('PUT')
                <input type="hidden" name="id" value="{{ $entrada->id }}">
            @endif
            @csrf
            <div class="form-group">
                <label for="placa" id="titulo">Placa</label>
                <select name="placa" class="form-control" id="placa">
                    @foreach($vehiculos as $vehiculo)
                        <option value="{{ $vehiculo->placa }}" {{ $entrada->placa == $vehiculo->placa ? 'selected' : '' }}>
                            {{ $vehiculo->placa }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_entrada">Fecha de Entrada</label>
                <input type="datetime-local" name="fecha_entrada" class="form-control" id="fecha_entrada" value="{{ $entrada->fecha_entrada ? \Carbon\Carbon::parse($entrada->fecha_entrada)->format('Y-m-d\TH:i') : '' }}">
            </div>
            <div class="form-group">
                <label for="fecha_salida">Fecha de Salida</label>
                <input type="datetime-local" name="fecha_salida" class="form-control" id="fecha_salida" value="{{ $entrada->fecha_salida ? \Carbon\Carbon::parse($entrada->fecha_salida)->format('Y-m-d\TH:i') : '' }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="guardar"><span id="textoBoton">{{ $entrada->id ? 'Actualizar' : 'Guardar' }}</span></button>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
</div>
