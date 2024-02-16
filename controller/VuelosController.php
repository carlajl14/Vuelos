<?php

class VuelosController {
    private $service;
    private $view;
    private $pasajeController;
    
    public function __construct() {
        $this->service = new VueloService();
        $this->view = new VuelosView();
        $this->pasajeController = new PasajesController();
    }
    
    /**
     * Mostrar los vuelos
     */
    public function viewVuelos() {
        $vuelos = $this->service->getVuelos();
        
        $this->view->getVuelos($vuelos);
    }
    
    /**
     * Mostrar información detallada de un vuelo
     * 
     * @param type $id
     */
    public function viewVuelo($id) {
        $id = $_POST['vuelo'];
        $vuelo = $this->service->getOneVuelo($id);
        
        $this->view->oneVuelo($vuelo);
    }
    
    /**
     * Mostrar una información u otra dependiendo del botón pulsado
     * 
     * @param type $id
     */
    public function revisarFuncion() {
        if (isset($_POST['vuelos'])) {
            $this->viewVuelo($_POST['vuelo']);
        } else if (isset($_POST['pasaje'])) {
            $this->pasajeController->viewPasaje($_POST['vuelo']);
        } 
    }
}