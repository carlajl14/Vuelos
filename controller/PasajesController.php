<?php

class PasajesController{
    
    private $service;
    private $view;
    
    public function __construct() {
        $this->service = new PasajeService();
        $this->view = new PasajesView();
    }
    
    
}
