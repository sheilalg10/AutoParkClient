<?php

/**
 * Clase ReseñaService
 * Esta clase proporciona métodos para interactuar con el servicio de las reseñas.
 */
class ReseñaService {
    
    /**
     * Método para obtener todas las reseñas.
     * 
     * Realiza una solicitud HTTP GET al servicio de reseñas para obtener todos los registros de las reseñas.
     * 
     * @return string|array     Si la solicitud tiene éxito, devuelve los datos de las reseñas en formato JSON.
     *                          De lo contrario, devuelve un mensaje de error.
     */
    public function getAllResenas() {
         // URL del servicio de reseñas
        $urlservice = "http://localhost/_servWeb/servAutopark/Resena.php";
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
            // Si la solicitud tiene éxito, devolver los datos de las reseñas
            return $res;
        }else{
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
            $message = "Página en mantenimiento";
            return $message;
        }
    }
    
    /**
     * Método para insertar una nueva reseña
     * 
     * Realiza una solicitud HTTP POST al servicio de clientes para insertar un nuevo cliente con los datos proporcionados.
     * 
     * @param int $dni_cliente          Dni del cliente
     * @param int $id_parking           Identificador del parking
     * @param string $comentario        Comentario
     * @param int $puntuacion           Puntuacion
     * @return string|array             Si la solicitud tiene éxito, devuelve los datos de la reseña insertada en formato JSON.
     *                                  De lo contrario, devuelve null.
     */
    public function insertResena($dni_cliente, $id_parking, $comentario, $puntuacion) {
        // Datos a enviar para la inserción de la reseña en formato JSON
        $insert = json_encode(array("Dni_cliente" => $dni_cliente, "Id_parking" => $id_parking, "Comentario" => $comentario, "Puntuacion" => $puntuacion));
        // URL del servicio de reseña para la inserción de una nueva reseña
        $urlservice = "http://localhost/_servWeb/servAutoPark/Resena.php";
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
            // Si la solicitud tiene éxito, devolver los datos de la reseña insertada
            return $res;
        } else {
            // Si la solicitud falla, cerrar la conexión CURL y devolver un mensaje de error
            curl_close($connection);
        }
    }
}
