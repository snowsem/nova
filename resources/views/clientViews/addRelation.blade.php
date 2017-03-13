<script>
    $(document).ready(function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('#_token').attr('value') }
    });
    var make_id = $(this).find("wpClientId").val();
    //alert(make_id);
    var options = {
        ajax          : {
            url     : '/ajax/select_relation',
            type    : 'POST',
            dataType: 'json',

            data    : {
                q: make_id
            }
        },
        locale        : {
            emptyTitle: 'Поиск',
            searchPlaceholder: 'Поиск',
            currentlySelected: 'Выброн',
            statusInitialized: 'Наберите название'


        },
        log           : 3,
        preprocessData: function (data) {
            var  array = [];
            var i;
            var l = data.length;
            if (l) {
                for (i = 0; i < l; i++) {
                    array.push($.extend(true, data[i], {

                        text : data[i].ClientName.substring(0,50),
                        value: data[i].ClientId,
                        data : {

                        }
                    }));

                }

            }




            // You must always return a valid array when processing data. The
            // data argument passed is a clone and cannot be modified directly.
            return array;
        }

    };


    $('.selectpicker').selectpicker({style: 'btn-primary btn-sm',
        size: 6
    }).filter('.with-ajax').ajaxSelectPicker(options);
    // $('select').trigger('change');
    });
</script>
<form id="data-edit" class="form-horizontal" role="form" method="post" action="/client/{{$id}}/add_relation">
    <div class="form-group">

        <div class="col-sm-10">
            <select name="wpClientId" class="selectpicker with-ajax" data-show-subtext="true" data-live-search="true"  autofocus>
            </select>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-2 ">
            <select name="RelationType" class="selectpicker"  autofocus>
                @foreach($relation_type as $r)
                    <option value="{{$r->id}}">{{$r->relation_name}}</option>
                @endforeach
            </select>
        </div>
    </div>





    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

</form>
