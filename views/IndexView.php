<?php

/**
 * Clase FIndexView
 * 
 * Esta clase se encarga de mostrar la información de la pagina principal.
 */

class IndexView {

    /**
     * Método para mostrar la pagina principal y las reseñas de la aplicacion.
     * @param string $resenas   Datos de las reseñas en formato JSON.
     */
    
    public function showIndex($resenas) {
                
        //NAV de la pagina principal
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light p-4 ps-3 d-flex justify-content-between">
      <p class="navbar-brand title"><span class="text-primary">AUTO</span>-PARK</p>
      <a href="index.php?controller=Login&action=showLogin" class="btn btn-primary">Sign In / Sing Up</a>
    </nav>
    
    <div class="container p-3 mt-3">
      <div id="carrusel" class="carousel slide m-3 mb-5 border border-primary border-3 rounded" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carrusel"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carrusel"
            data-bs-slide-to="1"
            aria-current="true"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carrusel"
            data-bs-slide-to="2"
            aria-current="true"
            aria-label="Slide 3"
          ></button>
        </div>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/images/img_carrusel1.jpg" class="d-block w-100" />
            <div class="div_carousel">
                <div class="carousel-caption">                
                    <h1 class="h1_carrusel">¿NO ENCUENTRAS APARCAMIENTO?</h1>
                    <p class="p_carrusel">No te preocupes, ahorra tiempo y dinero en <span class="span_carrusel">AUTO</span>-PARK</p>
                </div>
            </div>
          </div>

          <div class="carousel-item">
            <img src="assets/images/imagen_carrusel2.jpg" class="d-block w-100"/>
            <div class="div_carousel">
                <div class="carousel-caption">
                    <h1 class="h1_carrusel">¿APARCAMIENTO CERCA DE CASA?</h1>
                    <p class="p_carrusel">Mira todas nuestras ubicaciones y aparca cerca de casa</p>
                </div>
            </div>
          </div>

          <div class="carousel-item">
            <img src="assets/images/imagen_carrusel3.jpg" class="d-block w-100"/>
            <div class="div_carousel">            
                <div class="carousel-caption">
                    <h1 class="h1_carrusel">¿TU COCHE ESTA SUCIO?</h1>
                    <p class="p_carrusel">Ahora en <span class="span_carrusel">AUTO</span>-PARK no solo ofrecemos servicio de limpieza para su vehiculo</p>
                </div>
            </div>    
          </div>          
          
        </div>
      </div>
            
      <section class="bloque">
        <h2 class="bloque_h2 text-center pt-3 pb-3">ESTO ES LO QUE OPINAN NUESTROS CLIENTES</h2>
        <div class="row row-cols-1 row-cols-md-2 g-4">';
        foreach($resenas as $resena){
            echo '<div class="col-sm-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">'.$resena['Nombre_cliente'].'</h5>
                        <h5><span class="fw-bold">Opina sobre: </span>'.$resena['Nombre_Parking'].'</h5>
                        <p class="card-text">'.$resena['Comentario'].'</p>
                    </div>
                    <div class="card-footer text-body-secondary">
                        <p><span class="fw-bold">Puntuación: </span>'.$resena['Puntuacion'].'/10</p>
                    </div>
                </div>
                </div>';
        }
                
        echo '</div>
      </section>
    </div>';
    }
}
