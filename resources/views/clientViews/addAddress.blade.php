
<form id="data-edit" class="form-horizontal" role="form" method="post" action="/client/{{$id}}/add_address">


    <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Вид</label>
        <div class="col-lg-10">
            <input type="text" name="comment_address" class="form-control" id="street" placeholder="Фактический"><ul class="typeahead dropdown-menu"></ul>
            <input type="hidden" id="street_h">
        </div>
    </div>
    <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Индекс</label>
                <div class="col-lg-10">
                    <input type="text" name="index_address" class="form-control" id="inputEmail" placeholder="Индекс">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Cубъект РФ</label>
                <div class="col-lg-10">
                    <input type="text" name="sub_address"  class="form-control" id="subject_rf" placeholder="Cубъект РФ"><ul class="typeahead dropdown-menu"></ul>
                    <input type="hidden" id="subject_rf_h">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Город / н.п.</label>
                <div class="col-lg-10">
                    <input type="text" name="city_address" class="form-control" id="city" placeholder="Город / н.п."><ul class="typeahead dropdown-menu"></ul>
                    <input type="hidden" id="city_h">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Улица</label>
                <div class="col-lg-10">
                    <input type="text" name="street_address" class="form-control" id="street" placeholder="Улица"><ul class="typeahead dropdown-menu"></ul>
                    <input type="hidden" id="street_h">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label"></label>



                <div class="col-lg-3">

                    <input type="text" name="home_address" class="form-control" id="inputEmail" placeholder="Дом">
                </div>
                <div class="col-lg-3">

                    <input type="text" name="korp_address" class="form-control" id="inputEmail" placeholder="Корпус">
                </div>
                <div class="col-lg-3">

                    <input type="text" name="kv_address" class="form-control" id="inputEmail" placeholder="Квартира">
                </div></div>












    <input type="hidden" name="_token" value="{{csrf_token()}}">

</form>
