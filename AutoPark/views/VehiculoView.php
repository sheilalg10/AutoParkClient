<?php

class VehiculoView
{

    public function getAllVehiculosCliente($data)
    {
        $vehiculos = json_decode($data, true);
        echo '<nav
      class="navbar navbar-expand-lg navbar-light bg-light p-1 ps-3 mb-2 d-flex justify-content-between">
      <a href="#" class="navbar-brand">
        <span class="text-primary">AUTO</span>-PARK
      </a>
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
        <section class="bloque">';
        if (!is_array($vehiculos)) {
            echo '<h1 class="bloque_h1">No tienes vehiculos asociados</h1>'
                . '<div class="row row-cols-1 row-cols-md-2 g-4 m-2">';
        } else {
            echo '<h1 class="bloque_h1">Tus vehiculos</h1>'
                . '<div class="row">';
            foreach ($vehiculos as $vehiculo) {
                echo '<div class="card m-3" style="width: 25rem;">
                            <div class="card-body">
                                <h4 class="card-title text-center">Datos vehiculo</h4>
                                <p class="card-text"><span class="span">Matricula: </span>' . $vehiculo['MATRICULA'] . '</p>
                                <p class="card-text"><span class="span">Modelo: </span>' . $vehiculo['VEHICULO'] . '</p>';
                if ($vehiculo['MOTOR'] === "Termico") {
                    echo '<p class="card-text"><span class="span">Motor: </span>Vehiculo termico</p>';
                } else if ($vehiculo['MOTOR'] === "Hibrido") {
                    echo '<p class="card-text"><span class="span">Motor: </span>Vehiculo Hibrido</p>';
                } else {
                    echo '<p class="card-text"><span class="span">Motor: </span>Vehiculo Electrico</p>';
                }
                echo '</div>
                            <div class="card-footer text-center text-body-secondary pt-3 pb-3">
                            <form method="POST" action="index.php?controller=Vehiculo&action=deleteVehiculo">
                                <input type="text" name="matricula"  value="' . $vehiculo['MATRICULA'] . '" hidden>
                                <button type="submit" class="btn btn-danger" id="btn_borrar">Borrar</button>
                            </form>
                        </div>
                        </div>
                        </div>';
            }
        }
    }

    public function formInsertVehiculo(){       

        echo '<div class="form">'
            . '<form method="POST" action="index.php?controller=Vehiculo&action=insertVehiculo">
        <div class="form-group mb-3">
            <label for="matricula" class="form-label">Matrícula</label>
            <input type="text" name="matricula" id="matricula" class="form-control" placeholder="Matrícula" required>
        </div>
        <div class="form-group mb-2">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control" placeholder="Marca" required>
        </div>
        <div class="form-group mb-2">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Modelo" required>
        </div>
        <div class="form-group mb-2">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="Moto">Moto</option>
                <option value="Coche">Coche</option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="motor" class="form-label">Motor</label>
            <select name="motor" id="motor" class="form-control" required>
                <option value="Termico">Térmico</option>
                <option value="Hibrido">Híbrido</option>
                <option value="Electrico">Eléctrico</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success" id="btn_vehiculo">Añadir Vehículo</button>
    </form>
    </div>'
            . '</div>';
    }
}
