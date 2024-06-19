<?php

/**
 * Clase ParkingService
 * Esta clase proporciona métodos para interactuar con el servicio de los parkings.
 */
class ParkingService {

    /**
     * Método para obtener todas los parkings.
     * 
     * Realiza una solicitud HTTP GET al servicio de reselas para obtener todos los registros de los parkings.
     * 
     * @return string|array     Si la solicitud tiene éxito, devuelve los datos de los parkings en formato JSON.
     *                          De lo contrario, devuelve un mensaje de error.
     */
    public function getAllParkings() {
        // URL del servicio de parkings
        $urlservice = "http://localhost/_servWeb/servAutopark/Parking.php";
        // Iniciar una nueva sesión CURL
        $connection = curl_init();

        //Url de la petición
        curl_setopt($connection, CURLOPT_URL, $urlservice);
        //Tipo de petición
        curl_setopt($connection, CURLOPT_HTTPGET, true);
        //Tipo de contenido de la respuesta
        curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //para recibir una respuesta
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
        // Ejecutar la solicitud CURL y almacenar la respuesta
        $res = curl_exec($connection);

        // Verificar si la solicitud fue exitosa
        if ($res) {
            // Si la solicitud tiene éxito, devolver los datos de los parkings
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
            $message = "Página en mantenimiento";
            return $message;
        }
    }
    
    /**
     * Método para obtener los datos de un parking específico.
     * 
     * Realiza una solicitud HTTP GET al servicio de reserva para obtener los datos de un parking
     * específico por su identificador
     * 
     * @param string $identificador     Identificador del parking
     * @return string|array             Si la solicitud tiene éxito, devuelve los datos de un parking en formato JSON.
     *                                  De lo contrario, devuelve false.
     */

    public function getOneParking($identificador) {
        // URL del servicio de los servicios de un parking
        $urlservice = 'http://localhost/_servWeb/servAutoPark/Parking.php?Identidicador=' . $identificador;
        // Iniciar una nueva sesión CURL
        $connection = curl_init();

        //Url de la petición
        curl_setopt($connection, CURLOPT_URL, $urlservice);
        //Tipo de petición
        curl_setopt($connection, CURLOPT_HTTPGET, true);
        //Tipo de contenido de la respuesta
        curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //para recibir una respuesta
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
        // Ejecutar la solicitud CURL y almacenar la respuesta
        $res = curl_exec($connection);

        // Verificar si la solicitud fue exitosa
        if ($res) {
            // Si la solicitud tiene éxito, devolver los datos de un parking
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
            $message = "Página en mantenimiento";
            return $message;
        }
    }
}
