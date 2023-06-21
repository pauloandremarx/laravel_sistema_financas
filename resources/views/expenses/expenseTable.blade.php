@extends('adminlte::page')
@section('title', 'Gastos')
@section('plugins.Datatables', true)
@section('content_header')
    <h1 class="d-flex justify-content-center">Gastos</h1>
@stop
@section('content')

    @php
        $months = ['' => '', '1' => 'Jan', '2' => 'Feb', '3' => 'Mar', '4' => 'Apr', '5' => 'May', '6' => 'Jun', '7' => 'Jul', '8' => 'Aug', '9' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec'];
    @endphp
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Filtro de data</h3>
                    </div>
                    <form class="card-body row" id="date_filter">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Data inicial:</label>
                                <div class="input-group date" id="datepicker_start_data" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                           data-target="#datepicker_start_data" name="start_date">
                                    <div class="input-group-append" data-target="#datepicker_start_data"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Data final:</label>
                                <div class="input-group date" id="datepicker_end_data" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                           data-target="#datepicker_end_data" id="datepicker_end" name="end_date">
                                    <div class="input-group-append" data-target="#datepicker_end_data"
                                         data-toggle="datetimepicker" id="teste_end">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" style="height: 100px;">
                            <div class="form-group align-middle " style="height: 100px;">
                                <div class="input-group align-middle align-items-center" style="height: 100px;">
                                    <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-12" id="reportPage">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabela de gastos</h3>

                        <div class="card-tools w-50">
                            <div class="input-group input-group-sm ">
                                <input type="text" name="table_search" class="form-control float-right"
                                       placeholder="Procurar" id="mySearch">

                                <div class="input-group-append">
                                    <button type="none" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap data-table" id="myTable">
                            <thead>
                            <tr class="headerT">
                                <th>ID</th>
                                <th>Tipo</th>
                                <th>Valor</th>
                                <th>Data</th>
                                <th>Descrição</th>
                                <th>Edição</th>
                                <th>Exclusão</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($expenses as $expense)
                                <tr>
                                    <td>{{ $expense->id }}</td>
                                    <td>
                                        @if (is_array($expense->types))
                                            @foreach ($expense->types as $type)
                                                <p>{{ $type }} </p>
                                            @endforeach
                                        @else
                                            <p> {{ $expense->types }}</p>
                                        @endif
                                    </td>
                                    <td>{{ $expense->value }}</td>
                                    <td>{{ date('d/m/Y', strtotime($expense->date)) }}</td>
                                    <td>{{ $expense->description }}</td>
                                    <td>
                                        <a href="/expenses/edit/{{ $expense->id }}"
                                           class="btn btn-primary primary-btn fas fa-edit"> Editar</a>
                                    </td>
                                    <td>
                                        <a href="#"></a>
                                        <form action="/expenses/{{ $expense->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-btn fas fa-trash-alt">
                                                Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td >
                                    <h3> Total: {{ $total_expenses }}</h3>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>

                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary primary-btn my-3" href="#" id="downloadPdf">Baixar gráficos em PDF</a>
                <div class="card card-primary">
                    <div>
                        <div class="row ">
                            <div class="col-md-6 p-4">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Grafico por tipo</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="donutChart"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 610px;"
                                                width="1220" height="500" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 p-4">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Area Chart</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="areaChart"
                                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 865px;"
                                                    width="1730" height="500" class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 p-4">
                                <!-- LINE CHART -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Line Chart</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="lineChart"
                                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>

                            <div class="col-md-6 p-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Bar Chart</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="barChart"
                                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @include('sweetalert::alert')
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

@stop
@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
            integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/vendor/jszip/jszip.min.js"></script>
    <script src="/vendor/pdfmake/pdfmake.min.js"></script>
    <script src="/vendor/pdfmake/vfs_fonts.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://unpkg.com/jspdf-autotable@3.5.22/dist/jspdf.plugin.autotable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"
            integrity="sha512-Vp2UimVVK8kNOjXqqj/B0Fyo96SDPj9OCSm1vmYSrLYF3mwIOBXh/yRZDVKo8NemQn1GUjjK0vFJuCSCkYai/A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#downloadPdf').click(function(event) {
            // get size of report page
            var reportPageHeight = $('#reportPage').innerHeight() + 500;
            var reportPageWidth = $('#reportPage').innerWidth() - 100;

            // create a new canvas object that we will populate with all other canvas objects
            var pdfCanvas = $('<canvas />').attr({
                id: "canvaspdf",
                width: reportPageWidth,
                height: reportPageHeight
            });

            // keep track canvas position
            var pdfctx = $(pdfCanvas)[0].getContext('2d');
            var pdfctxX = 0;
            var pdfctxY = 0;
            var buffer = 100;

            // for each chart.js chart
            $("canvas").each(function(index) {
                // get the chart height/width
                var canvasHeight = $(this).innerHeight();
                var canvasWidth = $(this).innerWidth();

                // draw the chart into the new canvas
                pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
                pdfctxX += canvasWidth + buffer;

                // our report page is in a grid pattern so replicate that in the new canvas
                if (index % 2 === 1) {
                    pdfctxX = 0;
                    pdfctxY += canvasHeight + buffer;
                }
            });

            // create new pdf and add our new canvas as an image
            var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
            pdf.addImage($(pdfCanvas)[0], 'PNG', 50, 40);
            pdf.autoTable({
                margin: {
                    top: 530
                },
                html: '#myTable'
            })
            // download the pdf
            pdf.save('filename.pdf');
        });

        $(function() {
            $('#datepicker_start_data').datetimepicker({
                viewMode: 'days',
                format: 'DD/MM/YYYY',
                locale: 'pt'
            });

            $('#datepicker_end_data').datetimepicker({
                viewMode: 'days',
                format: 'DD/MM/YYYY',
                locale: 'pt',
                useCurrent: false
            });

            $("#datepicker_start_data").on("change.datetimepicker", function(e) {
                $('#datepicker_end_data').datetimepicker('minDate', e.date.add(3,
                    'months')); //add(2, 'months')
            });

        });


        $(document).ready(function() {

            var today = moment().format('DD/MM/YYYY');
            var mes_start = moment(today, 'DD/MM/YYYY').subtract(2, 'months').format('DD/MM/YYYY');

            var mes_end = today;


            $('#date_filter').bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    start_date: {
                        validators: {
                            date: {
                                format: 'DD/MM/YYYY',
                                max: mes_start,
                                message: 'O valor tem que ser no minimo 2 meses atrás',
                            },
                            notEmpty: {
                                message: 'Esse campo não pode ser vazio '
                            },

                        }
                    },
                    end_date: {
                        validators: {
                            date: {
                                format: 'DD/MM/YYYY',
                                message: 'O valor tem que ser respeitado o intervalo de 2 meses atrás',
                            },
                            notEmpty: {
                                message: 'Esse campo não pode ser vazio'
                            }
                        }
                    }
                }
            });



            $("#mySearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr:not(.headerT)").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $('table').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": false,
                "paging": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                language: {
                    "emptyTable": "Nenhum registro encontrado",
                    "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "infoFiltered": "(Filtrados de _MAX_ registros)",
                    "infoThousands": ".",
                    "loadingRecords": "Carregando...",
                    "processing": "Processando...",
                    "zeroRecords": "Nenhum registro encontrado",
                    "search": "Pesquisar",
                    "paginate": {
                        "next": "Próximo",
                        "previous": "Anterior",
                        "first": "Primeiro",
                        "last": "Último"
                    },
                    "aria": {
                        "sortAscending": ": Ordenar colunas de forma ascendente",
                        "sortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "select": {
                        "rows": {
                            "_": "Selecionado %d linhas",
                            "0": "Nenhuma linha selecionada",
                            "1": "Selecionado 1 linha"
                        },
                        "1": "%d linha selecionada",
                        "_": "%d linhas selecionadas",
                        "cells": {
                            "1": "1 célula selecionada",
                            "_": "%d células selecionadas"
                        },
                        "columns": {
                            "1": "1 coluna selecionada",
                            "_": "%d colunas selecionadas"
                        }
                    },
                    "buttons": {
                        "copySuccess": {
                            "1": "Uma linha copiada com sucesso",
                            "_": "%d linhas copiadas com sucesso"
                        },
                        "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                        "colvis": "Visibilidade da Coluna",
                        "colvisRestore": "Restaurar Visibilidade",
                        "copy": "Copiar",
                        "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                        "copyTitle": "Copiar para a Área de Transferência",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todos os registros",
                            "1": "Mostrar 1 registro",
                            "_": "Mostrar %d registros"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Preencher todas as células com",
                        "fillHorizontal": "Preencher células horizontalmente",
                        "fillVertical": "Preencher células verticalmente"
                    },
                    "lengthMenu": "Exibir _MENU_ resultados por página",
                    "searchBuilder": {
                        "add": "Adicionar Condição",
                        "button": {
                            "0": "Construtor de Pesquisa",
                            "_": "Construtor de Pesquisa (%d)"
                        },
                        "clearAll": "Limpar Tudo",
                        "condition": "Condição",
                        "conditions": {
                            "date": {
                                "after": "Depois",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "not": "Não",
                                "notBetween": "Não Entre",
                                "notEmpty": "Não Vazio"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "gt": "Maior Que",
                                "gte": "Maior ou Igual a",
                                "lt": "Menor Que",
                                "lte": "Menor ou Igual a",
                                "not": "Não",
                                "notBetween": "Não Entre",
                                "notEmpty": "Não Vazio"
                            },
                            "string": {
                                "contains": "Contém",
                                "empty": "Vazio",
                                "endsWith": "Termina Com",
                                "equals": "Igual",
                                "not": "Não",
                                "notEmpty": "Não Vazio",
                                "startsWith": "Começa Com"
                            },
                            "array": {
                                "contains": "Contém",
                                "empty": "Vazio",
                                "equals": "Igual à",
                                "not": "Não",
                                "notEmpty": "Não vazio",
                                "without": "Não possui"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Excluir regra de filtragem",
                        "logicAnd": "E",
                        "logicOr": "Ou",
                        "title": {
                            "0": "Construtor de Pesquisa",
                            "_": "Construtor de Pesquisa (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Limpar Tudo",
                        "collapse": {
                            "0": "Painéis de Pesquisa",
                            "_": "Painéis de Pesquisa (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Nenhum Painel de Pesquisa",
                        "loadMessage": "Carregando Painéis de Pesquisa...",
                        "title": "Filtros Ativos"
                    },
                    "searchPlaceholder": "Digite um termo para pesquisar",
                    "thousands": ".",
                    "datetime": {
                        "previous": "Anterior",
                        "next": "Próximo",
                        "hours": "Hora",
                        "minutes": "Minuto",
                        "seconds": "Segundo",
                        "amPm": ["am", "pm"],
                        "unknown": "-"
                    },
                    "editor": {
                        "close": "Fechar",
                        "create": {
                            "button": "Novo",
                            "submit": "Criar",
                            "title": "Criar novo registro"
                        },
                        "edit": {
                            "button": "Editar",
                            "submit": "Atualizar",
                            "title": "Editar registro"
                        },
                        "error": {
                            "system": "Ocorreu um erro no sistema (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Mais informações<\/a>)."
                        },
                        "multi": {
                            "noMulti": "Essa entrada pode ser editada individualmente, mas não como parte do grupo",
                            "restore": "Desfazer alterações",
                            "title": "Multiplos valores",
                            "info": "Os itens selecionados contêm valores diferentes para esta entrada. Para editar e definir todos os itens para esta entrada com o mesmo valor, clique ou toque aqui, caso contrário, eles manterão seus valores individuais."
                        },
                        "remove": {
                            "button": "Remover",
                            "confirm": {
                                "_": "Tem certeza que quer deletar %d linhas?",
                                "1": "Tem certeza que quer deletar 1 linha?"
                            },
                            "submit": "Remover",
                            "title": "Remover registro"
                        }
                    },
                    "decimal": ","
                }
            }).buttons().container().appendTo('.dataTables_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        function generateColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';

            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;

        }

        var legendas = [];
        var valores = [];
        var cores = [];
        var meses = [];


        @foreach ($expenses_grafics as $item)
        legendas.push("{{ str_replace('"', '', $item->types) }}")
        valores.push("{{ $item->total }}")
        cores.push(generateColor())
        @endforeach



        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: legendas,
            datasets: [{
                data: valores,
                backgroundColor: cores,
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })





        var legendas_v2 = [];
        var valores_v2 = [];
        var cores_v2 = [];
        var meses_v2 = [];

        var label_meses = ['', 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];

        @foreach ($expenses_grafics_date as $item)
        valores_v2.push("{{ $item->total }}")
        cores_v2.push(generateColor())
        meses_v2.push(label_meses["{{ $item->month }}"])
        @endforeach





        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        var areaChartData = {
            labels: meses_v2,
            datasets: [{
                label: 'Todos os meses',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: valores_v2
            },



            ]
        }

        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })



        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        var lineChartOptions = $.extend(true, {}, areaChartOptions)
        var lineChartData = $.extend(true, {}, areaChartData)
        lineChartData.datasets[0].fill = false;

        lineChartOptions.datasetFill = false

        var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
        })




        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)

        barChartData.datasets = areaChartData.datasets


        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    </script>
@stop
