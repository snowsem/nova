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
    
		
        $("#datepicker1").mask("99:99");

 


    });

</script>
<form id="data-edit" class="form-horizontal" role="form" method="post" action="/call/edit/client/{{$id}}">


    <div class="form-group">

        <div class="col-sm-2 ">
            <select name="CallType" class="selectpicker"  autofocus>
                @foreach($c_status as $a)
                    @if ($call->CallType == $a->callStatusId)

                        <option selected="selected" value="{{$a->callStatusId}}">{{$a->callStatusName}}</option>
                    @else
                        <option value="{{$a->callStatusId}}">{{$a->callStatusName}}</option>
                        @endif


                @endforeach





            </select>
        </div>

    </div>
    <div class="form-group">


        <div class="col-sm-2 ">
            <select name="CallContact" class="selectpicker">

                @if($call->CallContragent == '')
                    @foreach($contacts as $a)
                        @if ($call->CallContact == $a->IDContact)
                            <option selected="selected" value="{{$a->IDContact}}">{{$a->FamilyContact}} {{$a->NameContact}} {{$a->SoNameContact}}</option>
                            @else
                            <option value="{{$a->IDContact}}">{{$a->FamilyContact}} {{$a->NameContact}} {{$a->SoNameContact}}</option>
                            @endif




                    @endforeach
                        <option  value="client">Контрагент</option>


                    @else
                    <option selected="selected"  value="client">Контрагент</option>
                    @foreach($contacts as $a)

                        <option value="{{$a->IDContact}}">{{$a->FamilyContact}} {{$a->NameContact}} {{$a->SoNameContact}}</option>


                    @endforeach
                    @endif







            </select>
        </div>

    </div>
    <div class="form-group">
        <div class="col-sm-4">
            <input type="text" class="form-control  input-sm"
                   id="datepicker" placeholder="Дата звонка" name="CallDate" value="{{$call->CallDate}}"/>
        </div>

        <div class="col-sm-2">

            <input type="text" class="form-control  input-sm"
                   id="datepicker1" placeholder="Время" name="CallTime"  value="{{$call->CallTime}}"/>
        </div>

    </div>

    <div class="form-group">

        <div class="col-sm-10">
            <textarea class="form-control" placeholder="Текст"  name="CallText"  rows="3"> {{$call->CallText}}</textarea>

        </div>

    </div>








    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="CallContragent" value="{{ $cid }}">

</form>


