<?php

/**
 * Clase IndexController
 * 
 * Esta clase controla las acciones relacionadas con el index.
 */

class IndexController{
    
    private $view;          // Objeto de la clase IndexView para mostrar la información relacionada con el index
    private $serviceResena; // Objeto de la clase ReseñaService para interactuar con el servicio de reseñas
    
     /**
     * Constructor de la clase IndexController.
     * 
     * Se inicializan los objetos de los servicios y vistas necesarios para realizar las operaciones relacionadas
     * con el index.
     */
    
    public function __construct() {
        $this->view = new IndexView();                  // Inicializar el objeto IndexView
        $this->serviceResena = new ReseñaService();     // Inicializar el objeto ReseñaService
    }
    
    /**
     * Metodo que obtiene las reseñas y muestra la pagina principal con las reseñas
     */
    public function showIndex() {
        $resena = $this->serviceResena->getAllResenas();
        // Decodificar los datos JSON de las reseñas
        $resena = json_decode($resena,true);
        $this->view->showIndex($resena);
    }
}

