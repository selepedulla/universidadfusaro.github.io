<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre   = $_POST['nombre'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $fecha    = date("Y-m-d H:i:s"); 
    $lineaData = "nuevo_usuario:\n" . 
                 $fecha . "\n" . 
                 $nombre . "\n" . 
                 $email . "\n" . 
                 $password . "\n" . 
                 "---------------------------------------------------------------\n";

    if (file_put_contents("usuarios_registrados.txt", $lineaData, FILE_APPEND)) {
        echo "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <title>Registro Exitoso - U-CODE</title>
            <link rel='stylesheet' href='style.css'>
            <style>
                .msg-registro { text-align: center; max-width: 550px; margin: 100px auto; padding: 40px; background: white; border-radius: 15px; box-shadow: 0 4px 20px rgba(74, 46, 128, 0.1); border-top: 5px solid var(--violeta-principal, #6C4AB6); }
                h2 { color: var(--violeta-oscuro, #4A2E80); font-family: 'Playfair Display', serif; margin-bottom: 15px; font-size: 2rem; }
                p { font-family: 'Urbanist', sans-serif; color: var(--marron-oscuro, #3E2723); font-size: 1.1rem; margin-bottom: 25px; line-height: 1.6; }
                .btn-login { display: inline-block; background-color: #3E2723; color: white; padding: 12px 25px; text-decoration: none; border-radius: 25px; font-weight: bold; transition: background-color 0.3s; }
                .btn-login:hover { background-color: #6C4AB6; }
            </style>
        </head>
        <body>
            <div class='msg-registro'>
                <h2>¡Cuenta Creada con Éxito!</h2>
                <p>Hola <strong>$nombre</strong>, tu usuario institucional ha sido configurado correctamente con el correo:<br><em>$email</em></p>
                <p>Ya podés ingresar al portal estudiantil para gestionar tus datos.</p>
                <a href='login.html' class='btn-login'>Ir a Iniciar Sesión</a>
            </div>
        </body>
        </html>";
    } else {
        echo "Hubo un problema al crear tu cuenta de estudiante en el servidor.";
    }

} else {
    header("Location: registro.html");
    exit();
}
?>