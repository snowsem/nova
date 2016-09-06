<script>
    $(function() {
        $('.selectpicker').selectpicker({
            style: 'btn-primary btn-sm',
            size: 6
        });


    });

</script>
<form id="data-edit" class="form-horizontal" role="form" method="post" action="/contact/{{$id}}/edit_name">

    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Фамилия" name="Family" value="{{$contact->FamilyContact}}"  autofocus/>
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Имя" name="Name" value="{{$contact->NameContact}}"/>
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Отчество" name="SoName" value="{{$contact->SoNameContact}}"/>
        </div>

    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <select name="sex" class="selectpicker">

                    @if($contact->SexContact == 1)

                    <option selected="selected" value="1">Мужской</option>
                    <option  value="2">Женский</option>

                    @else
                    <option  value="1">Мужской</option>
                    <option selected="selected"  value="2">Женский</option>

                    @endif




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