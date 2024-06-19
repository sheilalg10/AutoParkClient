<?php

/**
 * Clase VehiculoService
 * Esta clase proporciona métodos para interactuar con el servicio de los vehiculos.
 */
class VehiculoService {

    /**
     * Método para obtener los datos de los vehiculos de un cliente específico.
     * 
     * Realiza una solicitud HTTP GET al servicio de vehiculos para obtener los datos de los servicios
     * de un cliente específico por su dni
     * 
     * @param string $dni_cliente       Dni del cliente
     * @return string|array             Si la solicitud tiene éxito, devuelve los datos de los vehiculos de un cliente en formato JSON.
     *                                  De lo contrario, devuelve false.
     */
    public function getVehiculosCliente($dni_cliente) {
        // URL del servicio de los vehiculos de un cliente
        $urlservice = 'http://localhost/_servWeb/servAutoPark/Vehiculo.php?Dni_cliente=' . $dni_cliente;
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
            // Si la solicitud tiene éxito, devolver los datos de los vehiculos de un cliente
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
            $message = "Página en mantenimiento";
            return $message;
        }
    }

    /**
     * Método para insertar un nuevo vehiculo
     * 
     * Realiza una solicitud HTTP POST al servicio de vehiculos para insertar un nuevo vehiculo con los datos proporcionados.
     * 
     * @param string $matricula   Matricula del vehiculo
     * @param string $marca       Marca del vehiculo
     * @param string $modelo      Modelo del vehiculo
     * @param string $tipo        Tipo de vehiculo (Coche o Moto)
     * @param string $motor       Tipo de motor (Electrico, Hibrido, Termico)
     * @return string|array       Si la solicitud tiene éxito, devuelve los datos del vehiculo insertado en formato JSON.
     *                            De lo contrario, devuelve null.
     */
    public function insertVehiculo($matricula, $marca, $modelo, $tipo, $motor) {
        // Datos a enviar para la inserción del vehiculo en formato JSON
        $insert = json_encode(array("Matricula" => $matricula, "Marca" => $marca, "Modelo" => $modelo, "Tipo" => $tipo, "Motor" => $motor));
        // URL del servicio de pasajes para la inserción de un nuevo pasaje
        $urlservice = "http://localhost/_servWeb/servAutoPark/Vehiculo.php";
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

    /**
     *  Método para insertar un nuevo vehiculo con el cliente al que le pertenece
     * 
     * Realiza una solicitud HTTP POST al servicio de vehiculo para insertar un nuevo vehiculo y el cliente al que le pertenece con los datos proporcionados.
     * 
     * @param string $matricula         Matricula del vehiculo
     * @param string $dni               Dni del cliente al que le pertenece el vehiculo
     * @return string|array             Si la solicitud tiene éxito, devuelve los datos del vehiculo y el cliente insertado en formato JSON.
     *                                  De lo contrario, devuelve null.
     */
    public function insertClienteVehiculo($matricula, $dni) {
        // Datos a enviar para la inserción del pasaje en formato JSON
        $insert = json_encode(array("Dni_cliente" => $dni, "Matricula" => $matricula));
        // URL del servicio de pasajes para la inserción de un nuevo vehiculo y el cliente
        $urlservice = "http://localhost/_servWeb/servAutoPark/ClienteVehiculo.php";
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
            // Si la solicitud tiene éxito, devolver los datos del vehiculo y el cliente insertado
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
        }
    }

    /**
     * Método para eliminar un vehiculo existente.
     * 
     * Realiza una solicitud HTTP DELETE al servicio de vehiculo para eliminar un vehiculo existente por su matricula
     * 
     * @param string $matricula     Matricula del vehiculo
     * @return string|array         Si la solicitud tiene éxito, devuelve los datos del vehiculo eliminado en formato JSON.
     *                              De lo contrario, devuelve null
     */
    public function deleteVehiculo($matricula) {
        // URL del servicio de vehiculo para eliminar un vehiculo existente
        $urlservice = "http://localhost/_servWeb/servAutoPark/Vehiculo.php?Matricula=" . $matricula;
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
            // Si la solicitud tiene éxito, devolver los datos del vehiculo eliminado
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
        }
    }
}
