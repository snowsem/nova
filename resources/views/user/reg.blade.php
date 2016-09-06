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
<div class="container">


    <div class="row ">
        <div class="col-md-12">


        <form class="form-horizontal " role="form" method="post" action="/reg">
            <div class="form-group">


                <div class="col-sm-4 col-sm-offset-4">
                    <input type="text" name="login" class="form-control" id="inputEmail3" placeholder="Логин">
                </div>
            </div>
            <div class="form-group ">

                <div class="col-sm-4 col-sm-offset-4">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Пароль">

                </div>

            </div>
            <div class="form-group">


                <div class="col-sm-4 col-sm-offset-4">
                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Имя">
                </div>
            </div>
            <div class="form-group">


                <div class="col-sm-4 col-sm-offset-4">
                    <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="email">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Запомнить меня
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-2">
                    <button type="submit" class="btn btn-default">Войти</button>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
    </div>





    <!-- Main component for a primary marketing message or call to action -->
    <div class="footer text-center">
        <p>© ООО ЗСС Маяк 2016</p>
    </div>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body></html>