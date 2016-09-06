<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>CRM - {{$contact->FamilyContact.' '.$contact->NameContact.' '.$contact->SoNameContact}}</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">



    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

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

    <div class="card-name"><h3><span @if ($contact->SexContact == 1)
                                     class="male"
                    @else
                    class="female"
                    @endif

                                    ></span> {{$contact->FamilyContact.' '.$contact->NameContact.' '.$contact->SoNameContact}} <small><span class="edit" value="/contact/{{$contact->IDContact}}/edit_name" title="Редактировать ФИО"></span></small></h3></div>
    <div id="editContactClick" class="row">


        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">Телефон: <span class="plus-mid" value="/contact/{{$contact->IDContact}}/add_telephone" title="Добавить телефон"></span></div>
                <div id="toggle" class="col-md-6">
                    <ul class="list-unstyled">
                        @foreach ($contact->telephones as $t)
                            <li><span class="phone">{{ $t->AttrTelephone }}</span> <span class="label label-default">{{ $t->DopName }}</span>  <span class="edit" value="/edit_telephone/{{$t->IDTelephone}}" title="Редактировать телефон"></span> <span value="/remove_telephone/{{$t->IDTelephone}}" class="delete"></span></li>

                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">E-mail: <span class="plus-mid" value="/contact/{{$contact->IDContact}}/add_email" title="Добавить e-mail"></span></div>
                <div id="toggle" class="col-md-6">
                    <ul class="list-unstyled">
                        @foreach ($contact->emails as $t)
                            <li><span class="mail">{{ $t->AttrEmail }}</span> <span class="label label-default">{{ $t->DopInfo }}</span>  <span class="edit" value=/edit_email/{{$t->IDEmail}}" title="Редактировать e-mail"></span> <span value="/remove_email/{{$t->IDEmail}}" class="delete"></span></li>

                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">Ссылки: <span class="plus-mid" value="/contact/{{$contact->IDContact}}/add_link" title="Добавить ссылку"></span></div>
                <div id="toggle" class="col-md-6">
                    <ul class="list-unstyled">
                        @foreach ($contact->links as $t)
                            <?  $h='';
                            if (strripos($t->AttrLink, '://') === false) {
                                $h = 'http://';

                            }  else {

                            }

                            ?>

                            <li><span class="link"><a href="<?=$h?>{{ $t->AttrLink }}" target="_blank"> {{ $t->AttrLink }}</a></span> <span class="label label-default">{{ $t->DopInfo }}</span>  <span class="edit" value="/edit_link/{{$t->IDLink}}" title="Редактировать ссылку"></span> <span value="/remove_link/{{$t->IDLink}}" class="delete"></span></li>

                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="separator"></div>
            <h4>Персональные данные<span class="edit" value="/contact/{{$contact->IDContact}}/edit_info" title="Редактировать персональные данные">

                </span></h4>

            <div class="separator"></div>
            <div class="row">
                <div class="col-md-6">Примечание:</div>
                <div class="col-md-6"><p>{{$contact->DopInfo}}</p></div>
            </div>
            <div class="separator"></div>
            <div class="row">
                <div class="col-md-6">Адрес:</div>
                <div class="col-md-6"><p>{{$contact->AddressContact}}</p></div>
            </div>
            <div class="row">
                <div class="col-md-6">Город:</div>
                <div class="col-md-6"><p>{{$contact->City}}</p></div>
            </div>

            <div class="separator"></div>


            <div class="row">
                <div class="col-md-6">Дата рождения:</div>
                <div class="col-md-6"><p>{{$contact->DateDR}}</p></div>
            </div>
            <div class="separator"></div>
            <h4>Места работы<span class="plus-mid" value="/contact/{{$contact->IDContact}}/add_workplace" title="Добавить место работы">

                </span></h4>
            <ul class="list-unstyled">


            @foreach ($contact->workplace as $t)
                <? $color_id = '';
                    ?>
                    @if ($t->wpCheck == true)
                        <? $color_id = '';
                        ?>
                    @else
                        <? $color_id = 'id=workplace_gray';
                        ?>
                    @endif
            <div class="row">
                <li class="work_mp">

                <div class="col-md-6">
                    <span class="forward">

                                  @if (isset($t->wpId))
                                    <a {{$color_id}} href="/client/{{ $t->client->ClientId }}">{{ $t->client->ClientName }}</a>
                                    @else
                                    @endif

                                    <p id="work">{{$t->wpContactPost}}</p>
                                </span>
                </div>
                <div class="col-md-6">
                    @if ($t->wpCheck == true)
                        <span  class="">По наст. время</span>
                    @else
                        <span {{$color_id}} class="">Не работает</span>
                    @endif
                        <span class="edit" value="/contact/{{$t->wpId }}/edit_workplace" title="Редактировать персональные данные">

                </span>

                </div>
                </li>

            </div>
            @endforeach
            </ul>

        </div>




        <div class="col-md-6">
            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#call" aria-controls="home" role="tab" data-toggle="tab"><span class="headset-mid"></span> Звонки</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><span class="folder-mid"></span> Файлы</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><span class="bookmark-mid"></span> Дополнительно</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span class="timer-mid"></span> История</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="call">
                        <button class="btn btn-default btn-sm" id="addTrigger" type="submit" aria-label="" value="/call/add/contact/{{$contact->IDContact}}" title="Добавить">Добавить </button>
                        <div class="margin-10px-top"></div>
                        @foreach ($contact->calls as $t)
                            <div class="row">

                                <div class="col-md-12">
                                    <h5 class="@if (isset($t->call_status->callStatusColor)) {{$t->call_status->callStatusColor}} @endif">@if (isset($t->call_status->callStatusName)) {{$t->call_status->callStatusName}} @endif: {{$t->CallDate}} в {{$t->CallTime}} -   @if (isset($t->user_name->name)) {{$t->user_name->name}} @endif  @if (isset($t->contact_name->IDContact)) <span class="label label-default"> {{ $t->contact_name->FamilyContact.' '.$t->contact_name->NameContact.' '.$t->contact_name->SoNameContact}} </span>  @endif   <span value="/call/edit/contact/{{$t->CallID}}/{{$contact->IDContact}}" title="Редактировать" class="edit "></span> </h5>
                                </div>
                            </div>
                            <div class="separator"></div>
                            <div class="">{{$t->CallText}}</div>
                            <div class="separator"></div>
                        @endforeach

                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">...2</div>
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
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="/js/bootstrap.min.js"></script>

<script src="/js/contragent_card.js"></script>
<link href="/jsui/jquery-ui.css" rel="stylesheet">
<link href="/jsui/jquery-ui.theme.css" rel="stylesheet">
<script src="/jsui/jquery-ui.js"></script>
<script src="/js/jquery.form.js"></script>
<link rel="stylesheet" href="/js/select/dist/css/bootstrap-select.css">
<script src="/js/select/dist/js/bootstrap-select.js"></script>
<link rel="stylesheet" href="/js/as/css/ajax-bootstrap-select.css"/>
<script type="text/javascript" src="/js/as/js/ajax-bootstrap-select.js"></script>
<script src="/js/jquery.maskedinput.js"></script>

</body></html>