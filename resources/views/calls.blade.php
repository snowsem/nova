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

            {{date("Y-m-d")}}

            <ul class="nav nav-pills nav-stacked">
                <li class="active">
                    <a href="#">
                        <span class="badge pull-right">{{count($call)}}</span>
                        Все
                    </a>
                </li>
                <li >
                    <a href="#">
                        <span class="badge pull-right">{{count($today)}}</span>
                        Сегодня
                    </a>
                </li>
                <li >
                    <a href="#">
                        <span class="badge pull-right">{{count($lastday)}}</span>
                        Вчера
                    </a>
                </li>
                <li><a href="#"></a></li>


            </ul></div>
        <div class="col-md-10">

            <h3>За сегодня</h3>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Пользователь</th>
                    <th>Тип</th>
                    <th>Дата</th>
                    <th>Время</th>

                    <th>Контакт</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($today as $t)
                    <tr>
                        <th>@if (isset($t->name)) {{$t->name}} @endif</th>
                        <th class="@if (isset($t->callStatusColor)) {{$t->callStatusColor}} @endif">@if (isset($t->callStatusName)) {{$t->callStatusName}} @endif</th>
                        <th> {{$t->CallDate}}</th>
                        <th>{{$t->CallTime}} </th>

                        <th> @if (isset($t->IDContact))
                            <a href="/contact/{{$t->IDContact}}">{{ $t->FamilyContact.' '.$t->NameContact.' '.$t->SoNameContact}}</a>
                        @elseif (isset($t->ClientName))
                           <a href="/client/{{$t->ClientId}}"> {{$t->ClientName}}</a>


                        @endif

                    </tr>


                @endforeach

                </tbody>
            </table>
            <h3>За вчера</h3>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Пользователь</th>
                    <th>Тип</th>
                    <th>Дата</th>
                    <th>Время</th>

                    <th>Контакт</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($lastday as $t)
                    <tr>
                        <th>@if (isset($t->name)) {{$t->name}} @endif</th>
                        <th class="@if (isset($t->callStatusColor)) {{$t->callStatusColor}} @endif">@if (isset($t->callStatusName)) {{$t->callStatusName}} @endif</th>
                        <th> {{$t->CallDate}}</th>
                        <th>{{$t->CallTime}} </th>

                       <th> @if (isset($t->IDContact))
                            <a href="/contact/{{$t->IDContact}}">{{ $t->FamilyContact.' '.$t->NameContact.' '.$t->SoNameContact}}</a>
                        @elseif (isset($t->ClientName))
                           <a href="/client/{{$t->ClientId}}"> {{$t->ClientName}}</a>


                        @endif

                    </tr>


                @endforeach

                </tbody>
            </table>
            <h3>Все</h3>

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Пользователь</th>
                    <th>Тип</th>
                    <th>Дата</th>
                    <th>Время</th>

                    <th>Контакт</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($call as $t)
                    <tr>
                        <th>@if (isset($t->name)) {{$t->name}} @endif</th>
                        <th class="@if (isset($t->callStatusColor)) {{$t->callStatusColor}} @endif">@if (isset($t->callStatusName)) {{$t->callStatusName}} @endif</th>
                        <th> {{$t->CallDate}}</th>
                        <th>{{$t->CallTime}} </th>

                       <th> @if (isset($t->IDContact))
                            <a href="/contact/{{$t->IDContact}}">{{ $t->FamilyContact.' '.$t->NameContact.' '.$t->SoNameContact}}</a>
                        @elseif (isset($t->ClientName))
                           <a href="/client/{{$t->ClientId}}"> {{$t->ClientName}}</a>


                        @endif

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