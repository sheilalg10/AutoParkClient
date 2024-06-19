<?php

/**
 * Clase ServicioService
 * Esta clase proporciona métodos para interactuar con el servicio de los servicios.
 */
class ServicioService{
        
    /**
     * Método para obtener los datos de los servicios de un cliente específico.
     * 
     * Realiza una solicitud HTTP GET al servicio de servicios para obtener los datos de los servicios
     * de un cliente específico por su dni
     * 
     * @param string $dni_cliente       Dni del cliente
     * @return string|array             Si la solicitud tiene éxito, devuelve los datos de los servicios de un cliente en formato JSON.
     *                                  De lo contrario, devuelve false.
     */
    public function getServiciosCliente($dni_cliente) {
        // URL del servicio de los servicios de los servicios de un cliente
        $urlservice = 'http://localhost/_servWeb/servAutoPark/Servicio.php?Dni_cliente='.$dni_cliente;
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
            // Si la solicitud tiene éxito, devolver los datos de los servicios de un cliente
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
            $message = "Página en mantenimiento";
            return $message;
        }
    }
    
    /**
     * Método para obtener los datos de los servicios de un parking específico.
     * 
     * Realiza una solicitud HTTP GET al servicio de servicios para obtener los datos de los servicios
     * de un parking específico por su identificador
     * 
     * @param string $id_parking        Identificador del parking
     * @return string|array             Si la solicitud tiene éxito, devuelve los datos de los servicios de un parking en formato JSON.
     *                                  De lo contrario, devuelve false.
     */
    public function getServiciosParking($id_parking) {
        // URL del servicio de los servicios de un parking
        $urlservice = 'http://localhost/_servWeb/servAutoPark/Servicio.php?Id_parking='.$id_parking;
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
            // Si la solicitud tiene éxito, devolver los datos de los servicios de un parking
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
            $message = "Página en mantenimiento";
            return $message;
        }
    }
    
    /**
     * Método para insertar un nuevo servicio al cliente
     * 
     * Realiza una solicitud HTTP POST al servicio de servicios para insertar un nuevo servicio a un cliente con los datos proporcionados.
     * 
     * @param date $fec_realizacion     Fecha de realizacion
     * @param int  $id_servicio         Identificador de servicio
     * @param int  $dni_cliente         Dni del cliente
     * @param int  $matricula           Matricula del vehiculo          
     * @return string|array             Si la solicitud tiene éxito, devuelve los datos del servicio insertado en formato JSON.
     *                                  De lo contrario, devuelve null.
     */
    public function insertServicio($fec_realizacion, $id_servicio, $dni_cliente, $matricula) {
        // Datos a enviar para la inserción del servicio en formato JSON
        $insert = json_encode(array("Fecha_realizacion" => $fec_realizacion, "Identificador" => $id_servicio, "Dni_cliente" => $dni_cliente, "Matricula" => $matricula, "Id_servicio" => $id_servicio));
        // URL del servicio de servicio para la inserción de un nuevo servicio a un cliente
        $urlservice = "http://localhost/_servWeb/servAutoPark/Servicio.php";
        // Iniciar una nueva sesión CURL
        $connection = curl_init();

        //Url de la petición
        curl_setopt($connection, CURLOPT_URL, $urlservice);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Content-Length: ' . mb_strlen($insert)));
        //Tipo de petición
        curl_setopt($connection, CURLOPT_POST, true);
        //Campos que van en el envío
        curl_setopt($connection, CURLOPT_POSTFIELDS, $insert);
        //para recibir una respuesta
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
        // Ejecutar la solicitud CURL y almacenar la respuesta
        $res = curl_exec($connection);

        // Verificar si la solicitud fue exitosa
        if ($res) {
            // Si la solicitud tiene éxito, devolver los datos del servicio insertado
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
        }
    }
    
    /**
     * Método para eliminar un servicio existente.
     * 
     * Realiza una solicitud HTTP DELETE al servicio de servicio para eliminar un servicio existente por su identificador
     * 
     * @param string $identificador Identificador del servicio
     * @return string|array         Si la solicitud tiene éxito, devuelve los datos del servicio eliminado en formato JSON.
     *                              De lo contrario, devuelve null
     */
    public function deleteServicioCliente($identificador) {
        // URL del servicio de pasajes para eliminar un servicio existente
        $urlservice = "http://localhost/_servWeb/servAutoPark/Servicio.php?Identificador=" . $identificador;
        // Iniciar una nueva sesión CURL
        $connection = curl_init();

        //Url de la petición
        curl_setopt($connection, CURLOPT_URL, $urlservice);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //Tipo de petición
        curl_setopt($connection, CURLOPT_CUSTOMREQUEST, 'DELETE');
        //para recibir una respuesta
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
        // Ejecutar la solicitud CURL y almacenar la respuesta
        $res = curl_exec($connection);

        // Verificar si la solicitud fue exitosa
        if ($res) {
            // Si la solicitud tiene éxito, devolver los datos del servicio existente
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
        }
    }
}

