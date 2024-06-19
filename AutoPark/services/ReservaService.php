<?php

/**
 * Clase ReservaService
 * Esta clase proporciona métodos para interactuar con el servicio de los servicios.
 */
class ReservaService{
    
    /**
     * Método para obtener los datos de los servicios de un cliente específico.
     * 
     * Realiza una solicitud HTTP GET al servicio de reserva para obtener los datos de las reservas de 
     * un cliente específico por su dni.
     * 
     * @param string $dni               Dni del cliente
     * @return string|array             Si la solicitud tiene éxito, devuelve los datos de las reservas de un cliente en formato JSON.
     *                                  De lo contrario, devuelve false.
     */
    public function getReservasCliente($dni) {
         // URL del servicio de reservas
        $urlservice = "http://localhost/_servWeb/servAutopark/Reserva.php?Dni_cliente=".$dni;
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
        if($res){
            // Si la solicitud tiene éxito, devolver los datos de las reservas del cliente
            return $res;
        }else{
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
            $message = "Página en mantenimiento";
            return $message;
        }
    }
    
    /**
     * Metodo para insertar una nueva reserva.
     * 
     * Realiza una solicitud HTTP POST al servicio de reserva para insertar una nueva reserva
     * 
     * @param type $fec_entrada         Fecha de entrada
     * @param type $fec_salida          Fecha de salida
     * @param type $identificador       Identificador de la plaza
     * @param type $dni_cliente         Dni del cliente que quiere reservar la plaza
     * @param type $matricula           Matricula del vehiculo
     * @param type $id_plaza            Identificador de la plaza
     * @return string|array             Si la solicitud tiene exito, devuelve los datos de la reserva insertada en formato JSON,
     *                                  De lo contrario, devuelve null
     */
    public function insertResert($fec_entrada, $fec_salida, $identificador, $dni_cliente, $matricula, $id_plaza) {
        // Datos a enviar para la inserción del vehiculo en formato JSON
        $insert = json_encode(array("Fec_entrada" => $fec_entrada, "Fec_salida" => $fec_salida, "Identificador" => $identificador, "Dni_cliente" => $dni_cliente, "Matricula" => $matricula, "Id_plaza" => $id_plaza));
        // URL del servicio de pasajes para la inserción de un nuevo pasaje
        $urlservice = "http://localhost/_servWeb/servAutoPark/Reserva.php";
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
            // Si la solicitud tiene éxito, devolver los datos del vehiculo insertado
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
        }
    }
    
    public function getFechaReserva($id_parking, $fec_entrada, $fec_salida) {
        // URL del servicio de reservas
        $urlservice = "http://localhost/_servWeb/servAutopark/Reserva.php?Id_parking=".$id_parking ."&Fec_entrada=".$fec_entrada."&Fec_salida=".$fec_salida;
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
        if($res){
            // Si la solicitud tiene éxito, devolver los datos de las reservas del cliente
            return $res;
        }else{
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
            $message = "Página en mantenimiento";
            return $message;
        }
    }
    
    public function deleteReserva($identificador) {
        // URL del servicio de reserva para eliminar una reserva existente
        $urlservice = "http://localhost/_servWeb/servAutoPark/Reserva.php?Identificador=" . $identificador;
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
            // Si la solicitud tiene éxito, devolver los datos de la reserva eliminada
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
        }
    }
}

