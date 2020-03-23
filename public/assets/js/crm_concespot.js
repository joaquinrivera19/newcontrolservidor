/**
 * Funci�n que permite llenar el combo de Provincias dependiendo
 * de que se elija en el combo de Pa�s para la vista
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
 * Funci�n que convierte el select Marca a un Input text en caso de que se elija el Tipo
 * "Otros" en el select de Tipo de Marca
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


window.onload = function() {
    comprobar();
};


function comprobar() {
    
    document.form.con_nombre.required = true;
    document.form.localidad.required = true;
    
}



