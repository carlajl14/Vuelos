<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Restful Vuelos</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Vuelos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nuevo Pasaje</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pasajes</a>
                </li>
                <li class="nav-item">
                    <?php
                    include $_SERVER['DOCUMENT_ROOT'] . '/Vuelos/controller/PasajeroVueloController.php';
                    include $_SERVER['DOCUMENT_ROOT'] . '/Vuelos/services/PasajeroVueloService.php';
                    include $_SERVER['DOCUMENT_ROOT'] . '/Vuelos/views/PasajeVueloView.php';

                    $vueloController = new PasajeroVueloController();

                    $vueloController->selectVuelos();
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>