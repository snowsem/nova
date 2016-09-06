
<form id="data-edit" class="form-horizontal" role="form" method="post" action="/clients/add">


    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Наименование" name="Name"  autofocus/>
        </div>

    </div>







    <input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>
