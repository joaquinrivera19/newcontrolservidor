$(document).ready(function () {


    $("#btn_todas").attr('disabled', false);
    $("#btn_activas").attr('disabled', true);


    $(".btn_campania").click(function () {
        
        var btn_campania = $(this).data('btn_campania');

        if (btn_campania == 1) {
            $("#btn_todas").attr('disabled', false);
            $("#btn_activas").attr('disabled', true);
        } else {
            $("#btn_todas").attr('disabled', true);
            $("#btn_activas").attr('disabled', false);
        }

        var html = "";

        $.ajax({
            url: ('/controlservidor/public/getcampanialist/' + btn_campania),
            type: 'GET',
            dataType: 'json',
            cache: false,
            beforeSend: function () {
                //$("#mensaje_vacio").hide();
                $("#items_campania").hide();
/*                $("#gif").html("<p align='center'><img src='{{asset('assets/ajax-loader.gif')}}' /> Cargando...</p>");
                $("#gif_campania").html("<p align='center'><img src='{{asset('assets/ajax-loader.gif')}}' /> Cargando...</p>");*/

            }
        }).done(function (data) {

/*            $("#gif").empty();
            $("#gif_campania").empty();*/

            if (data.data != null) {

                $("#items_campania").empty();

                //$("#mensaje_vacio").hide();
                $("#items_campania").show();

                $.each(data.data, function (i, val) {

                    //console.log(data.data[i]);

                    html += "<li>";
                    html += "<a class='buscar_campania' href='#' type='button' id='" + data.data[i].codigo + "' data-cam_codigo='" + data.data[i].codigo + "' data-cam_nombre='" + data.data[i].nombre + "'><i class='fa fa-angle-right'></i>" + data.data[i].nombre + "</a>";
                    html += "<a style='float:right'; id='vercamp_" + data.data[i].codigo + "' class='btn btn-default btn-xs buscar_versiones_campania' data-vercamp='" + data.data[i].codigo + "' data-vercamp_nombre='" + data.data[i].nombre + "'><i class='fa fa-list'></i> Ver Versiones </a>";
                    html += "<p class='m-bot-none text-right' style='padding-top: 10px;'>";
                    html += "<span class='label label-default marg'>Fecha " + data.data[i].fec_limite +"</span>";
                    html += "<span class='label label-success marg'>Act: " + data.data[i].actualizadas +"</span>";
                    html += "<span class='label label-primary marg'>Total: " + data.data[i].total +"</span>";
                    html += "</p>";
                    html += "</li>";

                });

                $("#items_campania").html(html);

            } else {
                //$("#mensaje_vacio").show();
            }

        });

    });


});