<?php

class PasajesView {

    /**
     * Mostrar una tabla con todos los pasajes
     * 
     * @param type $pasajes
     */
    public function getPasajes($pasajes) {
        $data = json_decode($pasajes, true); //Obtiene los pasajes y los pasa de JSON a un array
        echo '<div class="contenedor">';
        echo '<div class="container">';
        echo "<h2 class='text-center pt-2'>Pasajes</h2>";
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
            echo '<form method="POST" action="index.php?controller=Pasajes&action=formUpdate">';
            echo '<input name="pasaje" value=' . $pasaje['idpasaje'] . ' hidden />';
            echo '<button type="submit" class="btn btn-primary">Modificar</button>';
            echo '</form>';
            echo '<form method="POST" action="index.php?controller=Pasajes&action=deletePasaje" class="ms-2">';
            echo '<input name="pasaje" value=' . $pasaje['idpasaje'] . ' hidden />';
            echo '<button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#miModal' . $pasaje['idpasaje'] . '">Eliminar</button>';
            echo '<div class="modal fade" id="miModal' . $pasaje['idpasaje'] . '" tabindex="-1" aria-hidden="true">';
            echo '<div class="modal-dialog text-black fs-5">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';
            echo '<h5 class="modal-title text-black">localhost dice</h5>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            echo '</div>';
            echo '<div class="modal-body">';
            echo '<p>¿Estas seguro de querer eliminar este pasaje?</p>';
            echo '</div>';
            echo '<div class="modal-footer">';
            echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>';
            echo '<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
    }

    /**
     * Obtener información de los pasajes de un vuelo
     * 
     * @param type $pasajevuelo
     */
    public function getPasajeVuelo($pasajevuelo, $mensaje) {
        $message = is_string($mensaje) && is_array(json_decode($mensaje, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
        if ($message) {
            $mensajes = json_decode($mensaje, true);
            echo '<div class="alert alert-primary" role="alert">';
            echo $mensaje['resultado'];
            echo '</div>';
        } else {
            $data = json_decode($pasajevuelo, true); //Obtiene los pasajes y los pasa de JSON a un array
            echo '<div class="contenedor">';
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
            echo '<a class="btn btn-primary" style="margin-left: 120px" href="index.php?controller=Vuelos&action=viewVuelos">Volver</a>';
            echo '</div>';
        }
    }

    public function formInsertPasaje($pasajeros, $vuelos, $mensaje) {
        $message = is_string($mensaje) && is_array(json_decode($mensaje, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
        if ($message) {
            $mensajes = json_decode($mensaje, true);
            echo '<div class="alert alert-primary" role="alert">' . $mensajes["resultado"] . '</div>';
        }
        echo '<div class="contenedor">';
        echo '<h2 class="text-center pt-2">Insertar Pasaje</h2>';
        echo '<form method="POST" action="index.php?controller=Pasajes&action=insertPasaje">';
        echo '<p>Selecciona pasajero</p>';
        echo '<select class="form-select" name="pasajero">';
        foreach ($pasajeros as $pasajero) {
            echo '<option value="' . $pasajero['pasajerocod'] . '">' . $pasajero['pasajerocod'] . ' - ' . $pasajero['nombre'] . '</option>';
        }
        echo '</select>';
        echo '<p>Selecciona identificador de vuelo</p>';
        echo '<select class="form-select" name="vuelo">';
        foreach ($vuelos as $v) {
            echo '<option value="' . $v['identificador'] . '">' . $v['identificador'] . ' - ' . $v['aeropuertoorigen'] . ' - ' . $v['aeropuertodestino'] . '</option>';
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
        echo '</div>';
    }

    /**
     * Formulario para modificar un pasaje
     * 
     * @param type $pasajeros
     * @param type $vuelos
     * @param type $pasaje
     */
    public function formUpdatePasaje($pasajeros, $vuelos, $pasaje) {
        echo '<div class="contenedor text-white">';
        echo '<form method="POST" action="index.php?controller=Pasajes&action=updatePasaje">';
        echo '<input name="pasaje" value="' . $pasaje . '" type="number" hidden>';
        echo '<h2 class="text-center">Modificar pasaje ' . $pasaje . '</h2>';
        echo '<p>Nombre del pasajero</p>';
        echo '<select class="form-select" name="pasajero">';
        foreach ($pasajeros as $pasajero) {
            echo '<option value="' . $pasajero['pasajerocod'] . '">' . $pasajero['pasajerocod'] . ' - ' . $pasajero['nombre'] . '</option>';
        }
        echo '</select>';
        echo '<p>Identificador de vuelo</p>';
        echo '<select class="form-select" name="vuelo">';
        foreach ($vuelos as $v) {
            echo '<option value="' . $v['identificador'] . '">' . $v['identificador'] . ' - ' . $v['aeropuertoorigen'] . ' - ' . $v['aeropuertodestino'] . '</option>';
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
        echo '<button type="submit" class="btn btn-primary" name="update">Modificar pasaje</button>';
        echo '</form>';
        echo '</div>';
    }
}