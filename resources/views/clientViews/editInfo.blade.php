<script>
    $(function() {
        $('.selectpicker').selectpicker({
            style: 'btn-primary btn-sm',
            size: 6
        });
        $( "#datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd',
            yearRange: '1920:2050',
            changeMonth: true,
            changeYear: true,
            currentText: 'Сегодня',
            monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
                'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
            monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
                'Июл','Авг','Сен','Окт','Ноя','Дек'],
            dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
            dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
            dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб']
        });


    });


</script>
<form id="data-edit" class="form-horizontal" role="form" method="post" action="/client/{{$id}}/edit_info">

    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Публичное наименование" name="ClientPublicName" value="{{$client->ClientPublicName}}"  autofocus/>
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Рабочее наименование" name="ClientWorkName" value="{{$client->ClientWorkName}}"/>
        </div>

    </div>
    <div class="form-group">
        <div class="col-sm-4">
            <input type="text" class="form-control  input-sm"
                   id="datepicker" placeholder="Дата основания" name="ClientBorn" value="{{$client->ClientBorn}}"/>
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-4">
            <select name="ClientType" class="selectpicker">
                @foreach($cat as $a)
                    @if($a->ClientTypeId == $client->ClientType)
                        <option selected="selected" value="{{$a->ClientTypeId}}">{{$a->ClientTypeName}}</option>

                    @else
                        <option value="{{$a->ClientTypeId}}">{{$a->ClientTypeName}}</option>

                    @endif


                @endforeach

            </select>
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-4">
            <select name="ClientVid" class="selectpicker">
                @foreach($sub_cat as $a)
                    @if($a->ClientVidId == $client->ClientVid)
                        <option selected="selected" value="{{$a->ClientVidId}}">{{$a->ClientVidName}}</option>

                    @else
                        <option value="{{$a->ClientVidId}}">{{$a->ClientVidName}}</option>

                    @endif


                @endforeach

            </select>
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <textarea class="form-control" placeholder="Описание"  name="ClientInfo"  rows="3">{{$client->ClientInfo}}</textarea>

        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="ИНН" name="ClientInn" value="{{$client->ClientInn}}"/>

        </div>

    </div>


    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Индекс" name="ClientIndex" value="{{$client->ClientIndex}}"/>
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Адрес" name="ClientAddress" value="{{$client->ClientAddress}}"/>
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Город" name="ClientCity" value="{{$client->ClientCity}}"/>
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <textarea class="form-control" placeholder="Примечание"  name="ClientInfoContr"  rows="3">{{$client->ClientInfoContr}}</textarea>

        </div>

    </div>





    <input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>
<script>
    $(function() {


        $( "#datepicker" ).datepicker();
    });

</script>