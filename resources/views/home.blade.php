@extends('adminlte::page')

@section('title', 'Cadastro de Gastos')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <section>
        <div class="uk-container uk-container-small" style="max-width: 1000px">
            <div class="uk-slider-container-offset" uk-slider>
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                    <ul class="uk-slider-items uk-child-width-1-3@s uk-grid">
                        @foreach($dicas as $dica)
                        <li>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-media-top">
                                    <img src="{{$dica['url']}}" class="uk-width-1-1" height="200" alt="">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title uk-text-center">{{$dica['name']}}</h3>

                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                </div>
            </div>
        </div>
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-xs-6">
                <h1 class="h-100 d-flex align-content-center align-items-center ">A moeda é vital: facilita o comércio, armazena valor, padroniza preços, permite política monetária e garante estabilidade econômica.</h1>
            </div>

            <div class="col-md-6 col-xs-6">
               <div> <img class="img-fluid img-rounded" src="/img/saco-dinehiro-notas-moedas-006.jpg" alt="moeda"></div>
            </div>
        </div>


        <div class="row mt-4 p-5">
            <div class="col">
                <div class="d-flex justify-content-center"><img class="img-fluid" width="80" src="/img/dollar.png" /></div>
                <h1 class="h4 text-center">Dólar dos Estados Unidos (USD)</h1>
                <p class="text-center">É considerada a moeda de reserva mundial e amplamente aceita em transações internacionais.</p>
            </div>
            <div class="col text-center">
                <div class="d-flex justify-content-center"><img class="img-fluid" width="80" src="/img/euro.png" /></div>
                <h1 class="h4">Euro (EUR)  </h1>
                <p class="text-center">É a moeda oficial de 19 países da União Europeia, oferecendo estabilidade e liquidez significativas.</p>
            </div>
            <div class="col text-center">
                <div class="d-flex justify-content-center"><img class="img-fluid" width="80" src="/img/libra.png" /></div>
                <h1 class="h4"> Libra Esterlina (GBP)</h1>
                <p class="text-center">É a moeda do Reino Unido e tem uma longa história de confiabilidade e solidez econômica.</p>
            </div>
            <div class="col text-center">
                <div class="d-flex justify-content-center "><img class="img-fluid" width="80" src="/img/yen.png" /></div>
                <h1 class="h4">Iene Japonês (JPY) </h1>
                <p class="text-center">É uma das moedas mais negociadas e valorizadas no mercado forex, além de refletir a economia forte do Japão.</p>
            </div>
            <div class="col text-center">
                <div class="d-flex justify-content-center"><img class="img-fluid" width="80" src="/img/real.png" /></div>
                <h1 class="h4"> Real Brasileiro (BRL)</h1>
                <p class="text-center">É a moeda oficial do Brasil, desempenhando um papel importante na maior economia da América Latina e oferecendo possibilidades de comércio e investimento dentro do país.</p>
            </div>


        </div>
    </div>
    </section>
    @include('sweetalert::alert')
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.21/dist/css/uikit.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.21/dist/js/uikit.min.js"></script>
    <link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
 @stop

@section('js')
  <script>
        console.log('Hi!');
    </script>
@stop
