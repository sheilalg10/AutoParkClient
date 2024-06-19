<?php

/**
 * Clase VehiculoController
 * 
 * Esta clase controla las acciones relacionadas con los vehiculos
 */
class VehiculoController {

    private $service;   // Objeto de la clase VehiculoService para interactuar con el servicio de vehiculos
    private $view;      // Objeto de la clase VehiculoView para mostrar la informacion relacionada con los vehiculos

    /**
     * Constructor de la clase VehiculoController.
     * 
     * Se inicializan los objetos de los servicios y vistas necesarios para realizar las operaciones relacionadas
     * con los vehiculos.
     */
    public function __construct() {
        $this->service = new VehiculoService();
        $this->view = new VehiculoView();
    }

    /**
     * Metodo que obtiene y muestra la informacion de todos los vehiculos de un cliente
     */
    public function getAllVehiculos() {
        if (isset($_SESSION['Dni'])) {
            $vehiculos = $this->service->getVehiculosCliente($_SESSION['Dni']);
            $this->view->getAllVehiculosCliente($vehiculos);
            $this->view->formInsertVehiculo();
        }
    }

    /**
     * Metodo que inserta un nuevo vehiculo de un cliente
     */
    public function insertVehiculo() {
        $matricula = $_POST['matricula'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $tipo = $_POST['tipo'];
        $motor = $_POST['motor'];
        $dni = $_SESSION['Dni'];

        $result = $this->service->insertVehiculo($matricula, $marca, $modelo, $tipo, $motor);
        $res = $this->service->insertClienteVehiculo($matricula, $dni);
        $vehiculos = $this->service->getVehiculosCliente($_SESSION['Dni']);

        $this->view->getAllVehiculosCliente($vehiculos);
        $this->view->formInsertVehiculo();
    }
    
    /**
     * Metodo que borra un vehiculo de un cliente
     */
    public function deleteVehiculo() {
        $matricula = $_POST['matricula'];
        $this->service->deleteVehiculo($matricula);
                
        $vehiculos = $this->service->getVehiculosCliente($_SESSION['Dni']);

        $this->view->getAllVehiculosCliente($vehiculos);
        $this->view->formInsertVehiculo();        
    }
}
