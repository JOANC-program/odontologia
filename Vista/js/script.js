function insertarPaciente() {
    queryString = $("#agregarPaciente").serialize();
    url = "index.php?accion=ingresarPaciente&" + queryString;
    $("#paciente").load(url);
    $("#frmPaciente").dialog('close');
}
function cancelar() {
    $(this).dialog('close');
}
$(document).ready(function () {
    $("#frmPaciente").dialog({
        autoOpen: false,
        height: 310,
        width: 400,
        modal: true,
        buttons: {
            "Insertar": insertarPaciente,
            "Cancelar": cancelar
        }
    });

    $("#frmMedico").dialog({
        autoOpen: false,
        height: 310,
        width: 400,
        modal: true,
        buttons: {
            "Insertar": insertarMedico,
            "Cancelar": cancelar
        }
    });
    
    // Modal editar médico
    $("#frmEditarMedico").dialog({
        autoOpen: false,
        height: 310,
        width: 400,
        modal: true,
        buttons: {
            "Guardar Cambios": function () {
                editarMedico();
            },
            "Cancelar": cancelar
        }
    });

    $("#abrirModalAgregarMedico").click(function (e) {
        e.preventDefault();
        $("#agregarMedico")[0].reset();
        $("#frmMedico").dialog('open');
    });

    // Evento para abrir el modal y cargar datos
    $(".btnEditarMedico").click(function (e) {
        e.preventDefault();
        $("#editMedIdentificacion").val($(this).data("id"));
        $("#editMedNombres").val($(this).data("nombres"));
        $("#editMedApellidos").val($(this).data("apellidos"));
        $("#frmEditarMedico").dialog('open');
    });

    // Validación del formulario de registro
    $(".registration-form").on("submit", function (e) {
        console.log("Validando registro...");
        const id = $("#id-number").val() ? $("#id-number").val().trim() : "";
        const nombre = $("#first-name").val() ? $("#first-name").val().trim() : "";
        const apellido = $("#last-name").val() ? $("#last-name").val().trim() : "";
        const sexo = $("#sexo").val();
        const fecha = $("#birth-date").val();
        const correo = $("#email").val() ? $("#email").val().trim() : "";
        const pass = $("#password").val();
        const pass2 = $("#confirm-password").val();
        const terms = $("#terms").is(":checked");

        if (!id || !nombre || !apellido || !sexo || !fecha || !correo || !pass || !pass2) {
            alert("Por favor, complete todos los campos obligatorios.");
            e.preventDefault();
            return false;
        }
        if (pass !== pass2) {
            alert("Las contraseñas no coinciden.");
            e.preventDefault();
            return false;
        }
        if (!terms) {
            alert("Debe aceptar los términos y condiciones.");
            e.preventDefault();
            return false;
        }
    });
});
function consultarPaciente() {
    var url = "index.php?accion=ConsultarPaciente&documento=" + $("#asignarDocumento").val();
    $("#paciente").load(url, function (response) {
        if (response.indexOf("<!--PACIENTE_EXISTE-->") !== -1) {
            $("#asignarEnviar").prop("disabled", false);
        } else {
            $("#asignarEnviar").prop("disabled", true);
        }
    });
}
function mostrarFormulario() {
    documento = "" + $("#asignarDocumento").val();
    $("#PacDocumento").attr("value", documento);
    $("#frmPaciente").dialog('open');
}
function cargarHoras() {
    if (($("#medico").val() == -1) || ($("#fecha").val() == "")) {
        $("#hora").html("<option value='-1' selected='selected'>--Selecione la hora </option>")
    } else {
        queryString = "medico=" + $("#medico").val() + "&fecha=" + $("#fecha").val();
        url = "index.php?accion=consultarHora&" + queryString;
        $("#hora").load(url);
    }
}
function seleccionarHora() {
    if ($("#medico").val() == -1) {
        alert("Debe seleccionar un médico");
    } else if ($("#fecha").val() == "") {
        alert("Debe seleccionar una fecha");
    }
    else if ($("#consultorio").val() == -1) {
        alert("Debe seleccionar un consultorio");
    }
}
function enviar() {
    if ($("#medico").val() == -1) {
        alert("Debe seleccionar un médico");
    } else if ($("#fecha").val() == "") {
        alert("Debe seleccionar una fecha");
    }
    else if ($("#consultorio").val() == -1) {
        alert("Debe seleccionar un consultorio");
    }
     else if ($("#hora").val() == -1) {
        alert("Debe seleccionar una Hora");
    }
}
function consultarCita() {
    url = "index.php?accion=consultarCita&consultarDocumento=" +
        $("#consultarDocumento").val();
    $("#paciente2").load(url);
}
function cancelarCita() {
    url = "index.php?accion=cancelarCita&cancelarDocumento=" +
        $("#cancelarDocumento").val();
    $("#paciente3").load(url);
}
function confirmarCancelar(numero) {
    if (confirm("Esta seguro de cancelar la cita " + numero)) {
        $.get("index.php", { accion: 'confirmarCancelar', numero: numero }, function (mensaje) {
            alert(mensaje);
            cancelarCita() ;

        });
    }
    $("#cancelarConsultar").trigger("click");
}
function insertarMedico() {
    var queryString = $("#agregarMedico").serialize();
    var url = "index.php?accion=guardarMedico";
    $.post(url, queryString, function () {
        location.reload();
    });
    $("#frmMedico").dialog('close');
}
function editarMedico() {
    var datos = $("#editarMedico").serialize();
    $.post("index.php?accion=guardarEdicionMedico", datos, function () {
        location.reload();
    });
    $("#frmEditarMedico").dialog('close');
}
$(document).on("click", ".btnEliminarMedico", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    if (confirm("¿Estás seguro de que deseas eliminar este médico?")) {
        $.post("index.php?accion=guardarEliminacionMedico", { MedIdentificacion: id }, function () {
            location.reload();
        });
    }
});