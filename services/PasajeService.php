<?php

class PasajeService {

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
}