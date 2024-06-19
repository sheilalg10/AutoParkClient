<?php

/**
 * Clase ServicioController
 * 
 * Esta clase controla las acciones relacionadas con los servicios
 */
class ServicioController {

    private $service;   // Objeto de la clase ServicioService para interactuar con el servicio de los servicios
    private $view;      // Objeto de la clase ServicioView para mostrar la información relacionada con los servicios 
    private $serviceVehiculo;   // Objeto de la clase VehiculoService para interactuar con el servicio de los vehiculos

     /**
     * Constructor de la clase ServicioController.
     * 
     * Se inicializan los objetos de los servicios y vistas necesarios para realizar las operaciones relacionadas
     * con los servicios.
     */
    public function __construct() {
        $this->service = new ServicioService();
        $this->view = new ServicioView();
        $this->serviceVehiculo = new VehiculoService();
    }

    /**
     * Metodo que obtiene y muestra la informacion de los servicios de un cliente
     */
    public function getAllServiciosCliente() {
        if (isset($_SESSION['Dni'])) {
            $servicios = $this->service->getServiciosCliente($_SESSION['Dni']);
            $this->view->getClienteServicio($servicios);
        }
    }

    /**
     * Metodo que obtiene y muestra la informacion de los servicios de un parking
     */
    public function getAllServiciosParking() {
        if (isset($_SESSION['Dni'])) {
            $servicios = $this->service->getServiciosParking($_GET['Id_parking']);
            $vehiculos = $this->serviceVehiculo->getVehiculosCliente($_SESSION['Dni']);
            $this->view->getServiciosParking($servicios);
            $this->view->formInsertServicio($servicios, $vehiculos);
        }
    }

    /**
     * Metodo que inserta un nuevo servicio para un cliente
     */
    public function insertServicio() {
        if (isset($_SESSION['Dni'])) {
            $fec_realizacion = $_POST['fec_realizacion'];
            $id_servicio = $_POST['Id_servicio'];
            $dni_cliente = $_SESSION['Dni'];
            $matricula = $_POST['matricula'];
            
            $result = $this->service->insertServicio($fec_realizacion, $id_servicio, $dni_cliente, $matricula);

            $servicios = $this->service->getServiciosCliente($_SESSION['Dni']);
            $this->view->getClienteServicio($servicios);
        }
    }

    /**
     * Metodo que elimina un servicio de un cliente
     */
    public function deleteServicioCliente() {
        $identificador = $_POST['Identificador'];
        $this->service->deleteServicioCliente($identificador);

        $servicios = $this->service->getServiciosCliente($_SESSION['Dni']);
        $this->view->getClienteServicio($servicios);
    }
}
