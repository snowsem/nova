<script>
    $(function() {
        $('.selectpicker').selectpicker({
            style: 'btn-primary btn-sm',
            size: 6
        });


    });

</script>
<form id="data-edit" class="form-horizontal" role="form" method="post" action="/contacts/add_contact">

    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Фамилия" name="Family" autofocus />
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






    <input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>
<script>
    $(function() {


        $( "#datepicker" ).datepicker();
    });

</script>