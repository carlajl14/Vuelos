<?php

class VuelosView {

    /**
     * Función para mostrar los vuelos
     * 
     * @param type $vuelos
     */
    public function getVuelos($vuelos) {
        $data = json_decode($vuelos, true); //Obtiene los vuelos y los pasa de JSON a un array
        //Añadir el select con los identificadores de los vuelos
        echo '<div class="contenedor">';
        echo '<h2 class="text-center">Buscar información sobre un vuelo</h2>';
        echo '<div class="container text-center mb-4" style="padding-left:350px">';
        echo '<form method="POST" action="index.php?controller=Vuelos&action=revisarFuncion" class="form d-flex">';
        echo '<select class="form-select" style="width: 20%" name="vuelo">';
        echo '<option value="">Selecciona un vuelo</option>';
        foreach ($data as $vuelo) {
            echo '<option value="'. $vuelo['identificador'] .'"';
            /*if(isset($_POST['vuelo']) && isset($_POST['vuelo']) == $vuelo['identificador']) {
                echo "selected='selected'";
            } */
            echo '>'. $vuelo['identificador'] .'</option>';
        }
        echo '</select>';
        echo '<button class="btn btn-primary me-3 ms-3" type="submit" name="vuelos">Información Vuelo</button>';
        echo '<button class="btn btn-primary" type="submit" name="pasaje">Información Pasajes</button>';
        echo '</form>';
        echo '</div>';
        
        echo '<div class="container">';
        echo "<h2 class='mt-2' style='margin-left: 550px'>Vuelos</h2>";
        foreach ($data as $vuelo) {
            echo '<div class="container__vuelos">
                    <p class="vuelo">'. $vuelo['identificador'] .'</p>
                    <div class="origen">
                        <span class="origen__aeropuerto">'. $vuelo['aeropuertoorigen'] .'</span>
                        <span class="origen__nombre">'. $vuelo['nombre'] . ' ('. $vuelo['pais'] .')</span>
                    </div>
                    <div class="vuelos">
                        <span class="ori">To</span>
                        <span class="espacio">---------------------</span>
                        <span class="des">From</span>
                    </div>
                    <div class="destino">
                        <span class="destino__aeropuerto">'. $vuelo['aeropuertodestino'] .'</span>
                        <span class="destino__nombre">'. $vuelo['nombre'] . ' ('. $vuelo['pais'] .')</span>
                    </div>
                    <div class="informacion">
                        <span class="tipo"><b>Tipo de vuelo:</b> '. $vuelo['tipovuelo'] .'</span>
                        <span class="numero"><b>Número de pasajeros:</b> '. $vuelo['Número de pasajeros'] .'</span>
                    </div>
                  </div>';
        }
        echo '</div>';
        echo '</div>';
    }

    public function oneVuelo($vuelo) {
        $data = json_decode($vuelo, true); //Obtiene el vuelo y lo pasa de JSON a un array
        echo '<div class="contenedor">';
        echo '<div class="container">';
        echo "<h2 class='text-center mt-2'>Vuelo</h2>";
        echo '<div class="container__vuelos">
                    <p class="vuelo">'. $data['identificador'] .'</p>
                    <div class="origen">
                        <span class="origen__aeropuerto">'. $data['aeropuertoorigen'] .'</span>
                        <span class="origen__nombre">'. $data['nombre'] . ' ('. $data['pais'] .')</span>
                    </div>
                    <div class="vuelos">
                        <span class="ori">To</span>
                        <span class="espacio">---------------------</span>
                        <span class="des">From</span>
                    </div>
                    <div class="destino">
                        <span class="destino__aeropuerto">'. $data['aeropuertodestino'] .'</span>
                        <span class="destino__nombre">'. $data['nombre'] . ' ('. $data['pais'] .')</span>
                    </div>
                    <div class="informacion">
                        <span class="tipo"><b>Tipo de vuelo:</b> '. $data['tipovuelo'] .'</span>
                        <span class="numero"><b>Número de pasajeros:</b> '. $data['Número de pasajeros'] .'</span>
                    </div>
                  </div>';
        echo '</div>';
        echo '<a class="btn btn-primary" style="margin-left: 300px" href="index.php?controller=Vuelos&action=viewVuelos">Volver</a>';
        echo '</div>';
    }
}