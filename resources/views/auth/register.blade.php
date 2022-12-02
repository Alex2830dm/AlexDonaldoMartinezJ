@extends('layouts.app')
@section('title1', 'Nuevo Usuario')
@section('opciones')
@section('title2', 'Registrar Nuevo Usuario')
@section('contenido')
<script type="text/javascript">
    $(document).ready(function () {
        $('#nombre').keyup(function () {
            var txtname = $('#nombre').val();
            var formato = /^[A-Za-z\_\-.\s\xF1\xD1]+$/;

            if (formato.test(txtname)) {
                $("#producto").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
            } else {
                $("#producto").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
            }
        });
        $("#mail").blur(function () {
            var txtmail = $("#mail").val();
            var valmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if (valmail.test(txtmail)) {
                $("#producto").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
            } else {
                $("#producto").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
            }
        });
        $('#pass1').keyup(function () {
            var txtpass1 = $("#pass1").val();
            var valmayus = /[A-Z]/g;
            var valminus = /[a-z]/g;
            var valnum = /[0-9]/g;
            var valcarac = /[.,#,_,-,@]/;
            var men1 = "Una Mayuscula";
            var men = "Una Minuscula";
            var men3 = "Un Numero";
            var men4 = "Un Caracter Especial";
            if (valmayus.test(txtpass1)) {
                if (valminus.test(txtpass1)) {
                    if (valnum.test(txtpass1)) {
                        if (valcarac.test(txtpass1)) {
                            $("#spass1").text("La contraseña tiene los caracteres correspondientes");
                        } else {
                            $("#spass1").text("La Contraseña Debe Contener Un Caracter Especial");
                        }
                    } else {
                        $("#spass1").text("Contraseña Debe Contener un Numero");
                    }
                } else {
                    $("#spass1").text("Contraseña debe contener minusculas");
                }
            } else {
                $("#spass1").text("Contraseña debe contener mayusculas");
            }

            if (txtpass1.length >= 8) {
                $("#spass1").css({
                    "color": "#0FC714"
                });
            } else if (txtpass1.length >= 6) {
                $("#spass1").css({
                    "color": "#E9E315"
                });
            } else {
                $("#spass1").css({
                    "color": "#FF0707"
                });
            }
        });
    });

</script>
<form action="{{url('usuarios/register')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre:</label>
                <input type="text" class="form-control form-control" id="nombre" aria-describedby="emailHelp"
                    name="name">
                    @error('name')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control form-control-sm" id="mail" aria-describedby="emailHelp"
                    name="email">
                    @error('email')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control form-control-sm" id="pass1" name="password">
                <span id="spass1" class="spass1"></span>
                @error('password')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
            <div class="form-group">
                <label for="exampleInputPassword1">Tipo de Usuario</label>
                <select name="tipo_usuario" id="" class="form-control">
                    <option value="">-- Selecciona un tipo de usuario --</option>
                    <option value="1">Administrador - Encargado</option>
                    <option value="2">Trabajador</option>
                </select>
                @error('tipo_usuario')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div><br>
    <div class="row">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
</form>
@endsection
