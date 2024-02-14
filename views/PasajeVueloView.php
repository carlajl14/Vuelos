<?php

class PasajeVueloView {
    /**
     * Función para cargar los identificadores de cada vuelo en un select
     * 
     * @param type $id
     */
    public function selectVuelo($id) {
        $data = json_decode($id, true);
        echo '<form method="POST" action="index.php?controller=Vuelos&action=revisarFuncion">';
        echo '<select name="idvuelo">';
        echo '<option value="">Selecciona un vuelo</option>';
        foreach($data as $i) {
            echo '<option value="'. $i['identificador'] .'">'. $i['identificador'] .'</option>';
        }
        echo '</select>';
        echo '<button type="submit" name="vuelo">Información vuelo</button>';
        echo '<button type="submit" name="pasajes">Ver Pasajes</button>';
        echo '</form>';
    }
}
