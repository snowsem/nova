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

            <ul class="nav nav-pills nav-stacked">
                <li >
                    <a href="#">
                        <span class="badge pull-right">{{$clients->count()}}</span>
                        Контрагентов
                    </a>
                </li >
                <li>
                    <a href="#">
                        <span class="badge pull-right">{{$contacts->count()}}</span>
                        Контактов
                    </a>
                </li>



            </ul></div>
        <div class="col-md-10">





            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active"><a href="#call" aria-controls="home" role="tab" data-toggle="tab"><span class=""></span> Контрагенты</a></li>
                    <li role="presentation"><a href="#bills" aria-controls="profile" role="tab" data-toggle="tab"><span class=""></span> Контакты</a></li>

                </ul>
                <div class="margin-10px-top"></div>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="call">
                        <div class="margin-10px-top"></div>
                        <div class="columned col-list">
                        @foreach($clients as $a)
                              <div class="row">

                                  <div class="col-md-11">
                                      <a target="_blank" href="/client/{{$a->ClientId}}"> {{$a->ClientName}}</a>
                                  </div>
                              </div>





                        @endforeach
                            </div>
                    </div>
                    <div class="margin-10px-top"></div>
                    <div role="tabpanel" class="tab-pane active" id="bills">
                        <div class="margin-10px-top"></div>
                        <div class="columned col-list">
                        @foreach($contacts as $a)
                            <div class="row">

                                <div class="col-md-11">
                                    <a target="_blank" href="/contact/{{$a->IDContact}}">{{$a->FamilyContact}} {{$a->NameContact}} {{$a->SoNameContact}}</a>
                                </div>
                            </div>



                        @endforeach
                    </div>
                    </div>
                    </div>
                <div class="margin-10px-top"></div>
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