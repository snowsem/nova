<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>CRM - {{$client->ClientName}}</title>

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

<body style="">

<!-- Fixed navbar -->
@include('menu')

<div class="container">



    <div class="card-name"><h3><span class="group-ico"></span> {{$client->ClientName}}{{ isset($client->property->ClientPropertyName) ? ', '.$client->property->ClientPropertyName : '' }}<small><span class="edit" value="/client/{{$client->ClientId}}/edit_name" title="Редактировать название"></span></small></h3></div>
    <!--#editContactClick для jquery class utilContact !-->
    <div id="editContactClick" class="row">


        <div class="col-md-6">





            <div class="row">
                <?
                //print $client;
                ?>
                <div class="col-md-4">Телефон: <span class="plus-mid" value="/client/{{$client->ClientId}}/add_telephone" title="Добавить телефон"></span></div>
                <div id="toggle" class="col-md-6">
                    <ul class="list-unstyled">
                        @foreach ($client->telephones as $t)
                            <li><span class="phone">{{ $t->AttrTelephone }}</span> <span class="label label-default">{{ $t->DopName }}</span>  <span class="edit" value="/edit_telephone/{{$t->IDTelephone}}" title="Редактировать телефон"></span> <span value="/remove_telephone/{{$t->IDTelephone}}" class="delete"></span></li>

                        @endforeach


                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">E-mail: <span class="plus-mid" value="/client/{{$client->ClientId}}/add_email" title="Добавить e-mail"></span></div>
                <div id="toggle" class="col-md-6">
                    <ul class="list-unstyled">
                        @foreach ($client->emails as $t)
                            <li><span class="mail">{{ $t->AttrEmail }}</span> <span class="label label-default">{{ $t->DopInfo }}</span>  <span class="edit" value="/edit_email/{{$t->IDEmail}}" title="Редактировать e-mail"></span> <span value="/remove_email/{{$t->IDEmail}}" class="delete"></span></li>

                        @endforeach


                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">Ссылки: <span class="plus-mid" value="/client/{{$client->ClientId}}/add_link" title="Добавить ссылку"></span></div>
                <div id="toggle" class="col-md-6">
                    <ul class="list-unstyled">
                        @foreach ($client->links as $t)
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
            <div class="separator"></div><h4>О компании<span value="/client/{{$client->ClientId}}/edit_info" title="Редактировать о компании" class="edit "></span></h4>
            <div class="row">
                <div class="col-md-6">Тип:</div>
                <div class="col-md-6"><p>{{$client->type->ClientTypeName}}</p></div>

            </div>
            <div class="row">
                <div class="col-md-6">Вид:</div>
                <div class="col-md-6"><p>{{$client->vid->ClientVidName}}</p></div>

            </div>
            <div class="row">
                <div class="col-md-6">Публичное наименование:</div>
                <div class="col-md-6"><p>{{$client->ClientPublicName}}</p></div>
            </div>

            <div class="row">
                <div class="col-md-6">Рабочее наименование:</div>
                <div class="col-md-6"><p>{{$client->ClientWorkName}}</p></div>
            </div>
            <div class="row">
                <div class="col-md-6">Дата основания:</div>
                <div class="col-md-6"><p>{{$client->ClientBorn}}</p></div>
            </div>
            <div class="row">
                <div class="col-md-6">ИНН:</div>
                <div class="col-md-6"><p>{{$client->ClientInn}}</p></div>

            </div>



            <div class="row">
                <div class="col-md-6">Описание:</div>
                <div class="col-md-6"><p>{{$client->ClientInfo}}</p></div>

            </div>
            <div class="separator"></div>
            <div class="row">
                <div class="col-md-6">Примечание:</div>
                <div class="col-md-6"><p>{{$client->ClientInfoContr}}</p></div>

            </div>
            <div class="separator"></div>
            <div class="row">
                <div class="col-md-3">Контакты:  <span class="plus-mid" value="/client/{{$client->ClientId}}/add_contact" title="Добавить контакт"></span></div>
                <div class="col-md-9"><ul class="list-unstyled">


                        @foreach ($client->workplace as $t)
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

                                    <div class="col-md-8">
                    <span class="forward">

                                  @if (isset($t->wpId))
                            <a {{$color_id}} href="/contact/{{ $t->contact->IDContact }}">{{ $t->contact->FamilyContact }} {{ $t->contact->NameContact }} {{ $t->contact->SoNameContact }}</a>
                        @else
                        @endif

                        <p id="work">{{$t->wpContactPost}}</p>
                                </span>
                                    </div>
                                    <div class="col-md-4">
                                        @if ($t->wpCheck == true)
                                            <span  class="">По наст. время</span>
                                        @else
                                            <span {{$color_id}} class="">Не работает</span>
                                        @endif

                                    </div>
                                </li>

                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="separator"></div>
            <div class="row">
                <div class="col-md-3">Связи:  <span class="plus-mid" value="/client/{{$client->ClientId}}/add_relation" title="Добавить связь"></span></div>
                <div class="col-md-9">
                </div>
            </div>
            <div class="separator"></div>
            <h4>Адреса

                <span class="plus-mid" value="/client/{{$client->ClientId}}/add_address" title="Добавить адрес"></span>
            </h4>
            @foreach ($client->addresses as $t)


                <div class="row">
                    <div class="col-md-6">{{$t->comment_address}}</div>
                    <div class="col-md-6"><p><span class="edit" value="/client/{{$t->id_address }}/edit_address" title="Редактировать название"></span>@if ($t->index_address){{$t->index_address }}@endif @if ($t->sub_address),{{$t->sub_address}} @endif @if ($t->city_address), {{$t->city_address}}@endif @if($t->street_address) ,{{$t->street_address}} @endif @if($t->home_address) ,{{$t->home_address}}@endif @if ($t->korp_address) ,{{$t->korp_address}} @endif @if ($t->kv_address),{{$t->kv_address}} @endif </p></div>
                </div>


                <div class="separator"></div>





            @endforeach

