/**
 * Seteo campos al cargar la página
 */
$(document).ready(function () {

    $("#modalpresta").change(function () {
        $('#coc_modprest').val($(this).val());
    });

    $("#selectcierre").change(function () {
        $('#coc_MotCierreNeg').val($(this).val());
    });

});

/**
 * Función que valida  que se ingrese números enteros o decimales en un campo
 * @param e
 * @param field
 * @returns {boolean}
 * @constructor
 */
function NumCheck(e, field) {
    key = e.keyCode ? e.keyCode : e.which;

    if (field.value !== "") {
        if ((field.value.indexOf(",")) > 0) {
            if (key > 47 && key < 58) {
                if (field.value === "")
                    return true;
                regexp = /[0-9]{1,10}[,][0-9]{1,3}$/;
                regexp = /[0-9]{2}$/;
                return !(regexp.test(field.value))
            }
        }
    }
    if (key > 47 && key < 58) {
        if (field.value === "")
            return true;
        regexp = /[0-9]{10}/;
        return !(regexp.test(field.value));
    }
    if (key === 44) {
        if (field.value === "")
            return false;
        regexp = /^[0-9]+$/;
        return regexp.test(field.value);

    }

    return false;
}

/**
 * Función que suma las cantidades ingresadas en los campos coc_cotizapro y coc_cotizaserv
 */
function fncSumar() {
    caja = document.forms["form"].elements;
    var numero1 = Number(caja["coc_cotizapro"].value);
    var numero2 = Number(caja["coc_cotizaserv"].value);
    resultado = numero1 + numero2;
    if (!isNaN(resultado)) {
        var num = numero1 + numero2;
        nu = num.toFixed(2);
        caja["coc_cotizatotal"].value = nu;

    }
}

/**
 * Función que permite llenar el combo de Productos dependiendo de que se elija en el combo de Clase de Producto
 */
jQuery(document).ready(function ($) {
    $('#select2').val('');
    $('#select1').val(3);
    $('#select1').change(function () {
        var id = $("#select1").val();
        $.get('productos/' + id,
            {option: $(this).val()},
            function (data) {
                var model = $('#select2');
                model.empty();

                $.each(data, function (index, element) {
                    model.append( "<option value='" + element.prod_codigo + "' data-type='"+ element.prod_tipo +"' id='tipo_prod-" + element.prod_codigo + "'> " + element.prod_tipo + " " + element.prod_nombre + "</option>" );
                });

            });

    });
});

jQuery(document).ready(function ($) {
    $('#select2').change(function () {
        var codigo = $('#select2').find(':selected').val();
        $('#text3').val($('#tipo_prod-'+codigo).data('type'));
    });
});



/**
 * Función que permite llenar el combo de Productos dependiendo
 * de que se elija en el combo de Clase de Producto para la vista
 * de editar Prospecto (form_prospecto.html)    
 */
jQuery(document).ready(function ($) {
    $('#select-clase').change(function () {
        var id = $("#select-clase").val();
        $.get('productos/' + id,
            {option: $(this).val()},
            function (data) {
                var model = $('#select-prod');
                model.empty();
                $.each(data, function (index, element) {
                    model.append("<option value='" + element.prod_codigo + "'>" + element.prod_nombre + "</option>");
                });
            });
    });
});


/**
 * Función que permite llenar el combo de Productos al cargar la vista
 * de editar Prospecto (form_prospecto.html)

jQuery(document).ready(function ($) {
    var id = $("#select-clase").val();
    $.get('productos/' + id,
        {option: $(this).val()},
        function (data) {
            var model = $('#select-prod');
            model.empty();
            $.each(data, function (index, element) {
                model.append("<option value='" + element.prod_codigo + "'>" + element.prod_nombre + "</option>");
            });
        });
});

 */

/**
 * Función que habilita o deshabilita el campo detalle de producto dependiendo la selección
 * en el combo de Clase de Producto
 */
function mostrar() {
    if (document.form.pro_clasprod.value != "2") {
        document.form.pro_detalleprod.readOnly = true;
        document.form.pro_detalleprod.value = "";
    }
    else {
        if (document.form.pro_clasprod.value == "2") {
            document.form.pro_detalleprod.readOnly = false;
            document.form.pro_detalleprod.value = "";
        }
    }
}

/**
 * Función que habilita y deshabilita campos dependiendo el combo estado
 */


window.onload = function() {
    comprobar();
};


/**
 * Función que setea todos los campos y deja los predeterminados
 */

function setear_campos_prosp(){
    setear_campos_create();
    document.form.coc_adjunto.disabled = true;
}

function setear_campos_edit() {
    $(':input','#default')
        .not(':button, :submit, :reset, :hidden')
        .removeAttr('disabled')
        .removeAttr('readOnly')
        .removeAttr('required');

    document.form.coc_adjunto.disabled = true;
    document.form.pro_codigo.readOnly = true;
    document.form.con_nombre.readOnly = true;
    document.form.pro_conces.readOnly = true;
    document.form.pro_categoria.disabled = true;
    document.form.pro_clasprod.disabled = true;
    document.form.pro_nombrecamp.disabled = true;
    document.form.pro_tiporig.disabled = true;
    document.form.pro_nombreorig.readOnly = true;
    document.form.pro_vendedor.disabled = true;
    document.form.pro_producto.disabled = true;
    document.form.pro_detalleprod.readOnly = true;

    document.form.coc_fecha.required = true;
    document.form.coc_detallecont.required = true;
    document.form.comp_fechaprox.required = true;
    document.form.comp_detalleprox.required = true;

}

