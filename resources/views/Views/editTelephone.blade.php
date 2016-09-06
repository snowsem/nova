<form id="data-edit" class="form-horizontal" role="form" method="post" action="/edit_telephone/{{$id}}">

    <div class="form-group">

        <div class="col-sm-8">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Телефон" name="attr" value="{{$t->AttrTelephone}}" autofocus/>
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control input-sm"
                   id="inputPassword3" placeholder="Дополнительно" name="opt" value="{{$t->DopName}}"/>
        </div>
    </div>


    <input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });

</script>