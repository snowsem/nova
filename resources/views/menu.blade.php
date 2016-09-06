<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ООО ЗСС Маяк</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li {!!(Request::is('/')) ? ' class="active"' : '' !!}><a href="/">Главная</a></li>
                <li {!!(Request::is('clients')) ? ' class="active"' : (Request::is('client/*') ? ' class="active"' : '' )  !!}><a href="/clients">Контрагенты</a></li>
                <li {!!(Request::is('contacts')) ? ' class="active"' :(Request::is('contact/*') ? ' class="active"' : '' ) !!}><a href="/contacts">Контакты</a></li>
                <li {!!(Request::is('bills')) ? ' class="active"' : '' !!}><a href="/bills">Счета</a></li>
                <li {!!(Request::is('purchase')) ? ' class="active"' : '' !!}><a href="/purchase">Эл. торги</a></li>
                <li {!!(Request::is('calls')) ? ' class="active"' : '' !!}><a href="/calls">История</a></li>
                <li {!!(Request::is('mail')) ? ' class="active"' : '' !!}><a href="/mail">Mail</a></li>

            </ul>
            <div class="col-sm-2 col-md-2">
                <form class="navbar-form" role="search" method="post" action="/search">
                    <div class="input-group">
                        <input type="text" class="form-control   input-ssx"  placeholder="Поиск" name="q">

                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Личный кабинет <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Мои данные</a></li>
                        <li><a href="#">История</a></li>

                        <li class="divider"></li>
                        <li class="dropdown-header">{{{ Auth::user()->name  }}}</li>

                        <li><a href="/logout">Выход</a></li>
                    </ul>
                </li>


            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>