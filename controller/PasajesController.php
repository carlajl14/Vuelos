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
        $mensaje = "";
        $pasaje = $this->service->getPasaje($id);

        $this->view->getPasajeVuelo($pasaje, $mensaje);
    }

    /**
     * Función que muestra el fomulario para insertar un pasaje 
     */
    public function formInsert() {
        $mensaje = "";
        
        $pasajeros = $this->pasajeroService->getPasajeros();
        $vuelos = $this->vueloService->getVuelos();

        $pasajero = json_decode($pasajeros, true);
        $vuelo = json_decode($vuelos, true);

        $this->view->formInsertPasaje($pasajero, $vuelo, $mensaje);
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

            $pasaje = $this->service->insertPasaje($pasajero, $vuelo, $asiento, $clase, $pvp);
            header("Location: index.php?controller=Pasajes&action=formInsert");
        }
    }
    
    /**
     * Función que muestra el fomulario para modificar un pasaje
     */
    public function formUpdate() {
        $pasajeros = $this->pasajeroService->getPasajeros();
        $vuelos = $this->vueloService->getVuelos();

        $pasajero = json_decode($pasajeros, true);
        $vuelo = json_decode($vuelos, true);
        
        $pasaje = $_POST['pasaje'];
        
        $this->view->formUpdatePasaje($pasajero, $vuelo, $pasaje);
    }
    
    public function updatePasaje() {
        if (isset($_POST['update'])) {
            $pasajero = $_POST['pasajero'];
            $vuelo = $_POST['vuelo'];
            $asiento = $_POST['asiento'];
            $clase = $_POST['clase'];
            $pvp = $_POST['pvp'];
            $pasaje = $_POST['pasaje'];
            
            $pasajes = $this->service->updatePasaje($pasajero, $vuelo, $asiento, $clase, $pvp, $pasaje);
            
            header("Location: index.php?controller=Pasajes&action=viewPasajes");
        }
    }
    
    public function deletePasaje() {
        $id = $_POST['pasaje'];
        
        $delete = $this->service->deletePasaje($id);
        header("Location: index.php?controller=Pasajes&action=viewPasajes");
    }
}