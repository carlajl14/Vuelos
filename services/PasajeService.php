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
        }
        curl_close($conexion);
    }

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
        if ($res) {
            return '<div class="alert alert-success" role="alert">
                        Registro insertardo correctamente.
                    </div>';
        } 
        curl_close($conexion);
    }
}