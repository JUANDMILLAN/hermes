<?php

// Requerimos los controladores y modelos necesarios para manipular los datos
require_once "../controladores/equipos.controlador.php";
require_once "../modelos/equipos.modelo.php";

class AjaxEquipos {
    
    /* ==================================================
    PROPIEDAD PÚBLICA PARA RECIBIR EL ID DEL EQUIPO
    ================================================== */
    public $idEquipo; // Esta propiedad recibe el id del equipo enviado desde el JS

    /* ==================================================
    MÉTODO PARA EDITAR EQUIPO
    ================================================== */
    public function ajaxMostrarEquipo() {
        // Definimos el campo de la tabla por el cual haremos la búsqueda
        $item = "equipo_id";
        // Asignamos el valor que viene desde el formulario (JS)
        $valor = $this -> idEquipo;

        // Llamamos al controlador para obtener los datos del equipo específico
        $respuesta = ControladorEquipos::ctrMostrarEquipos($item, $valor);

        // Devolvemos los datos en formato JSON para que el JS los pueda usar
        echo json_encode($respuesta);
    }

    public function ajaxMostrarDatosCuentadante(){
        $item = "equipo_id";
        $valor = $this -> idEquipo;
        $respuesta = ControladorEquipos::ctrRealizarTraspasoCuentadante($item, $valor);
        echo json_encode($respuesta);
    }

}

// if (isset($_POST["idEquipo"])) {
//     $editar = new AjaxEquipos();
//     $editar -> idEquipo = $_POST["idEquipo"];
//     $editar -> ajaxMostrarDatosCuentadante();
// }

/* ==================================================
EJECUCIÓN DEL CÓDIGO CUANDO SE ENVÍA EL FORMULARIO
================================================== */

// Validamos que se haya enviado el dato "idEquipo" mediante POST desde Js
if (isset($_POST["idEquipo"])) {
    // Creamos una instancia de la clase AjaxEquipos
    $editar = new AjaxEquipos();
    
    // Asignamos el id recibido desde el POST a la propiedad de la clase
    $editar -> idEquipo = $_POST["idEquipo"];
    
    // Ejecutamos el método que consultará y devolverá los datos
    $editar -> ajaxMostrarEquipo();
}