<!--

            <div class="row">
                <div class="col-md-6">Индекс:</div>
                <div class="col-md-6"><p>{{$client->ClientIndex}}</p></div>
            </div>
            <div class="row">
                <div class="col-md-6">Адрес:</div>
                <div class="col-md-6"><p>{{$client->ClientAddress}}</p></div>
            </div>
            <div class="row">
                <div class="col-md-6">Город:</div>
                <div class="col-md-6"><p>{{$client->ClientCity}}</p></div>
            </div>

            <div class="separator"></div>

!-->

        </div>



        <div class="col-md-6">


            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active"><a href="#call" aria-controls="home" role="tab" data-toggle="tab"><span class="headset-mid"></span> Звонки</a></li>
                    <li role="presentation"><a href="#bills" aria-controls="profile" role="tab" data-toggle="tab"><span class="money-mid"></span> Счета</a></li>
                    <li role="presentation"><a href="#purchase" aria-controls="profile" role="tab" data-toggle="tab"><span class="cart-mid"></span> Торги</a></li>

                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span class="timer-mid"></span> История</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span class="folder-mid"></span> Файлы</a></li>
                </ul>
                <div class="margin-10px-top"></div>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="call">
                        <button class="btn btn-default btn-sm" id="addTrigger" type="submit" aria-label="" value="/call/add/client/{{$client->ClientId}}" title="Добавить">Добавить </button>
                        <div class="margin-10px-top"></div>
                        @foreach ($calls as $t)
                            <div class="row">

                                <div class="col-md-12">
                                    <h5 class="@if (isset($t->callStatusColor)) {{$t->callStatusColor}} @endif">@if (isset($t->callStatusName)) {{$t->callStatusName}} @endif: {{$t->CallDate}} в {{$t->CallTime}} -   @if (isset($t->name)) {{$t->name}} @endif  @if (isset($t->IDContact)) <span class="label label-default"> {{ $t->FamilyContact.' '.$t->NameContact.' '.$t->SoNameContact}} </span>  @endif   <span value="/call/edit/client/{{$t->CallID}}/{{$client->ClientId}}" title="Редактировать" class="edit "></span> </h5>
                                </div>
                            </div>
                            <div class="separator"></div>
                            <div class="">{{$t->CallText}}</div>
                            <div class="separator"></div>
                        @endforeach
                    </div>
                    <div role="tabpanel" class="tab-pane" id="bills">
                        <button class="btn btn-default btn-sm" type="submit" id="addTrigger" value="/bill/add/{{$client->ClientId}}" title="Добавить счет" aria-label="">Добавить </button>
                        <div class="margin-10px-top"></div>
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
                            @foreach ($client->bills as $t)
                                <tr style="cursor: pointer" id="addTrigger" value="/bill/edit/{{$t->BillId}}" title="Редактировать счет {{$t->BillName}}">
                                    <td>{{$t->BillName}}</td>
                                    <td>{{$t->BillDataCreate}}</td>
                                    <td>{{$t->BillDatePay}}</td>
                                    <td><span class="label {{$t->BillStatusColor}}">{{$t->BillStatusName}}</span></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="purchase">
                        <button class="btn btn-default btn-sm" type="submit" id="addTrigger" value="/purchase/add/{{$client->ClientId}}" title="Добавить торги" aria-label="">Добавить </button>
                        <div class="margin-10px-top"></div>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Наименование</th>
                                <th>От</th>
                                <th>Статус</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($client->purchase as $t)
                                <tr style="cursor: pointer" id="addTrigger" value="/purchase/edit/{{$t->purchaseId}}" title="Редактировать {{$t->purchaseName}}">
                                    <td>{{$t->purchaseName}}</td>
                                    <td>{{$t->purchaseDateStart}}</td>
                                    <td><span class="label {{$t->psColor}}">{{$t->psName}}</span></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="settings">
                        <button class="btn btn-default btn-sm" type="submit" id="addTrigger" value="/file/add/client/{{$client->ClientId}}" title="Добавить файл" aria-label="">Добавить </button>
                        <div class="margin-10px-top"></div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-md-6">Название</th>
                                <th class="col-md-2">Размер</th>
                                <th class="col-md-3">Дата добавления</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($client->files as $t)
                                <tr>
                                    <td class="col-md-6"><a href="/file/get/{{$t->fileOriginalName}}">{{$t->fileOriginalName}}</a></td>
                                    <td class="col-md-2">{{$t->fileSize}}</td>
                                    <td class="col-md-3">{{$t->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
<script src="/js/file.js"></script>
<link href="/jsui/jquery-ui.css" rel="stylesheet">
<link href="/jsui/jquery-ui.theme.css" rel="stylesheet">
<script src="/jsui/jquery-ui.js"></script>
<script src="/js/jquery.form.js"></script>
<link rel="stylesheet" href="/js/select/dist/css/bootstrap-select.css">
<script src="/js/select/dist/js/bootstrap-select.js"></script>
<script src="/js/jquery.maskedinput.js"></script>

<link rel="stylesheet" href="/js/as/css/ajax-bootstrap-select.css"/>
<script type="text/javascript" src="/js/as/js/ajax-bootstrap-select.js"></script>
</body></html>

