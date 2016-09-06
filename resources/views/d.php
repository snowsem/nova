<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>CRM - {{$client->ClientName}}</title>

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


    <div class="card-name"><h3><span class="group-ico"></span> Ливадийский ремонтно-судостроительный завод <small><span class="edit"></span></small></h3></div>
    <!--#editContactClick для jquery class utilContact !-->
    <div id="editContactClick" class="row">


        <div class="col-md-6">





            <div class="row">
                <div class="col-md-6">Телефон: <span class="plus-mid"></span></div>
                <div id="toggle" class="col-md-6">
                    <ul class="list-unstyled">
                        <li><span class="phone">12321333</span>  <span class="edit"></span> <span class="delete" value="/controller/id"></span></li>
                        <li><span class="phone">12321333</span>  <span class="edit"></span> <span class="delete"></span></li>

                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">E-mail: <span class="plus-mid"></span></div>
                <div id="toggle" class="col-md-6">
                    <ul class="list-unstyled">
                        <li><span class="mail">1233@dasd.rw</span>  <span class="edit"></span> <span class="delete"></span></li>
                        <li><span class="mail">123dassd@rararar.da</span>  <span class="edit"></span> <span class="delete"></span></li>

                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">Ссылки: <span class="plus-mid"></span></div>
                <div id="toggle" class="col-md-6">
                    <ul class="list-unstyled">
                        <li><span class="link">1233@dasd.rw</span>  <span class="edit"></span> <span class="delete"></span></li>
                        <li><span class="link">123dassd@rararar.da</span>  <span class="edit"></span> <span class="delete"></span></li>

                    </ul>
                </div>
            </div>
            <div class="separator"></div><h5>О компании<span class="edit "></span></h5>
            <div class="row">
                <div class="col-md-6">Публичное наименование:</div>
                <div class="col-md-6"><p>s</p></div>
            </div>

            <div class="row">
                <div class="col-md-6">Рабочее наименование:</div>
                <div class="col-md-6"><p>s</p></div>
            </div>
            <div class="row">
                <div class="col-md-6">Описание:</div>
                <div class="col-md-6"><p>s</p></div>

            </div>
            <div class="separator"></div>
            <div class="row">
                <div class="col-md-6">Примечание:</div>
                <div class="col-md-6"><p>s</p></div>

            </div>
            <div class="separator"></div>
            <div class="row">
                <div class="col-md-6">Контакты: <span class="plus-mid"></span></div>
                <div class="col-md-6"> <ul class="list-unstyled">
                        <li><span class="forward">Аунс Ирина Анатольевна</span></li>
                        <li><span class="forward">Аунс Ирина Анатольевна</span></li>


                    </ul></div>
            </div>
            <div class="separator"></div>
            <div class="row">
                <div class="col-md-6">Индекс:</div>
                <div class="col-md-6"><p>s</p></div>
            </div>
            <div class="row">
                <div class="col-md-6">Адрес:</div>
                <div class="col-md-6"><p>s</p></div>
            </div>
            <div class="row">
                <div class="col-md-6">Город:</div>
                <div class="col-md-6"><p>s</p></div>
            </div>
            <div class="row">
                <div class="col-md-6">Дополнительно:</div>
                <div class="col-md-6"><p>Же</p></div>
            </div>

            <div class="separator"></div>



        </div>



        <div class="col-md-6">


            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><span class="headset-mid"></span> Звонки</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><span class="money-mid"></span> Счета</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><span class="cart-mid"></span> Торги</a></li>

                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span class="timer-mid"></span> История</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span class="folder-mid"></span> Файлы</a></li>
                </ul>
                <div class="margin-10px-top"></div>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home"><button class="btn btn-default btn-sm" type="submit" aria-label="">Добавить </button></div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <button class="btn btn-default btn-sm" type="submit" aria-label="">Добавить </button>
                        <div class="margin-10px-top"></div>
                        <button class = "btn btn-primary btn-xs" data-toggle = "modal" data-target = "#myModal">
                            Launch demo modal
                        </button>

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>№ счета</th>
                                <th>Дата</th>
                                <th>Дата оплаты</th>
                                <th>Статус</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>№ 45</td>
                                <td>2015-04-10</td>
                                <td>2015-10-14</td>
                                <td>Частично оплачен</td>
                            </tr>
                            <tr>
                                <td>№ 45</td>
                                <td>2015-04-10</td>
                                <td>2015-10-14</td>
                                <td>Частично оплачен</td>
                            </tr>
                            <tr>
                                <td>№ 45</td>
                                <td>2015-04-10</td>
                                <td>2015-10-14</td>
                                <td>Частично оплачен</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">...3</div>
                    <div role="tabpanel" class="tab-pane" id="settings">...4</div>
                </div>

            </div>




        </div>
    </div>



    <!-- Main component for a primary marketing message or call to action -->
    <div class="footer">
        <p>© ООО ЗСС Маяк 2016</p>
    </div>
    <!-- Modal -->
    <div class = "modal false" id = "myModal" tabindex = "-1" role = "dialog"
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
                    <p>Date: <input type="text" id="datepicker"></p>
                    Click on close button to check Event functionality.
                </div>

                <div class = "modal-footer">
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">
                        Close
                    </button>

                    <button type = "button" class = "btn btn-primary">
                        Submit changes
                    </button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->


</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="/js/contragent_card.js"></script>
<link href="/jsui/jquery-ui.css" rel="stylesheet">
<link href="/jsui/jquery-ui.theme.css" rel="stylesheet">
<script src="/jsui/jquery-ui.js"></script>



<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
    $('#myModal').on('show.bs.modal', function () {


        // do something…
        alert("k");


    });
    $('#myModal').on('hidden.bs.modal', function () {
        window.alert('hidden event fired!');
    });
</script>
</body></html>