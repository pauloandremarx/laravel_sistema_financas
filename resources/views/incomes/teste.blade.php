@extends('adminlte::page')

@section('title', 'Receitas')

@section('content_header')
<h1>Receitas</h1>
@stop

@section('content')








<div class="d-flex ">

    <h5>Total: {{$total_sum}}</h5>

    <h5>Total: {{$totale_sum}}</h5>

</div>


<div>

    <!-- Date input-->
    <div class="form-group">


        <form action="/incomes/teste" method="POST">
            <!-- sem @csrf o form não é enviado  -->
            @csrf

            <label class="col-md-6 control-label" for="date" id="date">Data</label>
            <div class="col-md-4">
                <input id="date" name="date" type="date" class="form-control input-md">

            </div>

            <div class="form-group col-md-4">
                <label for="exampleFormControlSelect1">Selecione o mês</label>
                <select class="form-control" id="mes" name="mes">
                    <option value="1">Janeiro</option> 
                    <option value="2">Fevereiro</option>
                    <option value="3">Março</option> 
                    <option value="4">Abril</option> 
                    <option value="5">Maio</option> 
                    <option value="6">Junho</option> 
                    <option value="7">Julho</option> 
                    <option value="8">Agosto</option> 
                    <option value="9">Setembro</option> 
                    <option value="10">Outubro</option> 
                    <option value="11">Novembro</option> 
                    <option value="12">Dezembro</option> 
                </select>
            </div>


            <!-- Buttom Submit -->
            <input class="btn btn-primary" type="submit" value="Pesquisar">
        </form>
    </div>

</div>


</div>

<span>

    <p>teste: {{$month}} </p>

</span>







@stop




@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>


@stop