function setear_campos_create() {

    $('.form-control').removeAttr("disabled").removeAttr("readOnly").removeAttr("required");

    document.form.pro_conces.readOnly = true;
    document.form.pro_conces.required = true;
    document.form.con_nombre.required = true;
    document.form.coc_fecha.required = true;
    document.form.coc_detallecont.required = true;
    document.form.comp_fechaprox.required = true;
    document.form.comp_detalleprox.required = true;
    document.form.pro_producto.required = true;

    document.form.pro_codigo.readOnly = true;
    document.form.coc_financia.disabled = true;
    document.form.coc_MotCierreNeg.disabled = true;
    document.form.coc_fechademo.disabled = true;
    document.form.coc_cotizatotal.readOnly = true;
    document.form.pro_detalleprod.readOnly = true;
    document.form.coc_feccierre.disabled = true;

}

function validar_prospecto(){

    document.form.coc_estado[2].disabled = false;
    document.form.coc_estado[1].disabled = false;

    document.form.coc_probcierre[0].disabled = false;
    document.form.coc_probcierre[2].disabled = false;

    if (document.form.editProsp.value == 3) {
        setear_campos_create();
    }
    if (document.form.editProsp.value == 2) {
        setear_campos_edit();
    }
    if (document.form.editProsp.value == 1) {
        setear_campos_prosp();
    }
}


function comprobar() {

    if (document.form.coc_estado.value <= 4) {
        validar_prospecto();
        document.form.coc_financia.disabled = false;
        if (document.form.coc_estado.value == 2 || document.form.coc_estado.value == 4) {
            document.form.coc_fechademo.disabled = false;
            document.form.coc_fechademo.required = true;

            document.form.coc_probcierre.value = 2;
            document.form.coc_probcierre[0].disabled = true;
            document.form.coc_probcierre[2].disabled = true;
        }
        if (document.form.coc_estado.value == 2) {
            document.form.coc_estado[2].disabled = true;
        }
        if (document.form.coc_estado.value == 3) {
            document.form.coc_estado[1].disabled = true;
        }
        if (document.form.coc_estado.value == 1 || document.form.coc_estado.value == 3) {
            document.form.coc_fechademo.disabled = true;
        }
    }

    if (document.form.coc_estado.value == 5) {
        validar_prospecto();

        document.form.coc_feccierre.disabled = false;
        document.form.coc_feccierre.required = true;
        document.form.coc_MotCierreNeg.disabled = false;

        document.form.comp_fechaprox.required = false;
        document.form.comp_detalleprox.required = false;

        document.form.comp_fechaprox.disabled = true;
        document.form.comp_vendeprox.disabled = true;
        document.form.comp_detalleprox.disabled = true;
    }
    
    if (document.form.coc_estado.value == 6 || document.form.coc_estado.value == 7) {
        validar_prospecto();
        if (document.form.coc_feccierre.value.length == 0) {
            document.form.coc_feccierre.disabled = false;
            document.form.coc_feccierre.required = true;
        }
        
        document.form.coc_cotizapro.readOnly = true;
        document.form.coc_cotizaserv.readOnly = true;
        document.form.coc_cantdias.readOnly = true;
        document.form.coc_canthoras.readOnly = true;
        document.form.coc_modprest.disabled = true;
    }

    if (document.form.coc_estado.value == 8) {
        validar_prospecto();
        document.form.coc_feccierre.disabled = false;
        document.form.coc_feccierre.required = true;

        document.form.comp_fechaprox.required = false;
        document.form.comp_detalleprox.required = false;

        document.form.comp_fechaprox.disabled = true;
        document.form.comp_vendeprox.disabled = true;
        document.form.comp_detalleprox.disabled = true;

        document.form.coc_cotizapro.readOnly = true;
        document.form.coc_cotizaserv.readOnly = true;
        document.form.coc_cantdias.readOnly = true;
        document.form.coc_canthoras.readOnly = true;
        document.form.coc_modprest.disabled = true;
    }

    if (document.form.coc_estado.value == "9") {
        validar_prospecto();
        document.form.coc_fecha.required = false;
        document.form.coc_detallecont.required = false;
        document.form.comp_fechaprox.required = false;
        document.form.comp_detalleprox.required = false;
    }

}


$(document).ready(function(){

    $('#but_finish').click(function(){

        var estado = document.form.coc_estado.value;
        var fechaprox = document.form.comp_fechaprox.value;
        var detalleprox = document.form.comp_detalleprox.value;

        if (estado == 9){
            $('#but_finish').attr('disabled', true);
            $('#but_finish').text('Guardando');

        }else{

            if((Date.parse(fechaprox)) && (detalleprox.length != 0)){
                $('#but_finish').attr('disabled', true);
                $('#but_finish').text('Guardando');
            }
        }

    });

});

//Prevents backspace except in the case of textareas and text inputs to prevent user navigation.
$(document).keydown(function (e) {
    var preventKeyPress;
    if (e.keyCode == 8) {
        var d = e.srcElement || e.target;
        switch (d.tagName.toUpperCase()) {
            case 'TEXTAREA':
                preventKeyPress = d.readOnly || d.disabled;
                break;
            case 'INPUT':
                preventKeyPress = d.readOnly || d.disabled ||
                    (d.attributes["type"] && $.inArray(d.attributes["type"].value.toLowerCase(), ["radio", "checkbox", "submit", "button"]) >= 0);
                break;
            case 'DIV':
                preventKeyPress = d.readOnly || d.disabled || !(d.attributes["contentEditable"] && d.attributes["contentEditable"].value == "true");
                break;
            default:
                preventKeyPress = true;
                break;
        }
    }
    else
        preventKeyPress = false;

    if (preventKeyPress)
        e.preventDefault();
});




