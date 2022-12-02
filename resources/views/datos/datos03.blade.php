<div class="col-6">
    @foreach ($datos as $dato)
        <img src="{{asset('img/productos/'.$dato->foto)}}" alt="{{$dato->producto}}" width="200">
    @endforeach
</div>