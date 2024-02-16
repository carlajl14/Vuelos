<?php

class PasajesController {

    private $service;
    private $view;
    private $pasajeroService;
    private $vueloService;

    public function __construct() {
        $this->service = new PasajeService();
        $this->view = new PasajesView();
        $this->pasajeroService = new PasajeroService();
        $this->vueloService = new VueloService();
    }

    /**
     * Mostrar los pasajes
     */
    public function viewPasajes() {
        $pasajes = $this->service->getPasajes();

        $this->view->getPasajes($pasajes);
    }

    /**
     * Mostrar la vista de los pasajes de un vuelo
     * 
     * @param type $id
     */
    public function viewPasaje($id) {
        $pasaje = $this->service->getPasaje($id);

        $this->view->getPasajeVuelo($pasaje);
    }

    /**
     * Función que muestra el fomulario para insertar un pasaje 
     */
    public function formInsert() {

        $pasajeros = $this->pasajeroService->getPasajeros();
        $vuelos = $this->vueloService->getVuelos();

        $pasajero = json_decode($pasajeros, true);
        $vuelo = json_decode($vuelos, true);

        $this->view->formInsertPasaje($pasajero, $vuelo);
    }

    /**
     * Función para insertar un pasaje nuevo
     * 
     * @param type $pasajero
     * @param type $vuelo
     * @param type $asiento
     * @param type $clase
     * @param type $pvp
     */
    public function insertPasaje() {
        if (isset($_POST['insert'])) {
            $pasajero = $_POST['pasajero'];
            $vuelo = $_POST['vuelo'];
            $asiento = $_POST['asiento'];
            $clase = $_POST['clase'];
            $pvp = $_POST['pvp'];

            //try {
                $pasaje = $this->service->insertPasaje($pasajero, $vuelo, $asiento, $clase, $pvp);
                return '<div class="alert alert-danger" role="alert">
                        Pasaje insertado correctamente.
                    </div>';
            //} catch (Exception $ex) {
                //return '<p>Error al insertar el pasaje. Comprueba los datos introducidos</p>';
            //}
        }
    }
}