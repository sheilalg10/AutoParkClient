<?php

/**
 * Clase ParkingController
 * 
 * Esta clase controla las acciones relacionadas con los parkings
 */
class ParkingController{
    
    private $service;           // Objeto de la clase ParkingService para interactuar con el servicio de parkings
    private $serviceResena;     // Objeto de la clase ReseñaService para interactuar con el servicio de reseñas
    private $view;              // Objeto de la clase ParkingView para mostrar la informacion relacionada con los parkings
    
    /**
     * Constructor de la clase ParkingController.
     * 
     * Se inicializan los objetos de los servicios y vistas necesarios para realizar las operaciones relacionadas
     * con los parkings.
     */
    public function __construct() {
        $this->service = new ParkingService();
        $this->serviceResena = new ReseñaService();
        $this->view = new ParkingView();
    }
    
    /**
     * Metodo para obtener la informacion de todos los parkings
     */
    public function getAllParkings() {
        $parkings = $this->service->getAllParkings();
        $parkings = json_decode($parkings,true);
        
        $this->view->showAllParking($parkings);
        $this->view->insertResena($parkings);
    }
    
    /**
     * Metodo para insertar una nueva reseña
     */
    public function insertResena() {
        $dni_cliente = $_SESSION['Dni'];
        $id_parking = $_POST['id_parking'];        
        $comentario = $_POST['comentario'];
        $puntuacion = $_POST['puntuacion'];
        
        $result = $this->serviceResena->insertResena($dni_cliente, $id_parking, $comentario, $puntuacion);
        
        $parkings = $this->service->getAllParkings();
        $parkings = json_decode($parkings,true);
        
        $this->view->showAllParking($parkings);
        $this->view->insertResena($parkings);
    }
    
}
