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
        $( "#datepicker1" ).datepicker({
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
<form id="data-edit" class="form-horizontal" role="form" method="post" action="/bill/edit/{{$id}}">

    <div class="form-group">

        <div class="col-sm-4">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Номер счета" name="BillName" value="{{$bill->BillName}}"  autofocus/>
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-2 ">
            <select name="BillStatus" class="selectpicker">
                @foreach($bill_status as $a)

                    @if($a->BillStatusId == $bill->BillStatus)

                        <option selected="selected" value="{{$a->BillStatusId}}">{{$a->BillStatusName}}</option>

                    @else
                        <option value="{{$a->BillStatusId}}">{{$a->BillStatusName}}</option>

                    @endif




                @endforeach





            </select>
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-2 ">

            <select name="BillContactId" class="selectpicker">

                @foreach($contacts as $a)

                    @if($a->IDContragent == $bill->BillContragentId)


                        <option selected="selected" value="{{$a->IDContact}}">{{$a->FamilyContact}} {{$a->NameContact}} {{$a->SoNameContact}}</option>

                    @else
                        <option value="{{$a->IDContact}}">{{$a->FamilyContact}} {{$a->NameContact}} {{$a->SoNameContact}}</option>

                    @endif




                @endforeach




            </select>
        </div>

    </div>
    <div class="form-group">
        <div class="col-sm-4">
            <input type="text" class="form-control  input-sm"
                   id="datepicker" placeholder="Дата создания" name="BillDataCreate" value="{{$bill->BillDataCreate}}"/>
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control  input-sm"
                   id="datepicker1" placeholder="Дата погашения" name="BillDatePay" value="{{$bill->BillDatePay}}"/>
        </div>

    </div>

    <div class="form-group">

        <div class="col-sm-10">
            <textarea class="form-control" placeholder="Дополнительно"  name="BillText"  rows="3">{{$bill->BillText}}</textarea>

        </div>

    </div>








    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="BillContragentId" value="{{$bill->BillContragentId}}">


</form>


