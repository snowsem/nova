/**
 * Created by snowsem on 28.01.2016.
 */


$(function() {
    $(document).on("click","#add_btn-file",function() {
        //alert('add file table');
        function addField(){
            var str = '<div class="form-group">'+
                '<div class="col-sm-4">' +
               '<input type="file" name="file[]" id="exampleInputFile">' +
                '</div>' +
                '</div>' +

                '<div class="form-group">' +
                '<div class="col-sm-6">' +
                '<input type="text" class="form-control  input-sm"'+
                'id="inputEmail3" placeholder="Примечание" name="comment[]" />' +
               '</div>' +
                '</div>' +
                '<div class="separator"></div>' +
                '<div id="after_file"></div>';
            $(str).insertAfter($('#after_file').last());
        };
        addField();

    });

});

