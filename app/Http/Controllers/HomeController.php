<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $dicas = array
        (
            ['name' => 'Diversifique seus investimentos para reduzir riscos.', 'url' => '/img/1.jpg'],
            ['name' => 'Crie um plano de orçamento e siga-o à risca' , 'url' =>'/img/2.jpg'],
            ['name' =>'Poupe regularmente para construir uma reserva de emergência' , 'url' =>'/img/3.jpg'],
            ['name' =>'Faça pesquisas antes de tomar decisões de investimento' , 'url' =>'/img/4.jpg'],
            ['name' =>'Invista em conhecimento para aumentar suas habilidades financeiras' , 'url' =>'/img/5.jpg'],
            ['name' =>'Evite gastos impulsivos e avalie suas necessidades reais' , 'url' =>'/img/6.png'],
            ['name' =>'Pague suas dívidas com juros altos o mais rápido possível' , 'url' =>'/img/7.jpg'],
            ['name' =>'Tenha uma visão de longo prazo ao investir no mercado de ações' , 'url' =>'/img/8.jpg'],
            ['name' =>'Aproveite as vantagens dos juros compostos em seus investimentos' , 'url' =>'/img/9.jpg'],
            ['name' =>'Acompanhe suas despesas para identificar oportunidades de economia' , 'url' =>'/img/10.jpg'],
            ['name' =>'Analise seu perfil de risco antes de investir em ativos arriscados' , 'url' =>'/img/11.jpg'],
            ['name' =>'Mantenha-se informado sobre as tendências econômicas globais' , 'url' =>'/img/12.jpg'],
            ['name' =>'Use a tecnologia a seu favor para gerenciar suas finanças' , 'url' =>'/img/13.jpg'],
            ['name' =>'Estabeleça metas financeiras claras e estipule prazos realistas' , 'url' =>'/img/14.jpg'],
            ['name' =>'Consulte um profissional antes de tomar decisões complexas' , 'url' =>'/img/15.jpg'],
            ['name' =>'Evite se deixar levar pelas emoções ao investir' , 'url' =>'/img/16.jpg'],
            ['name' =>'Busque diversificar sua renda com fontes adicionais' , 'url' =>'/img/17.jpg'],
            ['name' =>'Mantenha-se atualizado sobre as mudanças nas leis fiscais' , 'url' =>'/img/18.jpg'],
            ['name' =>'Analise o custo-benefício antes de fazer grandes compras' ,'url' => '/img/19.jpg'],
            ['name' =>'Aprenda a negociar para obter melhores condições em suas transações' , 'url' =>'/img/20.jpg'],
            ['name' =>'Esteja preparado para imprevistos financeiros e crie um plano B' , 'url' =>'/img/21.jpg'],
            ['name' =>'Evite empréstimos desnecessários e gaste dentro de suas possibilidades' , 'url' =>'/img/22.jpg'],
            ['name' =>'Acompanhe o desempenho de suas ações e reavalie periodicamente' , 'url' =>'/img/23.jpg'],
            ['name' =>'Busque investir em setores com boas perspectivas de crescimento' ,'url' => '/img/24.jpg'],
            ['name' =>'Não deixe para amanhã, comece a investir no seu futuro hoje' , 'url' =>'/img/25.jpg'],
        );



        shuffle($dicas);

        return view('/home',['dicas' =>  $dicas]);

    }
}
