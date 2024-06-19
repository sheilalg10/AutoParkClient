<?php

/**
 * Clase LoginController
 * 
 * Esta clase controla las acciones relacionadas con el login
 */
class LoginController {

    private $view;              //Objeto de la clase LoginView para mostrar la informacion relacionada con el index
    private $serviceCliente;    //Objeto de la clase ClienteService para interactuar con el servicio de cliente

    /**
     * Constructor de la clase LoginController.
     * 
     * Se inicializan los objetos de los servicios y vistas necesarios para realizar las operaciones relacionadas
     * con el login.
     */
    public function __construct() {
        $this->serviceCliente = new ClienteService();
        $this->view = new LoginView();
    }

    /**
     * Metodo que muestra el formulario de inicio de sesion
     */
    public function showLogin() {
        $this->view->Login();
    }

    // Metodo que muestra el formulario de inicio de sesion y el error
    public function showErrorLogin() {
        $this->view->Login(false);
    }

    /**
     * Método que controla las sesiones del usuario
     * 
     * @param type $dni         Dni del cliente que inicia sesion
     * @param type $nombre      Nombre del cliente que inicia sesion
     */
    public function controlSesion($dni, $nombre) {
        //Variables de sesión del Dni del cliente y el nombre del cliente
        $_SESSION['Dni'] = $dni;
        $_SESSION['Nombre'] = $nombre;
    }

    /**
     * Método para controlar el acceso del usuario
     */
    public function controlUser() {
        // Obtiene la información del cliente llamando al servicio
        $user = $this->serviceCliente->getUser($_POST['email'], $_POST['password']);
        // Decodificar los datos JSON del cliente
        $user = json_decode($user, true);

        // Verifica si el acceso es correcto o fallido
        if ($user === false) {
            //Si el acceso es fallido, redirige a la pagina de inicio de sesión con un mensaje de error
            header("Location:index.php?controller=Login&action=showErrorLogin");
        } else {
            //Si el acceso es correcto, controla las sesiones y redirige a la página de parkings
            $this->controlSesion($user['Dni'], $user['Nombre']);

            header("Location:index.php?controller=Parking&action=getAllParkings");
        }
    }

    /**
     * Metodo que muestra el formulario de cambio de contraseña
     */
    public function showFormPass() {
        $this->view->formUpdate();
    }

    /**
     * Metodo que actualiza la contraseña de un cliente
     */
    public function controlUpdate() {
        $password = $_POST['password'];
        $email = $_POST['email'];

        $result = $this->serviceCliente->updatePassword($password, $email);
        header("Location:index.php?controller=Login&action=showLogin");
    }

    /**
     * Metodo que muestra el formulario de registro de un nuevo cliente
     */
    public function showFormRegister() {
        $this->view->FormRegister();
    }

    public function esMayorEdad($fechaNacimiento) {
        $fechaNacimiento = new DateTime($fechaNacimiento);
        $fechaActual = new DateTime();
        $diferencia = $fechaActual->diff($fechaNacimiento);

        return $diferencia->y >= 18;
    }

    /**
     * Metodo para insertar un nuevo cliente
     */
    public function controlInsert() {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $primer_apellido = $_POST['primerApellido'];
        $segundo_apellido = $_POST['segundoApellido'];
        $fecha_nac = $_POST['fec_nacimiento'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if ($this->esMayorEdad($fecha_nac)) {
            if ($password === $password2) {
                $result = $this->serviceCliente->insertCliente($dni, $nombre, $primer_apellido, $segundo_apellido, $fecha_nac, $telefono, $direccion, $ciudad, $email, $password);
                $this->view->Login();
            }else{
                $this->view->FormRegister();
            }
        } else {
            $this->view->FormRegister();
        }
    }
}
