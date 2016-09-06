<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
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


            <ul class="nav nav-pills nav-stacked">
                <li class="active">
                    <a href="#">
                        <span class="badge pull-right">{{$purchase->count()}}</span>
                        Все
                    </a>
                </li>
                <li><a href="#"></a></li>


            </ul></div>
        <div class="col-md-10">

            <table class="table table-hover table-bordered ">
                <thead>
                <tr>
                    <th>№ торгов</th>
                    <th>Контрагент</th>
                    <th>Дата начала</th>
                    <th>Дата окончания</th>
                    <th>Ссылка</th>
                    <th>Примечание</th>
                    <th>Статус</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($purchase as $t)
                    <tr>
                        <td>{{$t->purchaseName}}</td>
                        <td><a href="/client/{{$t->contragent->ClientId}}">{{$t->contragent->ClientName}}</a></td>
                        <td>{{$t->purchaseDateStart}}</td>
                        <td>{{$t->purchaseDateEnd}}</td>
                        <td>{{$t->purchaseLink}}</td>
                        <td>{{$t->purchaseNote}}</td>
                        <td><span class="label {{$t->purchase_status->psColor}}">{{$t->purchase_status->psName}}</span></td>
                    </tr>

                @endforeach

                </tbody>
            </table>


        </div>
    </div>



    <!-- Main component for a primary marketing message or call to action -->
    <div class="footer">
        <p>© ООО ЗСС Маяк 2016</p>
    </div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body></html>