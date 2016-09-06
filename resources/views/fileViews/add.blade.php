
<form id="data-edit" class="form-horizontal" role="form" method="post" action="/file/add">

    <div class="form-group">
        <div class="col-sm-4">

            <span id="add_btn-file" style="cursor: pointer;" class=" label label-info">Добавить еще поле</span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4">
            <input type="file" name="file[]" id="exampleInputFile">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Примечание" name="comment[]" />
        </div>
    </div>
    <div class="separator"></div>
    <div id="after_file"></div>







    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_cid" value="{{ $id }}">
    <input type="hidden" name="_param" value="{{ $param }}">


</form>


