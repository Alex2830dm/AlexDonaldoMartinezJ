<br>
<div class="alert alert-primary" role="alert">
    <div class="row">
        @foreach ($datos as $dato)
        <div class="col-2">
            <label>Producto: </label>
            <input type="text"  class="form-control" id="producto" value="{{$dato->producto}}" readonly>
        </div>
        <div class="col-2">
            <label>Unidad: </label>
            <input type="text"  class="form-control" id="punidad" value="{{$dato->unidad}}" >
        </div>
        @endforeach
        <div class="col-2">
            <label>Cantidad: </label>
            <input type="text" class="form-control" id="pcantidad">
        </div>
    </div>
</div>
{{-- <script type="text/javascript">
    $(document).ready(function () {
        $('#pcantidad').keyup(function () {
            var precio = $('#pprecio').val(); //obtiene el costo del producto
            var cantidad = $('#pcantidad').val(); //obtiene la cantidad
            var total = precio * cantidad;
            $("#pcosto").val(total);
        });        
    });

</script> --}}
