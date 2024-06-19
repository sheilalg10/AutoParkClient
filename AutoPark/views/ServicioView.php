<?php

class ServicioView
{

    public function getClienteServicio($data)
    {
        $servicios = json_decode($data, true);
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
        if (!is_array($servicios)) {
            echo '<h1 class="bloque_h1">No tienes servicios adquiridos</h1>'
                . '<div class="row">';
        } else {
            echo '<h1 class="bloque_h1">Tus servicios</h1>'
                . '<div class="row">'
                . '<table class="table m-2" id="table">'
                . '<thead class="text-center table-dark" id="thead">'
                . '<th scope="col">Servicio</th>'
                . '<th scope="col">Trabajador</th>'
                . '<th scope="col">Matricula</th>'
                . '<th scope="col">Vehiculo</th>'
                . '<th scope="col">Duracion</th>'
                . '<th scope="col">Precio</th>'
                . '<th scope="col">Fecha</th>'
                . '<th scope="col">Parking</th>'
                . '<th scope="col"></th>
                </thead>';
            foreach ($servicios as $servicio) {
                echo '<tr class="text-center">
                        <td class="td">' . $servicio['SERVICIO'] . '</td>
                        <td class="td">' . $servicio['TRABAJADOR'] . '</td>
                        <td class="td">' . $servicio['MATRICULA'] . '</td>
                        <td class="td">' . $servicio['VEHICULO'] . '</td>
                        <td class="td">' . $servicio['DURACION'] . ' min</td>
                        <td class="td">' . $servicio['PRECIO'] . '€</td>
                        <td class="td">'; 
                        $timestamp = strtotime($servicio['FECHA']);
                        $fecha = strftime("%d-%m-%Y", $timestamp);
                        echo $fecha;
                        echo '</td>
                        <td class="td">' . $servicio['PARKING'] . '</td>
                        <td>
                            <form method="POST" action="index.php?controller=Servicio&action=deleteServicioCliente">
                                <input type="text" name="Identificador"  value="' . $servicio['IDENTIFICADOR'] . '" hidden>
                                <button type="submit" class="btn btn-danger ms-3" id="btn_cancelar">Cancelar</button>
                            </form>
                        </td>
                    </tr>';
            }
            echo '</tbody>
                </table>
                </section>
                </div>';
        }
    }

    public function getServiciosParking($data)
    {
        $servicios = json_decode($data, true);
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
            <li><a class="dropdown-item" href="#">Mis Reservas</a></li>
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
        if (!is_array($servicios)) {
            echo '<h1 class="bloque_h1">El parking no tiene servicios disponibles</h1>'
                . '<div class="row">';
        } else {
            echo '<h1 class="bloque_h1">Servicios del parking</h1>'
                . '<div class="row">'
                . '<table class="table m-2" id="table">'
                . '<thead class="table-dark">'
                . '<th scope="col">Servicio</th>'
                . '<th scope="col">Precio</th>'
                . '<th scope="col">Duracion</th>
                </thead>';
            foreach ($servicios as $servicio) {
                echo '<tr class="table__tr">
                        <td class="table__td">' . $servicio['Nombre_Servicio'] . '</td>
                        <td class="table__td">' . $servicio['Precio'] . '€</td>
                        <td class="table__td">' . $servicio['Duracion'] . ' min</td>
                    </tr>';
            }
            echo '</tbody>
                </table>';
        }
    }

    public function formInsertServicio($data, $datavehiculo)
    {
        $servicios = json_decode($data, true);
        $vehiculos = json_decode($datavehiculo,true);
        
        echo '<div class="form mt-3">'
            . '<form method="POST" action="index.php?controller=Servicio&action=insertServicio">'
            . '<div class="form-group mb-3">
                    <label for="fec_realizacion" class="form-label">Fecha Servicio</label>
                    <input type="date" name="fec_realizacion" id="fec_realizacion" required>                                                                        
                </div>
                <div class="form-group mb-3">
                    <label for="servicio" class="form-label">Servicio</label>
                    <select name="Id_servicio" id="Id_servicio" class="form-control" required>';
        foreach ($servicios as $servicio) {
            echo '<option value="' . $servicio['Identificador'] . '">' . $servicio['Nombre_Servicio'] . '</option>';
        }

            echo '</select>
                </div>
                <div class="form-group mb-3">
                    <label for="matricula" class="form-label">Matricula</label>
                    <select name="matricula" id="matricula" class="form-control" required>';
        foreach ($vehiculos as $vehiculo) {
            echo '<option value="' . $vehiculo['MATRICULA'] . '">' . $vehiculo['MATRICULA'] . ' - '.$vehiculo['VEHICULO'].'</option>';
        }

            echo '</select>
                </div>                    
                    <button type="submit" class="btn btn-success" id="btn_serv">Añadir Servicio</button>'
            . '</form>'
            . '</div>'
            . '</div>
            </div>';
    }
}
