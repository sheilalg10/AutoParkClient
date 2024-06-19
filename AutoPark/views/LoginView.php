<?php

class LoginView
{

    public function Login()
    {
?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-4 ps-3 d-flex justify-content-between">
            <p class="navbar-brand title"><span class="text-primary title">AUTO</span>-PARK</p>
            <a href="index.php?controller=Index&action=showIndex" class="a">Inicio</a>
        </nav>
        <div class="container-xl">
        <div class="login">
            <div class="wrapper">
                <form method="POST" action="index.php?controller=Login&action=controlUser">
                    <h1>Iniciar Sesion</h1>
                    <div class="input-box">
                        <input type="text" name="email" id="email" placeholder="Email" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        </svg>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" id="password" placeholder="Contraseña" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                        </svg>
                    </div>
                    <div class="text-center mb-3 ">

                        <a href="index.php?controller=Login&action=showFormPass" class="a">¿Has olvidado tu contraseña?</a>
                    </div>
                    <button type="submit" class="button">Iniciar Sesión</button>
                    <div class="text-start mt-3 ">
                        <span>¿Eres nuevo? </span><a href="index.php?controller=Login&action=showFormRegister" class="a">Registrate</a>
                    </div>
                </form>
            </div>

            <?php            
            echo '</div>
            </div>';
        }

        public function formUpdate()
        {
            ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light p-4 ps-3 d-flex justify-content-between">
                <a href="#" class="navbar-brand"><span class="text-primary">AUTO</span>-PARK</a>
                <a class="a" href="index.php?controller=Login&action=showLogin">Volver</a>
            </nav>
            <div class="login">
                <div class="wrapper">
                    <form method="POST" action="index.php?controller=Login&action=controlUpdate">
                        <h1>Cambio Contraseña</h1>
                        <div class="input-box">
                            <input type="text" name="email" id="email" placeholder="Email" required>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                        </div>
                        <div class="input-box">
                            <input type="password" name="password" id="password" placeholder="Contraseña" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}" required>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                            </svg>
                        </div>
                        <button type="submit" class="button">Cambiar Contraseña</button>
                    </form>
                </div>
            </div>
        <?php
        }

        public function FormRegister()
        {
        ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light p-4 ps-3 d-flex justify-content-between">
                <a href="#" class="navbar-brand"><span class="text-primary">AUTO</span>-PARK</a>
                <a class="a" href="index.php?controller=Login&action=showLogin">Volver</a>
            </nav>
            <div class="login2 mt-5">
                <div class="wrapper2">
                    <form method="POST" action="index.php?controller=Login&action=controlInsert">
                        <h1>Registro</h1>
                        <div class="form-group">
                            <label for="dni" class="form-label">Dni</label>
                            <div class="input-box2">
                                <input type="text" name="dni" id="dni" placeholder="Dni" pattern="\d{8}[A-Z]" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre</label>
                            <div class="input-box2">
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="primerApellido" class="form-label">Primer Apellido</label>
                            <label for="SegundoApellido" class="form-label separado">Segundo Apellido</label>
                            <div class="input-box2">
                                <input type="text" name="primerApellido" class="input2 me-4" id="primerApellido" placeholder="Primer Apellido" required>
                                <input type="text" name="segundoApellido" class="input2" id="segundoApellido" placeholder="Segundo Apellido">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="fec_nacimiento" class="form-label">Fecha Nacimiento</label>
                            <label for="telefono" class="form-label separado">Telefono</label>
                            <div class="input-box2">
                                <input type="date" name="fec_nacimiento" class="input2 me-4" id="fec_nacimiento" placeholder="Fecha Nacimiento" min="18" required>
                                <input type="text" name="telefono" class="input2" id="telefono" placeholder="Telefono: 000 00 00 00" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direccion" class="form-label">Direccion</label>
                            <label for="ciudad" class="form-label separado2">Ciudad</label>
                            <div class="input-box2">
                                <input type="text" name="direccion" class="input2 me-4" id="direccion" placeholder="Direccion" required>
                                <input type="text" name="ciudad" class="input2" id="ciudad" placeholder="Ciudad" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-box2">
                                <input type="email" name="email" id="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Contraseña</label>
                            <div class="input-box2">
                                <input type="password" name="password" id="password" placeholder="Contraseña" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password2" class="form-label">Repetir Contraseña</label>
                            <div class="input-box2">
                                <input type="password" name="password2" id="password2" placeholder="Repetir Contraseña" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}" required>
                            </div>
                        </div>
                        <button type="submit" class="button mt-3">Registrarse</button>
                    </form>
                </div>
            </div>
    <?php
        }
    }
