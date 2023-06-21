@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<p>Welcome .</p>



@foreach($incomes as $income)

<p>{{$income->id}} -- {{$income->value}} -- {{$income->description}} --</p>


@endforeach


@stop

<main>
    <!--Imprime a mensagem de confirmação-->
    <div class="container-fluid">
        @if(session('msg'))
        <div class="alert alert-success" role="alert">
            <div class="msg">{{session('msg')}}</div>
        </div>
        @endif

    </div>
</main>

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop