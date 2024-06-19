<?php

// Incluir servicios, vistas y controladores necesarios
//SERVICES
include 'services/ReseñaService.php';
include 'services/ClienteService.php';
include 'services/ParkingService.php';
include 'services/VehiculoService.php';
include 'services/ServicioService.php';
include 'services/ReservaService.php';

//VIEWS
include 'views/IndexView.php';
include 'views/LoginView.php';
include 'views/ParkingView.php';
include 'views/VehiculoView.php';
include 'views/ServicioView.php';
include 'views/ReservaView.php';

//CONTROLLERS
include 'controllers/IndexController.php';
include 'controllers/LoginController.php';
include 'controllers/ParkingController.php';
include 'controllers/VehiculoController.php';
include 'controllers/ServicioController.php';
include 'controllers/ReservaController.php';

// Define la accion y el controlador por defecto
define('ACCION_DEFECTO', 'showIndex');
define('CONTROLADOR_DEFECTO', 'Index');

// Función que carga una acción en el controlador dado
function loadAction($controllerObjet) {
    // Verifica si la acción está definida y que existe en el controlador
    if (isset($_GET['action']) && method_exists($controllerObjet, $_GET['action'])) {
        controllerSession();

        // Ejecutar la acción en el controlador
        executeAction($controllerObjet, $_GET['action']);
    } else {
        // Si la acción no esta definida, ejecutar la acción por defecto
        executeAction($controllerObjet, ACCION_DEFECTO);
    }
}

// Función que ejecuta una acción en un controlador
function executeAction($controllerObjet, $action) {
    $Action = $action;
    $controllerObjet->$Action();
}

// Función que carga un controlador
function loadController($nameController) {
    $controller = $nameController . "Controller";

    // Verifica si la clase del controlador existe
    if (class_exists($controller)) {
        return new $controller();
    } else {
        // Si la clase no existe, muestra un mensaje de error
        die("El controlador no existe");
    }
}

//Función que maneja la sesión del usuario
function controllerSession() {
    // Verifica que el controlador es diferente a 'user' y que existen las variables de sesión
    if ($_GET['controller'] != "Login") {
        if (!isset($_SESSION['Dni']) || !isset($_SESSION['Nombre'])) {
            //Redirige a la página de inicio si no hay sesión
            header("Location: index.php");
        }
    }

    // Cierra la sesión si se envia el formulario de cierre de sesión
    if (isset($_POST['close_session'])) {
        session_destroy();
        setcookie(session_name(), 123, time() - 3600);
        header("Location: index.php");
    }
}

session_start();

// Carga el controlador y ejecuta la acción correspondiente
if (isset($_GET['controller'])) {
    $controller = loadController($_GET['controller']);
    loadAction($controller);
} else {
    $controller = loadController(CONTROLADOR_DEFECTO);
    loadAction($controller);
}

