<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>ООО ЗСС Маяк</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">



    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
@include('menu')


<div class="container">

    <div class="row">

        <div class="col-md-2">

           </div>
        <div class="col-md-10">
            @if(Session::has('welcome'))

                <p> <span class="label label-info">{{ Session::get('welcome') }}</span></p>
            @endif

                <div class="margin-10px-top"></div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class=""> <span class="label label-default">14.03.2016</span></h5>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="">
                    <p>Добавление контакта!!!!!</p>
                    <p>Редактирование пола</p>
                    <p>Должность контакта в контрагенте</p>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class=""> <span class="label label-default">04.02.2016</span></h5>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="">
                    <p>Загрузка по клику</p>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class=""> <span class="label label-default">03.02.2016</span></h5>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="">
                    <p>Добавил поля для поиска клиентов</p>
                    <p>Исправил вывод города в контрагенте</p>
                    <p>Добавил поля для поиска клиентов</p>
                    <p>Сортированный список в контрагенте</p>

                </div>


                <div class="row">
                    <div class="col-md-12">
                        <h5 class=""> <span class="label label-default">28.01.2016</span></h5>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="">
                    <p>Поправил выдачу поиска</p>

                </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5 class=""> <span class="label label-default">27.01.2016</span></h5>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <div class="">
                        <p>Добавлены ссылки на контрагентов в истории</p>
                        <p>Исправлен запрос к БД в разделе История</p>
                        <p>Добавлена автоподстановка даты и времени в звонках</p>
                        <p>Сделал поиск по контрагентам и клиентам: ищет по телефону мылу ссылке и наименованию</p>
                    </div>









        </div>
    </div>



    <!-- Main component for a primary marketing message or call to action -->
    <div class="footer">
        <p>© ООО ЗСС Маяк 2016</p>
    </div>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body></html>