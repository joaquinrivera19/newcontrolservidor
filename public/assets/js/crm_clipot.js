/**
 * Seteo campos al cargar la página
 */
$(document).ready(function () {

    $("#selectcierre").change(function () {
        $('#cpc_motcierreneg').val($(this).val());
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
 * Función que suma las cantidades ingresadas en los campos cpc_valorsist y cpc_valorimpl
 */
function fncSumar() {
    caja = document.forms["form"].elements;
    var numero1 = Number(caja["cpc_valorsist"].value);
    var numero2 = Number(caja["cpc_valorimpl"].value);
    resultado = numero1 + numero2;
    if (!isNaN(resultado)) {
        var num = numero1 + numero2;
        nu = num.toFixed(2);
        caja["cpc_valortotal"].value = nu;

    }
}


/**
 * Función que permite llenar el combo de Provincias dependiendo
 * de que se elija en el combo de País para la vista
 * de Prospecto de Clientes Potenciales (form_clipotenciales2.html)
 */
jQuery(document).ready(function ($) {
    $('#select-pais').change(function () {
        var id = $("#select-pais").val();
        $.get('provincias/' + id,
            {option: $(this).val()},
            function (data) {
                var model = $('#select-provincia');
                model.empty();
                $.each(data, function (index, element) {
                    model.append("<option value='" + element.prov_codigo + "'>" + element.prov_nombre + "</option>");
                });
            });
    });
});

/**
 * Función que convierte el select Marca a un Input text en caso de que se elija el Tipo
 * "Otros" en el select de Tipo de Marca
 *
 */

var baseurl = $('input:text[name=url]').val();


$(document).ready(function () {
    $('#select-tipo').change(function () {
        var tipo = $('#select-tipo').val();
        if (tipo == 2) {
            $('#select-marca').replaceWith("<input type='text' class='form-control' name='cpp_marcadetalle' id='input-marca'>");
        } else {
            $('#input-marca').replaceWith("<select name='cpp_marca' class='form-control' id='select-marca'>");
            $.get(baseurl + '/marcas',
                function (data) {
                    var model = $('#select-marca');
                    model.empty();
                    $.each(data, function (index, element) {
                        model.append("<option value='" + index + "'>" + element + "</option>");
                    });
                    model.append('</select>');
                });
        }
    });
});

$(document).ready(function () {

    $('#fechafac').change(function(){
        var valueDate = document.getElementById('fechafac').value;

        if (!valueDate){
            document.form.cpp_numfac.required = false;
            document.form.cpp_numfac.value = "";

        }else{
            document.form.cpp_numfac.required = true;
        }

    });

});


/**
 * Función que al cargar la web se ejecute la funcion comprobar()
 */

window.onload = function() {
    comprobar();
};


/**
 * Función que setea todos los campos y deja los predeterminados
 */

function setear_campos_prosp(){
    setear_campos_create();
    
    document.form.cpc_adjunto.disabled = true;
    document.form.cpc_tipoarc.disabled = true;
}

function setear_campos_edit() {
    
    document.form.con_nombre.readOnly = true;
    document.form.cpp_conces.readOnly = true;
    document.form.cpp_codigo.readOnly = true;
    document.form.cpc_valortotal.readOnly = true;

    document.form.cpc_fecha.required = true;
    document.form.cpc_detallecont.required = true;
    document.form.cpcp_fechaprox.required = true;
    document.form.cpcp_detalleprox.required = true;

    document.form.cpp_pais.disabled = true;
    document.form.cpp_provincia.disabled = true;
    document.form.localidad.disabled = true;
    document.form.cpp_tipomarca.disabled = true;
    document.form.cpp_actividad.disabled = true;
    document.form.cpp_marca.disabled = true;
    document.form.cpp_tiporig.disabled = true;
    document.form.cpp_nombreorig.disabled = true;
    document.form.cpp_vendedor.disabled = true;
}


function setear_campos_create(){

    document.form.cpp_codigo.readOnly = true;
    document.form.cpp_conces.readOnly = true;
    document.form.cpc_valortotal.readOnly = true;

    document.form.con_nombre.required = true;
    document.form.localidad.required = true;
    document.form.cpc_fecha.required = true;
    document.form.cpc_detallecont.required = true;
    document.form.cpcp_fechaprox.required = true;
    document.form.cpcp_detalleprox.required = true;

    document.form.cpc_fechaimplemen.value = '1990';
    document.form.cpc_probcierre.value = 1;

    document.form.cpc_feccierre.readOnly = true;
    document.form.cpp_fechafac.readOnly = true;
    document.form.cpp_numfac.disabled = true;
    document.form.cpc_fechademo.readOnly = true;
    document.form.cpc_conformidad.disabled = true;
    document.form.cpc_motcierreneg.disabled = true;

    document.form.cpc_financia.value = 1;

    document.form.cpc_fechareact.readOnly = true;

}


function removeatt(){

    $('.form-control')
        .removeAttr('disabled')
        .removeAttr('readOnly')
        .removeAttr('required');

}

function validar_prospecto(){
    
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

/**
 * Función que habiltia o deshabilita campos en form_clipotenciales.blade
 */

function comprobar() {

    var estado = document.form.cpc_estado.value;
    
    if (estado == 1) {

        removeatt();
        validar_prospecto();

        return false;

    }

    if (estado == 2) {

        removeatt();
        validar_prospecto();

        document.form.cpc_fechademo.readOnly = false;
        document.form.cpc_fechademo.required = true;

        document.form.cpc_probcierre.value = 2;
        document.form.cpc_probcierre[0].disabled = true;
        document.form.cpc_probcierre[2].disabled = true;

        document.form.cpc_estado[2].disabled = true;

        return false;

    }


    if (estado == 3) {

        removeatt();
        validar_prospecto();

        document.form.cpc_estado[1].disabled = true;

        document.form.cpc_valorsist.required = true;
        document.form.cpc_valorimpl.required = true;
    }


    if (estado == 4) {

        removeatt();
        validar_prospecto();

        document.form.cpc_fechademo.readOnly = false;
        document.form.cpc_fechademo.required = true;

        document.form.cpc_probcierre.value = 2;
        document.form.cpc_probcierre[0].disabled = true;
        document.form.cpc_probcierre[2].disabled = true;
        document.form.cpc_valorsist.required = true;
        document.form.cpc_valorimpl.required = true;


    }


    if (estado == 5) {

        removeatt();
        validar_prospecto();

        document.form.cpc_feccierre.readOnly = false;
        document.form.cpc_feccierre.required = true;

        document.form.cpcp_fechaprox.required = false;
        document.form.cpcp_detalleprox.required = false;

        document.form.cpcp_fechaprox.disabled = true;
        document.form.cpcp_vendeprox.disabled = true;
        document.form.cpcp_detalleprox.disabled = true;

        document.form.cpc_motcierreneg.disabled = false;

        document.form.cpc_probcierre.value = 3;

        document.form.cpc_fechareact.readOnly = false;

    }


    if (estado == 6) {

        removeatt();
        validar_prospecto();

        document.form.cpc_fechaimplemen.value = '2016';

        var sisact = $('#sisact').val();
        var sisant = $('#sisant').val();

        document.form.cpc_sistemant.value = sisact;
        document.form.cpc_sistemact.value = '19';

        document.form.cpc_financia.value = 0;


        if (document.form.cpc_feccierre.value.length == 0) {
            document.form.cpc_feccierre.readOnly = false;
            document.form.cpc_feccierre.required = true;
        }

        document.form.cpc_valorsist.readOnly = true;
        document.form.cpc_valorimpl.readOnly = true;

        document.form.cpc_probcierre.value = 3;

    }


    if (estado == 7) {

        removeatt();
        validar_prospecto();

        document.form.cpc_fechaimplemen.value = '2016';

        var sisact = $('#sisact').val();
        var sisant = $('#sisant').val();

        document.form.cpc_sistemant.value = sisact;
        document.form.cpc_sistemact.value = '19';

        document.form.cpc_financia.value = 0;


        if (document.form.cpc_feccierre.value.length == 0) {
            document.form.cpc_feccierre.readOnly = false;
            document.form.cpc_feccierre.required = true;
        }

        document.form.cpc_valorsist.readOnly = true;
        document.form.cpc_valorimpl.readOnly = true;

        document.form.cpc_probcierre.value = 3;

    }


    if (estado == 8) {

        removeatt();
        validar_prospecto();

        document.form.cpc_fechaimplemen.value = '2016';

        var sisact = $('#sisact').val();
        var sisant = $('#sisant').val();

        document.form.cpc_sistemant.value = sisact;
        document.form.cpc_sistemact.value = '19';

        document.form.cpc_financia.value = 0;

        document.form.cpc_feccierre.readOnly = false;
        document.form.cpc_feccierre.required = true;

        document.form.cpcp_fechaprox.disabled = true;
        document.form.cpcp_vendeprox.disabled = true;
        document.form.cpcp_detalleprox.disabled = true;

        document.form.cpc_valorsist.readOnly = true;
        document.form.cpc_valorimpl.readOnly = true;
        document.form.cpc_fechareact.readOnly = false;

        document.form.cpc_probcierre.value = 3;

    }

    if (estado == 9) {

        removeatt();
        validar_prospecto();

        document.form.cpc_fecha.required = false;
        document.form.cpc_detallecont.required = false;
        document.form.cpcp_fechaprox.required = false;
        document.form.cpcp_detalleprox.required = false;

        document.form.cpc_fechareact.readOnly = false;
    }

}


$(document).ready(function(){

    $('#but_finish').click(function(){

        var estado = document.form.cpc_estado.value;
        var fechaprox = document.form.cpcp_fechaprox.value;
        var detalleprox = document.form.cpcp_detalleprox.value;

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

