<?php

class PasajeService {

    /**
     * Devolver todos los pasajes
     * 
     * @return type
     */
    public function getPasajes() {
        $urlmiservicio = "http://localhost/_servWeb/serviceVuelos/PasajeService.php";
        $conexion = curl_init();
        //Url de la petición
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        //Tipo de contenido de la respuesta
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        if ($res) {
            return $res;
        }
        curl_close($conexion);
    }

    /**
     * Devolver un pasaje pasando un vuelo por parámetro
     * 
     * @param type $id
     * @return type
     */
    public function getPasaje($id) {
        $urlmiservicio = "http://localhost/_servWeb/serviceVuelos/PasajeService.php/?id=" . $id;
        $conexion = curl_init();
        //Url de la petición
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        //Tipo de contenido
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        if ($res) {
            return $res;
        } else {
            curl_close($conexion);
        }
    }

    /**
     * Función para insertar un pasaje
     * 
     * @param type $pasajero
     * @param type $vuelo
     * @param type $asiento
     * @param type $clase
     * @param type $pvp
     */
    public function insertPasaje($pasajero, $vuelo, $asiento, $clase, $pvp) {
        $envio = json_encode(array("pasajerocod" => $pasajero, "identificador" => $vuelo, "numasiento" => $asiento, "clase" => $clase, "pvp" => $pvp));
        $urlmiservicio = "http://localhost/_servWeb/serviceVuelos/PasajeService.php";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER,
                array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_POST, TRUE);
        //Campos que van en el envío
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        
        if (curl_errno($conexion)) {
            throw new Exception('Error en la solicitud: ' . curl_error($conexion));
        }

        $httpCode = curl_getinfo($conexion, CURLINFO_HTTP_CODE);

        if ($httpCode >= 400) {
            // Parsear la respuesta JSON
            $errorResponse = json_decode($res, true);

            // Verificar si hay un error personalizado
            if (isset($errorResponse['error'])) {
                throw new Exception('Error de la API: ' . $errorResponse['error']);
            } else {
                throw new Exception('Error desconocido de la API');
            }
        }
        
        if ($res) {
            return $res;
        }
        curl_close($conexion);
    }

    /**
     * Función para modificar un pasaje
     * 
     * @param type $pasajero
     * @param type $vuelo
     * @param type $asiento
     * @param type $pvp
     * @param type $pasaje
     */
    public function updatePasaje($pasajero, $vuelo, $asiento, $clase, $pvp, $pasaje) {
        $envio = json_encode(array("pasajerocod" => $pasajero, "identificador" => $vuelo, "numasiento" => $asiento, "clase" => $clase, "pvp" => $pvp));
        $urlmiservicio = "http://localhost/_servWeb/serviceVuelos/PasajeService.php/?idpasaje=". $pasaje;
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER,
                array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'PUT');
        //Campos que van en el envío
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        if ($res) {
            return $res;
        }
        curl_close($conexion);
    }

    function deletePasaje($id) {
        $urlmiservicio = "http://localhost/_servWeb/serviceVuelos/PasajeService.php/?id=" . $id;
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'DELETE');
        //Campos que van en el envío
        //curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);

        if ($res) {
            return $res;
        }
        curl_close($conexion);
    }
}