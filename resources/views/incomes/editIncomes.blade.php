@extends('adminlte::page')

@section('title', 'Receitas')

@section('content_header')
<h1>Edição de Receitas</h1>
@stop

@section('content')

<form action="/incomes/update/{{$income->id}}" method="POST" class="form-horizontal">
    <!-- sem @csrf o form não é enviado  -->
    @csrf
    @method('PUT')

    <fieldset>


        <!-- Value input-->
        <div class="form-group">
            <label class="col-md-6 control-label " for="value" id="value">Valor</label>
            <div class="col-md-4">
                <input type="number" step="0.01" id="value" name="value" min="0.01" placeholder="" class="form-control input-md" required="" value="{{$income->value}}">

            </div>
        </div>

        <!-- Date input-->
        <div class="form-group">
            <label class="col-md-6 control-label" for="date" id="date">Data</label>
            <div class="col-md-4">
                <input id="date" name="date" type="date" class="form-control input-md" value="{{$income->date->format('Y-m-d')}}">

            </div>
        </div>


        <!-- Message -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="message" id="message">Mensagem</label>
            <div class="col-md-4">
                <textarea class="form-control" id="description" name="description" value="{{$income->description}}"></textarea>
            </div>
        </div>


        <!-- Buttom Submit -->
        <input class="btn btn-primary" type="submit" value="Editar">



    </fieldset>
</form>

@include('sweetalert::alert')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('teste');
</script>
@stop