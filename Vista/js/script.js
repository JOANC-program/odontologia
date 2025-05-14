function consultarPaciente() {

    var url = "index.php?accion=ConsultarPaciente&documento=" +
        $("#asignarDocumento").val();
    $("#paciente").load(url, function () {
    });
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
});
function consultarPaciente() {
    var url = "index.php?accion=ConsultarPaciente&documento=" +
        $("#asignarDocumento").val();
    $("#paciente").load(url, function () {
    });
}
function mostrarFormulario() {
    documento = "" + $("#asignarDocumento").val();
    $("#PacDocumento").attr("value", documento);
    $("#frmPaciente").dialog('open');
}