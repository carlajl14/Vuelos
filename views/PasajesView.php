<?php

class PasajesView {

    /**
     * Mostrar una tabla con todos los pasajes
     * 
     * @param type $pasajes
     */
    public function getPasajes($pasajes) {
        $pas = json_decode($pasajes, true); //Obtiene los pasajes y los pasa de JSON a un array
        echo '<div class="contenedor">';
        echo '<div class="container">';
        echo "<h2 class='text-center pt-2'>Pasajes</h2>";
        foreach ($pas as $pasaje) {
            echo '<div class="container__pasajes">
                        <p class="pasaje">'. $pasaje['idpasaje'] .'</p>
                        <div class="pasajeros">
                            <span class="pasajero">'. $pasaje['nombre'] .'</span>
                        </div>
                        <div class="vuelos">
                            <span class="vuelo">Vuelo: '. $pasaje['identificador'] .'</span>
                            <span class="asiento"><b>Asiento:</b> '. $pasaje['numasiento'] .'</span>
                        </div>
                        <div class="detalles">
                            <span class="clase"><b>Clase:</b> '. $pasaje['clase'] .'</span>
                            <span class="precio"><b>Pvp:</b> '. $pasaje['pvp'] .'</span>
                        </div>';
            echo '<div class="d-flex justify-content-center mt-2">';
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
            echo '</div>';
            echo '</form>';
            echo '</div>';
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
            echo "<h2 class='text-center pt-2'>Pasajes</h2>";
            foreach ($data as $pasaje) {
                echo '<div class="container__pasajes">
                        <p class="pasaje">'. $pasaje['idpasaje'] .'</p>
                        <div class="pasajeros">
                            <span class="pasajero">'. $pasaje['nombre'] .'</span>
                        </div>
                        <div class="vuelos">
                            <span class="vuelo">Vuelo: '. $pasaje['identificador'] .'</span>
                            <span class="asiento">Asiento: '. $pasaje['numasiento'] .'</span>
                        </div>
                        <div class="detalles">
                            <span class="clase">Clase: '. $pasaje['clase'] .'</span>
                            <span class="precio">Pvp: '. $pasaje['pvp'] .'</span>
                        </div>
                    </div>';
            }
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
        echo '<form method="POST" action="index.php?controller=Pasajes&action=insertPasaje" class="form text-white" style="width:700px; margin-left:430px">';
        echo '<label>Selecciona pasajero</label>';
        echo '<select class="form-select" name="pasajero">';
        foreach ($pasajeros as $pasajero) {
            echo '<option value="' . $pasajero['pasajerocod'] . '">' . $pasajero['pasajerocod'] . ' - ' . $pasajero['nombre'] . '</option>';
        }
        echo '</select>';
        echo '<label class="mt-3">Selecciona identificador de vuelo</label>';
        echo '<select class="form-select" name="vuelo">';
        foreach ($vuelos as $v) {
            echo '<option value="' . $v['identificador'] . '">' . $v['identificador'] . ' - ' . $v['aeropuertoorigen'] . ' - ' . $v['aeropuertodestino'] . '</option>';
        }
        echo '</select>';
        echo '<label class="mt-3">Número de asiento:</label>';
        echo '<input name="asiento" type="number" class="ms-2"><br>';
        echo '<label class="mt-3">Marca la clase: </label>';
        echo '<input name="clase" class="ms-2" type="radio" value="TURISTA">TURISTA';
        echo '<input name="clase" class="ms-2" type="radio" value="PRIMERA">PRIMERA';
        echo '<input name="clase" class="ms-2" type="radio" value="BUSINESS">BUSINESS<br>';
        echo '<label class="mt-3">Pvp:</label>';
        echo '<input name="pvp" class="ms-2" type="number"><br>';
        echo '<button type="submit" class="btn btn-primary mt-3" name="insert">Insertar pasaje</button>';
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
        echo '<form method="POST" action="index.php?controller=Pasajes&action=updatePasaje" class="form text-white" style="width:700px; margin-left:430px">';
        echo '<input name="pasaje" value="' . $pasaje . '" type="number" hidden>';
        echo '<h2 class="text-center">Modificar pasaje ' . $pasaje . '</h2>';
        echo '<label>Selecciona pasajero</label>';
        echo '<select class="form-select" name="pasajero">';
        foreach ($pasajeros as $pasajero) {
            echo '<option value="' . $pasajero['pasajerocod'] . '">' . $pasajero['pasajerocod'] . ' - ' . $pasajero['nombre'] . '</option>';
        }
        echo '</select>';
        echo '<label class="mt-3">Selecciona identificador de vuelo</label>';
        echo '<select class="form-select" name="vuelo">';
        foreach ($vuelos as $v) {
            echo '<option value="' . $v['identificador'] . '">' . $v['identificador'] . ' - ' . $v['aeropuertoorigen'] . ' - ' . $v['aeropuertodestino'] . '</option>';
        }
        echo '</select>';
        echo '<label class="mt-3">Número de asiento:</label>';
        echo '<input name="asiento" type="number" class="ms-2"><br>';
        echo '<label class="mt-3">Marca la clase: </label>';
        echo '<input name="clase" class="ms-2" type="radio" value="TURISTA">TURISTA';
        echo '<input name="clase" class="ms-2" type="radio" value="PRIMERA">PRIMERA';
        echo '<input name="clase" class="ms-2" type="radio" value="BUSINESS">BUSINESS<br>';
        echo '<label class="mt-3">Pvp:</label>';
        echo '<input name="pvp" class="ms-2" type="number"><br>';
        echo '<button type="submit" class="btn btn-primary mt-3" name="update">Modificar pasaje</button>';
        echo '</form>';
        echo '</div>';
    }
}