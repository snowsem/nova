/**
 * Created by semenpatnickij on 12.01.16.
 */

modalAjax = {


    init: function(){

        function showError(XMLHttpRequest, textStatus, errorThrown) {
            console.log('Статус:'+textStatus+' Ошибка:'+errorThrown);
        };
        function showRequest(formData, jqForm, options) {
            var queryString = $.param(formData);
            var form = jqForm[0];
            //if ( form.NameContact.value == ""  )

                return true;

        };
        // вызов после получения ответа
        function showResponse(responseText, statusText) {
            //alert('Статус ответа сервера: ' + statusText + '\n\nТекст ответа сервера: \n' + responseText);
            if (responseText == 'error') {
                console.log('Статус:'+statusText+' Текст:'+responseText);
            } else if(responseText == 'success'){
                //$("#addClient").trigger("reset");
                //showClientCard(responseText);
                //$("#dialog").dialog("close");
                location.reload();
                //location.assign("/contacts/card/" + responseText);
                console.log('Статус:'+statusText+' Текст:'+responseText);
                $('#myModal').modal('hide');

                return false;
            } else {

                window.location = '/client/'+responseText;
            }
        };
        var options = {
            // элемент, который будет обновлен по ответу сервера
            /*
             target: "#dialog-message-content",
             beforeSubmit: showRequest, // функция, вызываемая перед передачей
             */
            beforeSubmit: showRequest, // функция, вызываемая перед передачей
            success: showResponse, // функция, вызываемая при получении ответа
            timeout: 3000, // тайм-аут
            error: showError
        };

        $('#myModal').on('show.bs.modal', function () {
            console.log('open modal');
            $('#Submit').removeAttr("disabled");
            $("form#data-edit").submit(function() {
                $(this).ajaxSubmit(options);
                return false;
            });
        });

        $('#myModal').on('hidden.bs.modal', function () {
            console.log('close modal');
        });

        $('#myModal #Submit').on('click', function () {
            console.log('submit');
            $("form#data-edit").submit();

            $('#Submit').attr('disabled', 'disabled');
            $("form#data-edit").unbind();
        });

    }



}

utilCard = {

    removeInCard: function() {
        $("#editContactClick .delete").on('click', function ()
        {
            if ( confirm( "Вы действительно хотите удалить\n"+$(this).attr("attrname")+"?" ) == true )
                $.get( ""+$(this).attr("value")).always( function() { location.reload(); } );
        });

    },

    editInCard: function() {
        $("#editContactClick .edit, .edit").on('click', function () {
            var title = $(this).attr("title");


            $(".modal-body").empty().load(($(this).attr("value")), function () {
                $(".modal-title").empty().html(title);

                $('#myModal').modal('show');
            });
        })

    },

    addInCard: function() {
        $("#editContactClick .plus-mid, #addTrigger").on('click', function () {
            //alert("Add");
            //$('#myModal').modal('show');
            $(".modal-body").html('asd')
            var title = $(this).attr("title");


            $(".modal-body").empty().load(($(this).attr("value")), function () {
                $(".modal-title").empty().html(title);

                $('#myModal').modal('show');
            });


        });
    },

    toggleContact: function() {
        $("#editContactClick #toggle ul>li").hover( function () {   $(this).children().last().toggle() } );

    },

    init: function() {
        this.removeInCard();
        this.toggleContact();
        this.editInCard();
        this.addInCard();
    }
}

$(function() {




    utilCard.init();
    modalAjax.init();





});



