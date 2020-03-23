$(document).ready(function () {
    
    $(".btn_campania").click(function () {

        var html = "";

        var cone_proceso = $(this).data('cone_proceso');
        var cone_conces = $(this).data('cone_conces');
        var cone_nombre = $(this).data('cone_nombre');

        var modal = $('#modal_estado').modal();
        modal.find('.modal-title').text('Agregar información de conexión al servidor de la Empresa');
        modal.find('.modal-body .cone_proceso input').val(cone_proceso);
        modal.find('.modal-body .cone_conces input').val(cone_conces);
        modal.find('.modal-body .cone_nombre input').val(cone_nombre);

        $("#delForm").attr('action', cone_conces);

        $.ajax({
            url: ('/controlservidor/public/info_conexiones/' + cone_conces),
            type: 'GET',
            dataType: 'json',
            cache: false,
            beforeSend: function () {
                $("#items_campania").hide();
            }
        }).done(function (data) {

            if (data.data != null) {

                $("#items_campania").empty();

                $("#items_campania").show();

                $.each(data.data, function (i, val) {

                    //console.log(data.data[i]);

                    html += "<tr>";
                    html += "<td>"+ data.data[i].cone_fechacarga +"</td>";
                    html += "<td>"+ data.data[i].cone_proceso +": " + data.data[i].cone_observa +"</td>";
                    html += "</tr>";

                });

                $("#items_campania").html(html);

            } else {
                //$("#mensaje_vacio").show();
            }

        });

    });


});