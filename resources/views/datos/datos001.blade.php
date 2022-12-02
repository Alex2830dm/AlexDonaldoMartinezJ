<div class="col-6">
    <label for="">Alumnos</label>
    <select name="id_alumno" id="id_alumno">
        <option value="0">Alumnos</option>
        @foreach ($alumnos as $alumnos)
        <option value="{{$alumnos->id}}">{{$alumnos->nombre}}</option>
        @endforeach
    </select>
</div>
    
<script type="text/javascript">
    $(document).ready(function () {
        $("#id_alumno").change(function () {
            var valgrupo = $("#id_grupo").val();
            if (valgrupo == 0) {
                $("#info03").empty();
                $("#info02").html('Debes Seleccionar un Grupo');
            } else {
                $("#info02").load("{{route('datos02')}}?id_grupo=" + valgrupo).serialize();
            }
        });    
                
    });
</script>