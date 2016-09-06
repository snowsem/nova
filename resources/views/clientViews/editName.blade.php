<script>
    $(function() {
        $('.selectpicker').selectpicker({
            style: 'btn-primary btn-sm',
            size: 6
        });


    });

</script>
<form id="data-edit" class="form-horizontal" role="form" method="post" action="/client/{{$id}}/edit_name">

    <div class="form-group">

        <div class="col-sm-10">
            <input type="text" class="form-control  input-sm"
                   id="inputEmail3" placeholder="Название" name="name" value="{{$client->ClientName}}"  autofocus/>
        </div>

    </div>

    <div class="form-group">

        <div class="col-sm-4">
            <select name="opt" class="selectpicker">
                @foreach($prop_list as $a)
                    @if($a->ClientPropertyId == $client->ClientProperty)
                        <option selected="selected" value="{{$a->ClientPropertyId}}">{{$a->ClientPropertyName}}</option>

                    @else
                        <option value="{{$a->ClientPropertyId}}">{{$a->ClientPropertyName}}</option>

                    @endif


                @endforeach

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