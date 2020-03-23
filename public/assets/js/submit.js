$(document).ready(function () {

    $('.submit_form').on('submit', function (e) {

        // ----- Comienza la seccion de los input checkbox

/*        var this_master = $(this);

        this_master.find('input[type="checkbox"]').each(function () {
            var checkbox_this = $(this);

            if (checkbox_this.is(":checked") == true) {
                checkbox_this.attr('value', '1');
            } else {
                checkbox_this.prop('checked', true);
                checkbox_this.attr('value', '0');
            }
        });*/

        // ----- Finaliza la seccion de los input checkbox

        // ----- Comienza la seccion de Alerta

        //e.preventDefault();
        $.gritter.add({
            title: "Información",
            text: "Se gurdaron los datos correctamente en la campaña.",
            //fade: true,
            //speed: "fast",
            sticky: false,
            time: '3000'
        });

        // ----- Finaliza la seccion de Alerta
    });

/*    $('#guardar_campania').on('submit', function (e) {

        var this_master = $(this);

        this_master.find('input[type="checkbox"]').each(function () {
            var checkbox_this = $(this);

            if (checkbox_this.is(":checked") == true) {
                checkbox_this.attr('value', '1');
            } else {
                checkbox_this.prop('checked', true);
                checkbox_this.attr('value', '0');
            }
        });

    });*/
});
