<?php

class ParkingView
{

    public function showAllParking($parkings)
    {
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light p-1 ps-3 mb-2 d-flex justify-content-between">
                <p class="navbar-brand title"><span class="text-primary title">AUTO</span>-PARK</p>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?controller=Parking&action=getAllParkings">Inicio</a>
                        </li>            
                    </ul>
                    <span class="navbar-text me-5">                        
                        <span>
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">';
        /**
         * Muestra el usuario que ha iniciado sesion.
         */
        if (isset($_SESSION['Nombre'])) {
            echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><strong class="nav__strong">Hola, ' . $_SESSION['Nombre'] . '</strong></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="nav-link text-center" aria-disabled="true">Mi cuenta</a><li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="index.php?controller=Vehiculo&action=getAllVehiculos">Mis Vehiculos</a></li>
                                        <li><a class="dropdown-item" href="index.php?controller=Reserva&action=getAllReservas">Mis Reservas</a></li>
                                        <li><a class="dropdown-item" href="index.php?controller=Servicio&action=getAllServiciosCliente">Mis Servicios</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><form method="POST">
                                            <!-- Botón para cerrar la sesión del usuario -->
                                            <button class="btn btn-outline-danger ms-3" name="close_session" type="submit">Cerrar Sesión</button>  
                                        </form></li>
                                    </ul>
                                </li>
                            </ul>';
        }
        echo '</span>                        
                    </span>
                </div>      
        </nav>
        <div class="container mt-4">
                <section class="bloque">'
            . '<h1 class="bloque_h1">NUESTROS PARKINGS</h1>'
            . '<div class="row row-cols-1 row-cols-md-2 g-4 m-2">';

        foreach ($parkings as $parking) {
            echo '<div class="col">
                   <div class="card m-3">
                            <div class="card-body">
                                <h5 class="card-title text-center">' . $parking['Nombre'] . '</h5>                                
                                <p class="card-text text-center pt-2 pb-2">Este parking cuenta con ' . $parking['Num_plazas'] . ' plazas distribuidas en ' . $parking['Num_plantas'] . ' planta/s.</p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span class="span">Ubicación: </span>' . $parking['Direccion'] . ' - ' . $parking['Ciudad'] . '</li>
                                    <li class="list-group-item"><span class="span">Teléfono: </span>' . $parking['Telefono'] . '</li>
                                    <li class="list-group-item"><span class="span">Email: </span>' . $parking['Email'] . '</li>
                                </ul>
                            </div>
                            <div class="card-footer text-center text-body-secondary pt-3 pb-3">
                            <a href="index.php?controller=Reserva&action=getFormFechaReserva&Id_parking=' . $parking['Identificador'] . '" class="btn btn-success" id="btn_reserva">Reservar</a>
                            <a href="index.php?controller=Servicio&action=getAllServiciosParking&Id_parking=' . $parking['Identificador'] . '" class="btn btn-info" id="btn_servicio">Servicios</a>
                        </div>
                        </div>
                        </div>';
        }
        echo '</div>';
    }

    public function insertResena($parkings)
    {
        echo '<h1 class="mt-3" id="form_h1">Dinos tu opinion</h1>'
            . '<div class="form">'
            . '<form method="POST" action="index.php?controller=Parking&action=insertResena">'
            . '<label for="id_parking" class="form-label">Parking</label>
                <select name="id_parking" id="id_parking" class="form-control mb-2" required>';
        foreach ($parkings as $parking) {
            echo '<option class="form-option" value="' . $parking['Identificador'] . '">' . $parking['Nombre'] . '</option>';
        }
        echo '</select>
                        <div class="form-group mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <textarea name="comentario" id="comentario" class="form-control" rows="4" required></textarea>
        </div>
                        <div class="form-group mb-3">
            <label for="puntuacion" class="form-label">Puntuación</label>
            <input type="number" name="puntuacion" id="puntuacion" class="form-control" placeholder="1-10" min="1" max="10" required>
        </div>
                    <button type="submit" class="btn btn-success" id="btn_resena">Añadir Reseña</button>'
            . '</form>'
            . '</div>
                                </section>';
    }
}
