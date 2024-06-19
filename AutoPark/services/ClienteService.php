<?php

/**
 * Clase ClienteService
 * Esta clase proporciona métodos para interactuar con el servicio de los clientes.
 */
class ClienteService {

    /**
     * Método para obtener un cliente específico.
     * 
     * Realiza una solicitud HTTP GET al servicio de clientes para obtener un cliente específico por su email y contraseña.
     * 
     * @param string $email             Email del cliente.
     * @param string $password          Contraseña del cliente.
     * @return string|array             Si la solicitud tiene éxito, devuelve los datos del cliente en formato JSON.
     *                                  De lo contrario, devuelve false.
     */
    public function getUser($email, $password) {
        // URL del servicio de los servicios de un cliente
        $urlservice = 'http://localhost/_servWeb/servAutoPark/Cliente.php?Email=' . $email . '&Password=' . $password;
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
     * Método para actualizar un cliente específico.
     * 
     * Realiza una solicitud HTTP PUT al servicio de clientes para actualizar la contraseña existente con los datos proporcionados
     * 
     * @param string $password          Contraseña del cliente.
     * @param string $email             Email del cliente.
     * @return string|array             Si la solicitud tiene éxito, devuelve los datos del cliente en formato JSON.
     *                                  De lo contrario, devuelve false.
     */
    public function updatePassword($password, $email) {
        // Datos a enviar para la actualización de la contraseña en formato JSON
        $update = json_encode(array("Password" => $password, "Email" => $email));
        // URL del servicio de pasajes para la actualización de la contraseña existente
        $urlservice = "http://localhost/_servWeb/servAutoPark/Cliente.php";
        // Iniciar una nueva sesión CURL
        $connection = curl_init();

        //Url de la petición
        curl_setopt($connection, CURLOPT_URL, $urlservice);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Content-Length: ' . mb_strlen($update)));
        //Tipo de petición
        curl_setopt($connection, CURLOPT_CUSTOMREQUEST, 'PUT');
        //Campos que van en el envío
        curl_setopt($connection, CURLOPT_POSTFIELDS, $update);
        //para recibir una respuesta
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
        // Ejecutar la solicitud CURL y almacenar la respuesta
        $res = curl_exec($connection);

        // Verificar si la solicitud fue exitosa
        if ($res) {
            // Si la solicitud tiene éxito, devolver los datos del cliente actualizados
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
        }
    }

    /**
     * Método para insertar un nuevo cliente
     * 
     * Realiza una solicitud HTTP POST al servicio de clientes para insertar un nuevo cliente con los datos proporcionados.
     * 
     * @param int $dni                  Dni del cliente
     * @param string $nombre            Nombre del cliente
     * @param string $primer_apellido   Primer apellido del cliente
     * @param string $segundo_apellido  Segundo apellido del cliente
     * @param date $fecha_nac           Fecha de nacimiento del cliente
     * @param string $telefono          Telefono del cliente
     * @param strig $direccion          Direccion del cliente
     * @param string $ciudad            Ciudad del cliente
     * @param string $email             Email del cliente
     * @param string $password          Password del cliente
     * @return string|array             Si la solicitud tiene éxito, devuelve los datos del cliente insertado en formato JSON.
     *                                  De lo contrario, devuelve null.
     */
    public function insertCliente($dni, $nombre, $primer_apellido, $segundo_apellido, $fecha_nac, $telefono, $direccion, $ciudad, $email, $password) {
        // Datos a enviar para la inserción del pasaje en formato JSON
        $insert = json_encode(array("Dni" => $dni, "Nombre" => $nombre, "Primer_apellido" => $primer_apellido, "Segundo_apellido" => $segundo_apellido, "Fec_nacimiento" => $fecha_nac, "Telefono" => $telefono, "Direccion" => $direccion, "Ciudad" => $ciudad, "Email" => $email, "Password" => $password));
        // URL del servicio de pasajes para la inserción de un nuevo cliente
        $urlservice = "http://localhost/_servWeb/servAutoPark/Cliente.php";
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
            // Si la solicitud tiene éxito, devolver los datos del cliente insertado
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
        }
    }
}
