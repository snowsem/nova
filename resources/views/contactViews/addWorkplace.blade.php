<script>
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('#_token').attr('value') }
    });
    var make_id = $(this).find(":selected").val();

    var options = {
        ajax          : {
            url     : '/ajax/select_wp',
            type    : 'POST',
            dataType: 'json',

            data    : {
                q: make_id
            }
        },
        locale        : {
            emptyTitle: 'Поиск',
            searchPlaceholder: 'Поиск',
            currentlySelected: 'Выброн',
            statusInitialized: 'Наберите название'


        },
        log           : 3,
        preprocessData: function (data) {
            var  array = [];
            var i;
            var l = data.length;
            if (l) {
                for (i = 0; i < l; i++) {
                    array.push($.extend(true, data[i], {

                        text : data[i].ClientName.substring(0,50),
                        value: data[i].ClientId,
                        data : {

                        }
                    }));

                }

            }




            // You must always return a valid array when processing data. The
            // data argument passed is a clone and cannot be modified directly.
            return array;
        }

    };


    $('.selectpicker').selectpicker({style: 'btn-primary btn-sm',
        size: 6
    }).filter('.with-ajax').ajaxSelectPicker(options);
   // $('select').trigger('change');
</script>
<form id="data-edit" class="form-horizontal" role="form" method="post" action="/contact/{{$id}}/add_workplace">
    <div class="form-group">

        <div class="col-sm-10">
            <select name="wpClientId" class="selectpicker with-ajax" data-show-subtext="true" data-live-search="true"  autofocus>



            </select>

        </div>

    </div>
    <div class="form-group">


        <div class="col-sm-10">

            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Должность" name="wpContactPost" value=""/>
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




    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

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