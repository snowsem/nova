<form id="data-edit" class="form-horizontal" role="form" method="post" action="/{{$p}}/{{$id}}/add_telephone">

    <div class="form-group">

        <div class="col-sm-8">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Телефон" name="attr" autofocus/>
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control input-sm"
                   id="inputPassword3" placeholder="Дополнительно" name="opt"/>
        </div>
    </div>


    <input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });

</script>