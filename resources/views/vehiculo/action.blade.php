<div class="modal-content">
    <form id="formUpdate" action="{{$vehiculo->id ? route('vehiculo.update', $vehiculo) : route('vehiculo.store')}}" method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title">vehiculos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @if($vehiculo->id)
                @method('PUT')
                <input type="hidden" name="id" value="{{ $vehiculo->id }}">
            @endif
            @csrf
            <div class="form-group">
                <label for="categoria" id="titulo">Categoria</label>
                <select name="id_categoria" class="form-control" id="categoria">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $vehiculo->id_categoria == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                <label for="nombre" id="titulo">Placa</label>
                <input type="text" name="placa" class="form-control" id="placa" placeholder="Ingrese placa" value="{{$vehiculo->placa}}">
                <label for="nombre" id="titulo">Modelo</label>
                <input type="text" name="modelo" class="form-control" id="modelo" placeholder="Ingrese modelo" value="{{$vehiculo->modelo}}">
                <label for="nombre" id="titulo">Propietario</label>
                <input type="text" name="propietario" class="form-control" id="propietario" placeholder="Ingrese propietario" value="{{$vehiculo->propietario}}">
                <div id="msg_nombre"></div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="guardar"><span id="textoBoton"></span></button>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
</div>
