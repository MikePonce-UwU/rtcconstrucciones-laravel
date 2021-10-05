$(function () {
    let cuerpoTabla = $('#tbody');
    $("#btnNuevaLinea").on('click', function (ev) {
        ev.preventDefault();
        addNuevoDetalle();
    });
    $("#enviarDatos").on('click', function () {
        mostrarDatosTabla();
    });
    function addNuevoDetalle() {
        if ($("#nombre").val() != '' && $("#nombre").val() != '' && $("#nombre").val() != '') {
            if ($("#nombre").hasClass('is-invalid') ||
                $("#cantidad").hasClass('is-invalid') ||
                $("#precio").hasClass('is-invalid')) {
                $("#nombre").removeClass('is-invalid');
                $("#cantidad").removeClass('is-invalid');
                $("#precio").removeClass('is-invalid');
            }
            let fila = document.createElement('tr');
            var id = 0;
            let td = document.createElement('td');
            td.innerText = ++id;
            fila.append(td);
            td = document.createElement('td');
            td.innerText = $("#ID_COMPRA").val();
            fila.append(td);
            td = document.createElement('td');
            td.innerText = $("#NOMBRE").val();
            fila.append(td);
            td = document.createElement('td');
            td.innerText = $("#CANTIDAD").val();
            fila.append(td);
            td = document.createElement('td');
            td.innerText = $("#PRECIO").val();
            fila.append(td);
            td = document.createElement('td');
            td.innerText = $("#ID_CATEGORIA").val();
            fila.append(td);
            let icon = document.createElement('i');
            $(icon).addClass('fas fa-trash');
            let botonEliminar = document.createElement('button');
            botonEliminar.type = 'button';
            botonEliminar.appendChild(icon);
            botonEliminar.value = id;
            $(botonEliminar).addClass('btn btn-danger');
            td = document.createElement('td');
            td.appendChild(botonEliminar);
            fila.append(td);
            cuerpoTabla.append(fila);
            $("#nombre").val('');
            $("#cantidad").val('');
            $("#precio").val('');
        } else {
            $("#nombre").addClass('is-invalid');
            $("#cantidad").addClass('is-invalid');
            $("#precio").addClass('is-invalid');
        }
    }
    function mostrarDatosTabla() {
        var a = new Array();
        var b = new Array();
        $("#tbody tr").each(function () {
            $(this).children('td').each(function () {
                b.push($(this).html());
            })
            a.push(b);
        })
        // console.log(a);
        $.ajax({
            type: 'POST',
            url: 'detalle-compras/store',
            data: {
                'detalles': a,
            },
            success: function (res) {
                console.log(res);
            },
        });
    }
})

// formulario ajax
