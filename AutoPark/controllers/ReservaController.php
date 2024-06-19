<?php

/**
 * Clase ReservaController
 * 
 * Esta clase controla las acciones relacionadas con las reservas
 */
class ReservaController{
    
    private $service;           // Objeto de la clase ReservaService para interactuar con el servicio de las reservas
    private $view;              // Objeto de la clase ReservaView para mostrar la información relacionada con las reservas
    private $serviceVehiculo;   // Objeto de la clase VehiculoService para interactuar con el servicio de los vehiculos

    /**
     * Constructor de la clase ReservaController.
     * 
     * Se inicializan los objetos de los servicios y vistas necesarios para realizar las operaciones relacionadas
     * con las reservas.
     */
    public function __construct() {
        $this->service = new ReservaService();
        $this->view = new ReservaView();
        $this->serviceVehiculo = new VehiculoService();
    }
    
    /**
     * Metodo que obtiene y muestra la informacion de las reservas de un cliente
     */
    public function getAllReservas() {
        if(isset($_SESSION['Dni'])){
            $reservas = $this->service->getReservasCliente($_SESSION['Dni']);
            $this->view->getReservaCliente($reservas);
        }
    }
    
    /**
     * Metodo que muestra el formulario de fechas
     */
    public function getFormFechaReserva() {
        if(isset($_SESSION['Dni'])){
            $this->view->formFechaReserva();
        }
    }
    
    /**
     * Metodo que obtiene y muestra la informacion de las plazas libres
     */
    public function getcontrolReserva() {
        $id_parking = $_GET['Id_parking'];
        $fec_entrada = $_POST['fec_entrada'];
        $fec_salida = $_POST['fec_salida'];
        
        $plazas = $this->service->getFechaReserva($id_parking, $fec_entrada, $fec_salida);
        $this->view->formFechaReserva();
        $this->view->getTablePlazas($plazas,$fec_entrada,$fec_salida);        
    }
    
    /**
     * Metodo que obtiene la informacion de los vehiculos de un cliente 
     * y muestra el formulario para insertar una nueva reserva
     */
    public function formInsert() {
        $identificador = $_POST['Identificador'];
        $fec_entrada = $_POST['fec_entrada'];
        $fec_salida = $_POST['fec_salida'];
        $vehiculos = $this->serviceVehiculo->getVehiculosCliente($_SESSION['Dni']);
        $this->view->formInsert($identificador, $vehiculos, $fec_entrada, $fec_salida);
    }
    
    /**
     * Metodo que inserta una nueva reserva y muestra todas las reservas de un cliente
     */
    public function insertReserva() {
        $fec_entrada = $_POST['fec_entrada'];
        $fec_salida = $_POST['fec_salida'];
        $identificador = $_POST['Identificador'];
        $dni_cliente = $_SESSION['Dni'];
        $matricula = $_POST['matricula'];
        $id_plaza = $_POST['Identificador'];
        
        $result = $this->service->insertResert($fec_entrada, $fec_salida, $identificador, $dni_cliente, $matricula, $id_plaza);
        $reservas = $this->service->getReservasCliente($_SESSION['Dni']);
        $this->view->getReservaCliente($reservas);                
    }
    
    /**
     * Metodo que elimina una reserva de un cliente
     */
    public function deleteReserva() {
        $identificador = $_POST['Identificador'];
        $this->service->deleteReserva($identificador);
        
        $reservas = $this->service->getReservasCliente($_SESSION['Dni']);
        $this->view->getReservaCliente($reservas); 
    }
}

