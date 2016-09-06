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
                        <span class="badge pull-right">{{$contacts->count()}}</span>
                        Все
                    </a>
                </li>

            </ul>
            <button id="addTrigger" class="btn btn-default btn-sm" value="/contacts/add" title="Добавить контакт" type="submit" aria-label="">Добавить контакт </button>
        </div>
        <div class="col-md-10">
            <div class="columned col-list">
            <?

            $a = '';
            $i=0;
            foreach ($contacts as $contact) {
                $i++;

                if ($a == mb_substr( $contact->FamilyContact, 0, 1)) {
                    echo '<div class="row"><div class="col-md-1">'.$i.' </div><div class="col-md-10"> <a  href="/contact/'.$contact->IDContact.'" class="grey-list " id="222" href="#222#">'.$contact->FamilyContact.' '.$contact->NameContact.' '.$contact->SoNameContact.'</a></div></div>';
                } else {
                    $a = mb_substr( $contact->FamilyContact, 0, 1);
                    echo ' <p class="alpp"><span class="alp">'.$a.'</span></p>';

                    echo '<div class="row"><div class="col-md-1">'.$i.' </div><div class="col-md-10"> <a  href="/contact/'.$contact->IDContact.'" class="grey-list " id="222" href="#222#">'.$contact->FamilyContact.' '.$contact->NameContact.' '.$contact->SoNameContact.'</a></div></div>';

                }





                //$a = mb_substr( $contact->ClientName, 0, 1);







            }

            ?>
                </div>



        </div>
    </div>
    <!-- Modal -->
    <div class = "modal false modal" id = "myModal" tabindex = "-1" role = "dialog"
         aria-labelledby = "myModalLabel" aria-hidden = "true">

        <div class = "modal-dialog">
            <div class = "modal-content">

                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                        ×
                    </button>

                    <h4 class = "modal-title" id = "myModalLabel">
                        This Modal title
                    </h4>
                </div>

                <div class = "modal-body">

                </div>

                <div class = "modal-footer">
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">
                        Закрыть
                    </button>

                    <button type = "button" class = "btn btn-primary" id="Submit">
                        Сохранить
                    </button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->



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
<script src="/js/contacts.js"></script>
<script src="/js/jquery.form.js"></script>
<link href="/jsui/jquery-ui.css" rel="stylesheet">
<link href="/jsui/jquery-ui.theme.css" rel="stylesheet">
<script src="/jsui/jquery-ui.js"></script>
<link rel="stylesheet" href="/js/select/dist/css/bootstrap-select.css">
<script src="/js/select/dist/js/bootstrap-select.js"></script>

</body></html>