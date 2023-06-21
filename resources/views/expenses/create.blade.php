@extends('adminlte::page')

@section('title', 'Cadastro de Gastos')

@section('content_header')
<h1>Painel de Controle</h1>
@stop

@section('content')

    <form  action="/expenses" method="POST" class="form-horizontal">
        <!-- sem @csrf o form não é enviado  -->
        @csrf

        <fieldset>


            <!-- Form Name -->
            <legend class="bi bi-wallet">Cadastro de Gastos</legend>


            <!-- Value input-->
            <div class="form-group">
                <label class="col-md-6 control-label " for="value" id="value">Valor</label>
                <div class="col-md-4">
                    <input type="number" step="0.01" id="value" name="value" min="0.01" placeholder="" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Date input-->
            <div class="form-group">
                <label class="col-md-6 control-label" for="date" id="date">Data</label>
                <div class="col-md-4">
                    <input id="date" name="date" type="date" class="form-control input-md">

                </div>
            </div>

            <!-- Seletor de categoria-->
            <div class="form-group">
                <label for="title">Adicione as Categorias:</label>
                <div class="form-group">
                    <input type="checkbox" name="types[]" value="Educação"> Educação
                </div>
                <div class="form-group">
                    <input type="checkbox" name="types[]" value="Moradia"> Moradia
                </div>
                <div class="form-group">
                    <input type="checkbox" name="types[]" value="Pagamentos"> Pagamentos
                </div>
                <div class="form-group">
                    <input type="checkbox" name="types[]" value="Saúde"> Saúde
                </div>
                <div class="form-group">
                    <input type="checkbox" name="types[]" value="Transporte"> Transporte
                </div>
            </div>


            <!-- Message -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="message" id="message">Mensagem</label>
                <div class="col-md-4">
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
            </div>


            <!-- Buttom Submit -->
            <input class="btn btn-primary" type="submit" value="Salvar">



        </fieldset>
    </form>
@include('sweetalert::alert')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop