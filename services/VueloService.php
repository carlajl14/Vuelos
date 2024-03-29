<?php

class VueloService {

    /**
     * Devolver los vuelos del servicio
     * 
     * @return type
     */
    public function getVuelos() {
        $urlmiservicio = "http://localhost/_servWeb/serviceVuelos/VueloService.php";
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
     * Devolver un vuelo pasado por parámetro
     * 
     * @param type $id
     * @return type
     */
    public function getOneVuelo($id) {
        $urlmiservicio = "http://localhost/_servWeb/serviceVuelos/VueloService.php/?id=" . $id;
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
            return '<div class="alert alert-danger" role="alert">
                        Este vuelo no tiene ningún pasaje.
                    </div>';
        }
        curl_close($conexion);
    }
}