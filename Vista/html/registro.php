<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clínica Dental - Registro de Pacientes</title>
    <link rel="stylesheet" href="/odontologia/Vista/css/registro.css" />
    <link href="Vista/jquery/jquery-ui-1.14.1/jquery-ui.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="Vista/jquery/jquery.js"></script>
    <script src="Vista/jquery/jquery-ui-1.14.1/jquery-ui.js" type="text/javascript"></script>
    <script src="Vista/js/script.js" type="text/javascript"></script>
</head>

<body>
    <div id="app">
        <div class="registration-container">
            <div class="registration-header">
                <div class="logo-container">
                    <div class="logo">
                        <span class="tooth-icon">🦷</span>
                    </div>
                </div>
                <h1>Clínica Dental Sonrisa</h1>
                <p class="subtitle">Cree su cuenta de paciente</p>
            </div>

            <form action="index.php?accion=registrarUsuario" method="post" class="registration-form" novalidate>
                <div class="form-group">
                    <div class="input-container">
                        <!-- Número de identificación -->
                        <input type="text" name="PacIdentificacion" id="id-number" class="form-input" required
                            pattern=".{5,}" title="El número de identificación debe tener al menos 5 caracteres">
                        <label for="id-number" class="form-label">Número de identificación*</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <div class="input-container">
                            <!-- Nombre -->
                            <input type="text" name="PacNombres" id="first-name" class="form-input" required>
                            <label for="first-name" class="form-label">Nombre*</label>
                        </div>
                    </div>

                    <div class="form-group half">
                        <div class="input-container">
                            <!-- Apellido -->
                            <input type="text" name="PacApellidos" id="last-name" class="form-input" required>
                            <label for="last-name" class="form-label">Apellido*</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-container">
                        <!-- Sexo -->
                        <select name="PacSexo" id="sexo" class="form-input date-input" required>
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            <option value="O">Otro</option>
                        </select>
                        <label for="sexo" class="form-label date-label">Sexo*</label>
                    </div>
                </div>





                <div class="form-group">
                    <div class="input-container">
                        <!-- Fecha de nacimiento -->
                        <input type="date" name="PacFechaNacimiento" id="birth-date" class="form-input date-input"
                            required>
                        <label for="birth-date" class="form-label date-label">Fecha de nacimiento*</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-container">
                        <!-- Correo -->
                        <input type="email" name="correo" id="email" class="form-input" required>
                        <label for="email" class="form-label">Correo electrónico*</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-container">
                        <!-- Contraseña -->
                        <input type="password" name="contrasena" id="password" class="form-input" required
                            pattern="^(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{8,}$"
                            title="La contraseña debe tener al menos 8 caracteres, incluir mayúsculas, números y caracteres especiales">
                        <label for="password" class="form-label">Contraseña*</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-container">
                        <!-- Confirmar contraseña (solo frontend) -->
                        <input type="password" id="confirm-password" class="form-input" required>
                        <label for="confirm-password" class="form-label">Confirmar contraseña*</label>
                    </div>
                </div>

                <div class="form-group terms-container">
                    <div class="checkbox-container">
                        <input type="checkbox" id="terms" class="form-checkbox" required>
                        <label for="terms" class="checkbox-label">
                            Al registrarse, usted acepta nuestros
                            <a href="#" class="terms-link">términos y condiciones</a> y
                            <a href="#" class="terms-link">política de privacidad</a>.
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <input type="hidden" name="rol" value="paciente">
                    <button type="submit" class="register-button">Registrar</button>
                </div>

                <p class="required-fields">(*) Campos obligatorios</p>
            </form>
        </div>
    </div>
</body>

</html>