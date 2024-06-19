<?php

class ReservaView
{

    public function getReservaCliente($data)
    {
        $reservas = json_decode($data, true);
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
    <div class="container mt-4">';
        if (!is_array($reservas)) {
            echo '<h1 class="bloque_h1">No tienes reservas adquiridas</h1>'
                . '<div class="row">';
        } else {
            echo '<h1 class="bloque_h1">Tus reservas</h1>'
                . '<div class="row">'
                . '<table class="table m-2" id="table">'
                . '<thead class="text-center table-dark" id="thead">'
                . '<th scope="col">ENTRADA</th>'
                . '<th scope="col">SALIDA</th>'
                . '<th scope="col">PRECIO</th>'
                . '<th scope="col">VEHICULO</th>'
                . '<th scope="col">PARKING</th>'
                . '<th scope="col">PLAZA</th>'
                . '<th scope="col"></th>
                </thead>';
            foreach ($reservas as $reserva) {
                echo '<tr class="text-center">
                        <td class="td">'; 
                        $timestamp = strtotime($reserva['ENTRADA']);
                        $fecha = strftime("%d-%m-%Y", $timestamp);
                        echo $fecha;
                        echo '</td>
                        <td class="td">'; 
                        $timestamp2 = strtotime($reserva['SALIDA']);
                        $fecha2 = strftime("%d-%m-%Y", $timestamp2);
                        echo $fecha2;
                        echo '</td>
                        <td class="td">' . $reserva['PRECIO'] . '€</td>
                        <td class="td">' . $reserva['VEHICULO'] . '</td>
                        <td class="td">' . $reserva['PARKING'] . '</td>
                        <td class="td">' . $reserva['PLAZA'] . '</td>
                        <td>
                            <form method="POST" action="index.php?controller=Reserva&action=deleteReserva">
                                <input type="text" name="Identificador"  value="' . $reserva['IDENTIFICADOR'] . '" hidden>
                                <button type="submit" class="btn btn-danger ms-3">Cancelar</button>
                            </form>
                        </td>
                    </tr>';
            }
            echo '</tbody>
                </table>
                </div>';
        }
    }

    public function formFechaReserva()
    {
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
        <div class="container mt-4">'
            . '<h1 class="bloque_h1">Reservar tu plaza</h1>'
            . '<div class="form">'
            . '<form method="POST" action="index.php?controller=Reserva&action=getcontrolReserva&Id_parking=' . $_GET['Id_parking'] . '">'
            . '<div class="form-group mb-2">
                    <label for="fec_entrada" class="form-label">Fecha entrada</label>
                    <input type="date" name="fec_entrada" id="fec_entrada" required>                       
                </div>
                <div class="form-group mb-2">
                    <label for="fec_salida" class="form-label">Fecha salida</label>                        
                    <input type="date" name="fec_salida" id="fec_salida" required>                        
                </div>
                <button type="submit" class="btn btn-primary">BUSCAR</button>'
            . '</form>'
            . '</div>';
    }

    public function getTablePlazas($data, $fec_entrada, $fec_salida)
    {
        $plazas = json_decode($data, true);

        echo '<div class="row">';
        echo '<h1 class="bloque_h1">Plazas disponibles</h1>'
            . '<div class="row">'
            . '<table class="table m-2 text-center" id="table">'
            . '<thead class="table-dark" id="thead">'
            . '<th class="table__th" scope="col">PLAZA</th>'
            . '<th class="table__th" scope="col">PLANTA</th>'
            . '<th class="table__th" scope="col">VEHICULO</th>'
            . '<th class="table__th" scope="col">PRECIO/DIA</th>'
            . '<th class="table__th" scope="col">WALLBOX</th>'
            . '<th class="table__th" scope="col"></th>
            </thead>';
        foreach ($plazas as $plaza) {
            echo '<tr class="table__tr">
                        <td class="table__td">' . $plaza['PLAZA'] . '</td>
                        <td class="table__td">' . $plaza['PLANTA'] . '</td>
                        <td class="table__td">' . $plaza['VEHICULO'] . '</td>
                        <td class="table__td">' . $plaza['PRECIO'] . ' €</td>
                        <td class="table__td">' . $plaza['WALLBOX'] . '</td>              
                            <td class="table__td">
                            <form method="POST" action="index.php?controller=Reserva&action=formInsert">
                                <input type="text" name="Identificador"  value="' . $plaza['IDENTIFICADOR'] . '" hidden>
                                    <input type="text" name="fec_entrada"  value="' . $fec_entrada . '" hidden>
                                        <input type="text" name="fec_salida"  value="' . $fec_salida . '" hidden>
                                <button type="submit" class="btn btn-primary ms-3">Reservar</button>
                            </form>
                        </td>
                    </tr>';
        }
        echo '</tbody>
                </table>
        </div>
        </div>';
    }

    public function formInsert($identificador, $data, $fec_entrada, $fec_salida)
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
    <h1 class="bloque_h1">Confirmacion</h1>
    <div class="form mt-3">
    <div class="row">
    <form method="POST" action="index.php?controller=Reserva&action=insertReserva">
    <div class="form-group mb-3">
    <label for="fec_entrada" class="form-label">Fecha Entrada</label>
    <input type="date" name="fec_entrada" value="' . $fec_entrada . '">
    </div>
    <div class="form-group mb-3">
    <label for="fec_salida" class="form-label">Fecha Salida</label>
    <input type="date" name="fec_salida" value="' . $fec_salida . '">
    </div>
    <div class="form-group mb-3">
    <input type="number" name="Identificador" value="' . $identificador . '" hidden>
    </div>
    <div class="form-group mb-3">
    <label for="matricula" class="form-label">Matricula</label>
    <select class="form-control" name="matricula" required>';
        foreach ($vehiculos as $vehiculo) {
            echo '<option value="' . $vehiculo['MATRICULA'] . '">' . $vehiculo['VEHICULO'] . '</option>';
        }
        echo '</select>
        </div>
        <div class="form-group mb-3">
        <label for="Plaza" class="form-label">Plaza</label>
        <input type="number" name="Identificador" value="' . $identificador . '">
        </div>
        <button type="submit" class="btn btn-success" id="btn_reserv">Reservar</button>
        </div>
        </form>
        </div>
        </div>
        </div>';
    }
}
