<?php

class VuelosController {
    private $service;
    private $view;
    
    public function __construct() {
        $this->service = new VueloService();
        $this->view = new VuelosView();
    }
    
    /**
     * Mostrar los vuelos
     */
    public function viewVuelos() {
        $vuelos = $this->service->getVuelos();
        
        $this->view->getVuelos($vuelos);
    }
    
    public function viewVuelo($id) {
        $id = $_POST['vuelo'];
        $vuelo = $this->service->getOneVuelo($id);
    }
    
    /*public function selectVuelos() {
        $id = $this->service->getIdentificador();
        
        $this->view->selectVuelo($id);
    }*/
    
    public function revisarFuncion($id) {
        if (isset($_POST['vuelo'])) {
            $id = $_POST['idvuelo'];
            $this->viewVuelo($id);
        } else if (isset($_POST['pasajes'])) {
            // Cargar el controlador del pasaje
        }
    }
}