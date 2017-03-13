
<script>

    $(function() {

        //$('#inputEmail3').blur();
        $('#inputEmail3').focus();

        function maskPhone() {
            var country = $('input[name=code]:checked', '#data-edit').val()
            switch (country) {
                case "1":
                    $("#inputEmail3").mask("+7 (999) 999-99-99");
                    break;
                case "2":
                    $("#inputEmail3").mask("+8 (999) 999-99-99");
                    break;
                case "3":
                    $("#inputEmail3").mask("+9 (999) 999-99-99");
                    break;
                case "4":
                    $("#inputEmail3").mask("+99 (999) 999-99-99");
                    break;
                case "5":
                    $("#inputEmail3").mask("+999 (999) 999-99-99");
                    break;
            }
        }
        maskPhone();
        $("input[name=code]:radio").change(function () {

            maskPhone();
            //$('#inputEmail3').focus();

    });
    });


</script>


<form id="data-edit" class="form-horizontal" role="form" method="post" action="/{{$p}}/{{$id}}/add_telephone">

    <div class="form-group">

        <div class="col-sm-5">
            <label for="phone">Маска </label><br>
            <input id="code" type="radio" name="code" value="1" checked>+7 <span id="padding-right-5"></span>
            <input id="code" type="radio" name="code" value="2">+8 <span id="padding-right-5"></span>
            <input id="code" type="radio" name="code" value="3">+X <span id="padding-right-5"></span>
            <input id="code" type="radio" name="code" value="4">+XX <span id="padding-right-5"></span>
            <input id="code" type="radio" name="code" value="5">+XXX


        </div>
        <div class="col-sm-4">
            <label for="phone">Телефон </label>

            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Телефон" name="attr"  autofocus/>
        </div>
        <div class="col-sm-3">
            <label for="phone">Дополнительно</label>
            <input type="text" class="form-control input-sm"
                   id="inputPassword3" placeholder="Дополнительно" name="opt"/>
        </div>
    </div>


    <input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>
