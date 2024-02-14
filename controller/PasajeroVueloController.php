<?php

class PasajeroVueloController {
    
    private $service;
    private $view;
    
    public function __construct() {
        $this->service = new PasajeroVueloService();
        $this->view = new PasajeVueloView();
    }
    
    public function selectVuelos() {
        $id = $this->service->getIdentificador();
        
        $this->view->selectVuelo($id);
    }
}

