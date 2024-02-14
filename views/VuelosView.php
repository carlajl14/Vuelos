<?php

class VuelosView {

    /**
     * Función para mostrar los vuelos
     * 
     * @param type $vuelos
     */
    public function getVuelos($vuelos) {
        $data = json_decode($vuelos, true); //Obtiene los vuelos y los pasa de JSON a un array
        echo '<div class="container-fluid">';
        echo "<h2 class='text-center mt-2'>Vuelos</h2>";
        echo '<table class="table table-info mb-4">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Identificador</th>';
        echo '<th scope="col">Aeropuerto de origen</th>';
        echo '<th scope="col">Nombre aeropuerto de origen</th>';
        echo '<th scope="col">País de origen</th>';
        echo '<th scope="col">Aeropuerto de destino</th>';
        echo '<th scope="col">Nombre aeropuerto de destino</th>';
        echo '<th scope="col">País de destino</th>';
        echo '<th scope="col">Tipo de vuelo</th>';
        echo '<th scope="col">Número de pasajeros</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($data as $vuelo) {
            echo '<tr>';
            echo '<td>' . $vuelo['identificador'] . '</td>';
            echo '<td>' . $vuelo['aeropuertoorigen'] . '</td>';
            echo '<td>' . $vuelo['nombre'] . '</td>';
            echo '<td>' . $vuelo['pais'] . '</td>';
            echo '<td>' . $vuelo['aeropuertodestino'] . '</td>';
            echo '<td>' . $vuelo['nombre'] . '</td>';
            echo '<td>' . $vuelo['pais'] . '</td>';
            echo '<td>' . $vuelo['tipovuelo'] . '</td>';
            echo '<td>' . $vuelo['Número de pasajeros'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }

    public function oneVuelo($vuelo) {
        $data = json_decode($vuelo, true); //Obtiene el vuelo y lo pasa de JSON a un array
        echo '<div class="container-fluid">';
        echo "<h2 class='text-center mt-2'>Vuelos</h2>";
        echo '<table class="table table-info mb-4">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Identificador</th>';
        echo '<th scope="col">Aeropuerto de origen</th>';
        echo '<th scope="col">Nombre aeropuerto de origen</th>';
        echo '<th scope="col">País de origen</th>';
        echo '<th scope="col">Aeropuerto de destino</th>';
        echo '<th scope="col">Nombre aeropuerto de destino</th>';
        echo '<th scope="col">País de destino</th>';
        echo '<th scope="col">Tipo de vuelo</th>';
        echo '<th scope="col">Número de pasajeros</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>' . $data['identificador'] . '</td>';
        echo '<td>' . $data['aeropuertoorigen'] . '</td>';
        echo '<td>' . $data['nombre'] . '</td>';
        echo '<td>' . $data['pais'] . '</td>';
        echo '<td>' . $data['aeropuertodestino'] . '</td>';
        echo '<td>' . $data['nombre'] . '</td>';
        echo '<td>' . $data['pais'] . '</td>';
        echo '<td>' . $data['tipovuelo'] . '</td>';
        echo '<td>' . $data['Número de pasajeros'] . '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
}