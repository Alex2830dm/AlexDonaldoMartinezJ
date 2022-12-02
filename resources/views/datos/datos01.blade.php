<br>
<div class="alert alert-primary" role="alert">
    <div class="row">
        @foreach ($datos as $dato)
        <div class="col-2">
            <label>Producto: </label>
            <input type="text"  class="form-control" id="producto" value="{{$dato->producto}}, {{$dato->unidad}}" readonly>
        </div>
        <div class="col-2">
            <label>Precio: </label>
            <input type="text"  class="form-control" id="precio" value="{{$dato->precio}}" >
        </div>
        @endforeach        
        <div class="col-2">
            <label>% Descuento: </label>
            <input type="number"  class="form-control" id="descuento1" value="0">
        </div>
        <div class="col-2">
            <label>Cantidad: </label>
            <input type="text" class="form-control" id="cantidad" value="0">
        </div>
        <div class="col-2">
            <label>Importe: </label>
            <input type="text"  class="form-control" id="importe" value="0">
        </div>
        <div class="col-2">
            <label>Descuento: </label>
            <input type="text"  class="form-control" id="descuento2" value="0">
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#cantidad').keyup(function () {
            var precio = $('#precio').val(); //obtiene el costo del producto
            var cantidad = $('#cantidad').val(); //obtiene la cantidad
            var descuento1 = $("#descuento1").val();
            var subtotal = parseFloat(precio) * parseFloat(cantidad); //subtotal            
            var descuento2 = ((descuento1 * subtotal) / 100)
            var total = subtotal - descuento2;
            $("#descuento2").val(descuento2)
            $("#importe").val(total);
        });        
    });

</script>
