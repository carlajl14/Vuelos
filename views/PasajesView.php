<?php

class PasajesView {
    
    /**
     * Mostrar una tabla con todos los pasajes
     * 
     * @param type $pasajes
     */
    public function getPasajes($pasajes) {
        $data = json_decode($pasajes, true); //Obtiene los pasajes y los pasa de JSON a un array
        echo '<div class="container">';
        echo "<h2 class='text-center mt-2'>Pasajes</h2>";
        echo '<table class="table table-info mb-4 text-center">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Idpasaje</th>';
        echo '<th scope="col">Pasajero</th>';
        echo '<th scope="col">Identificador</th>';
        echo '<th scope="col">Número de asiento</th>';
        echo '<th scope="col">Clase</th>';
        echo '<th scope="col">Pvp</th>';
        echo '<th scope="col">Modificar/Borrar</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($data as $pasaje) {
            echo '<tr>';
            echo '<td>' . $pasaje['idpasaje'] . '</td>';
            echo '<td>' . $pasaje['nombre'] . '</td>';
            echo '<td>' . $pasaje['identificador'] . '</td>';
            echo '<td>' . $pasaje['numasiento'] . '</td>';
            echo '<td>' . $pasaje['clase'] . '</td>';
            echo '<td>' . $pasaje['pvp'] . '</td>';
            echo '<td class="d-flex justify-content-center">';
            echo '<form method="POST" action="">';
            echo '<input name="pasaje" value='. $pasaje['idpasaje'] .' hidden />';
            echo '<button type="submit" class="btn btn-primary">Modificar</button>';
            echo '</form>';
            echo '<form method="POST" action="" class="ms-2">';
            echo '<input name="pasaje" value='. $pasaje['idpasaje'] .' hidden />';
            echo '<button type="submit" class="btn btn-danger">Borrar</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
    
    /**
     * Obtener información de los pasajes de un vuelo
     * 
     * @param type $pasajevuelo
     */
    public function getPasajeVuelo($pasajevuelo) {
        $data = json_decode($pasajevuelo, true); //Obtiene los pasajes y los pasa de JSON a un array
        echo '<div class="container">';
        echo "<h2 class='text-center mt-2'>Pasajes</h2>";
        echo '<table class="table table-info mb-4 text-center">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Pasaje</th>';
        echo '<th scope="col">Pasajero</th>';
        echo '<th scope="col">Vuelo</th>';
        echo '<th scope="col">Número de asiento</th>';
        echo '<th scope="col">Clase</th>';
        echo '<th scope="col">Pvp</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($data as $pasaje) {
            echo '<tr>';
            echo '<td>' . $pasaje['idpasaje'] . '</td>';
            echo '<td>' . $pasaje['nombre'] . '</td>';
            echo '<td>' . $pasaje['identificador'] . '</td>';
            echo '<td>' . $pasaje['numasiento'] . '</td>';
            echo '<td>' . $pasaje['clase'] . '</td>';
            echo '<td>' . $pasaje['pvp'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        if ($data == "") {
            return '<div class="alert alert-danger" role="alert">
                    No hay pasajes en este vuelo
                </div>';
        }
        echo '<a class="btn btn-primary" href="index.php?controller=Vuelos&action=viewVuelos">Volver</a>';
    }
    
    public function formInsertPasaje($pasajeros, $vuelos) {
        echo '<form method="POST" action="index.php?controller=Pasajes&action=insertPasaje">';
        echo '<p>Selecciona pasajero</p>';
        echo '<select class="form-select" name="pasajero">';
        foreach ($pasajeros as $pasajero) {
            echo '<option value="'. $pasajero['pasajerocod'] .'">'. $pasajero['pasajerocod'].' - '. $pasajero['nombre'] .'</option>';
        }
        echo '</select>';
        echo '<p>Selecciona identificador de vuelo</p>';
        echo '<select class="form-select" name="vuelo">';
        foreach ($vuelos as $v) {
            echo '<option value="'. $v['identificador'] .'">'. $v['identificador'].' - '. $v['aeropuertoorigen'] .' - '. $v['aeropuertodestino'] .'</option>';
        }
        echo '</select>';
        echo '<p>Número de asiento</p>';
        echo '<input name="asiento" type="number">';
        echo '<p>Marca la clase</p>';
        echo '<input name="clase" type="radio" value="TURISTA">TURISTA';
        echo '<input name="clase" type="radio" value="PRIMERA">PRIMERA';
        echo '<input name="clase" type="radio" value="BUSINESS">BUSINESS';
        echo '<p>Pvp</p>';
        echo '<input name="pvp" type="number"><br>';
        echo '<button type="submit" class="btn btn-primary" name="insert">Insertar pasaje</button>';
        echo '</form>';
    }
}
