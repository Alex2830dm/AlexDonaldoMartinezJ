<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <h4>{{$cliente->cliente}}</h4>
    <hr>
    Representante: {{$cliente->representante}} - No. Teléfono: {{$cliente->telefono}} - Correo: @if($cliente->email != '') {{$cliente->email}} @else No disponible @endif <br>
    No. Ruta: {{$cliente->ruta}} - Municipio: {{$cliente->d_municipio}}    

</div>
