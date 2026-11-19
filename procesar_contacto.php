<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre  = $_POST['nombre'];
    $email   = $_POST['email'];
    $motivo  = $_POST['motivo'];
    $mensaje = $_POST['mensaje'];
    $fecha   = date("Y-m-d H:i:s");
    $lineaData = "nueva_solicitud:\n" . 
                 $fecha . "\n" . 
                 $nombre . "\n" . 
                 $email . "\n" . 
                 $motivo . "\n" . 
                 $mensaje . "\n" . 
                 "---------------------------------------------------------------\n";

    if (file_put_contents("contacto_mensajes.txt", $lineaData, FILE_APPEND)) {
        echo "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <title>Mensaje Enviado - U-CODE</title>
            <link rel='stylesheet' href='style.css'>
            <style>
                .msg-contacto { text-align: center; max-width: 550px; margin: 100px auto; padding: 40px; background: white; border-radius: 15px; box-shadow: 0 4px 20px rgba(74, 46, 128, 0.1); border-top: 5px solid var(--violeta-principal, #6C4AB6); }
                h2 { color: var(--violeta-oscuro, #4A2E80); font-family: 'Playfair Display', serif; margin-bottom: 15px; font-size: 2rem; }
                p { font-family: 'Urbanist', sans-serif; color: var(--marron-oscuro, #3E2723); font-size: 1.1rem; margin-bottom: 25px; line-height: 1.6; }
                .btn-volver { display: inline-block; background-color: #3E2723; color: white; padding: 12px 25px; text-decoration: none; border-radius: 25px; font-weight: bold; transition: background-color 0.3s; }
                .btn-volver:hover { background-color: #6C4AB6; }
            </style>
        </head>
        <body>
            <div class='msg-contacto'>
                <h2>¡Mensaje Recibido!</h2>
                <p>Gracias, <strong>$nombre</strong>. Tu consulta sobre <strong>\"$motivo\"</strong> ha sido registrada con éxito en nuestra mesa de ayuda.</p>
                <p>Analizaremos tu solicitud y te responderemos a la brevedad a tu correo: <br><em>$email</em></p>
                <a href='pagprincipal.html' class='btn-volver'>Volver al Inicio</a>
            </div>
        </body>
        </html>";
    } else {
        echo "Hubo un problema al procesar tu solicitud de contacto en el servidor.";
    }

} else {
    header("Location: pagprincipal.html");
    exit();
}
?>