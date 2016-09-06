<form id="data-edit" class="form-horizontal" role="form" method="post" action="/admin/add_ticket">



    <div class="form-group">
        <div class="col-sm-4">
            <input type="text" class="form-control  input-sm"
                   id="datepicker" placeholder="Дата звонка" name="CallDate" />
        </div>

        <div class="col-sm-2">

            <input type="text" class="form-control  input-sm"
                   id="datepicker1" placeholder="Время" name="CallTime" />
        </div>

    </div>

    <div class="form-group">

        <div class="col-sm-10">
            <textarea class="form-control" placeholder="Текст"  name="CallText"  rows="3"> </textarea>

        </div>

    </div>








    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="CallContragent" value="{{ $id }}">

</form>


