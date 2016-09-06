<script>
    $(function() {
        $('.selectpicker').selectpicker({
            style: 'btn-primary btn-sm',
            size: 6
        });


    });

</script>
<form id="data-edit" class="form-horizontal" role="form" method="post" action="/client/{{$id}}/add_contact">

    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Фамилия" name="Family"  autofocus />
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Имя" name="Name" />
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Отчество" name="SoName" />
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <select name="Sex" class="selectpicker">

                    <option selected="selected" value="1">Мужской</option>
                    <option  value="2">Женский</option>




            </select>
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Должность" name="Post" />
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <textarea class="form-control" placeholder="Примечание"  name="wpContactText"  rows="3"></textarea>

        </div>

    </div>


    <div class="form-group">
        <div class="col-sm-3">
            <input type="text" class="form-control  input-sm"
                   id="datepicker" placeholder="Начало работы" name="wpDateStart" value=""/>
        </div>

    </div>
    <div class="form-group">
        <div class="col-sm-4">
            <div class="checkbox">
                <label><input id="wpCheck" name="wpCheck" type="checkbox"  checked>По настоящее время</label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-3">
            <input type="text" class="form-control  input-sm wpDateEnd"
                   id="datepicker1" placeholder="Дата окончания" name="wpDateEnd" value="" disabled/>
        </div>
    </div>








    <input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>
<script>
    $(function() {
        $("input[type=checkbox]").on("change", function() {

            if (this.checked) {

                $('.wpDateEnd').attr('disabled', true);


            } else {

                $('.wpDateEnd').attr('disabled', false);
            }
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