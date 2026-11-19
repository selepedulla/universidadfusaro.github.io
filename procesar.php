<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $carrera  = htmlspecialchars(trim($_POST['carrera']));
    $nombre   = htmlspecialchars(trim($_POST['nombre']));
    $dni      = htmlspecialchars(trim($_POST['dni']));
    $email    = htmlspecialchars(trim($_POST['email']));
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $turno    = htmlspecialchars(trim($_POST['turno']));
    $fecha    = date("Y-m-d H:i:s");

    if (!empty($carrera) && !empty($nombre) && !empty($dni) && !empty($email)) {

        $lineaData = "Fecha: $fecha | Carrera: $carrera | Alumno: $nombre | DNI: $dni | Email: $email | Tel: $telefono | Turno: $turno" . PHP_EOL;
        $archivo = "inscripciones.txt";

        if (file_put_contents($archivo, $lineaData, FILE_APPEND | LOCK_EX)) {
            echo "
            <!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <title>Inscripción Exitosa</title>
                <link rel='stylesheet' href='style.css'>
                <style>
                    .msg-exito { text-align: center; max-width: 500px; margin: 100px auto; padding: 40px; background: white; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); border-top: 5px solid #6C4AB6; }
                    h2 { color: #4A2E80; font-family: 'Playfair Display', serif; margin-bottom: 15px;}
                    .btn-volver { display: inline-block; margin-top: 20px; background-color: #3E2723; color: white; padding: 10px 20px; text-decoration: none; border-radius: 20px; font-weight: bold; }
                    .btn-volver:hover { background-color: #6C4AB6; }
                </style>
            </head>
            <body>
                <div class='msg-exito'>
                    <h2>¡Inscripción Confirmada!</h2>
                    <p>Hola <strong>$nombre</strong>, te has anotado correctamente a la carrera <strong>$carrera</strong> para el turno $turno.</p>
                    <p>Pronto nos comunicaremos a tu correo: <em>$email</em>.</p>
                    <a href='index.html' class='btn-volver'>Volver al Inicio</a>
                </div>
            </body>
            </html>";
        } else {
            echo "Hubo un error al guardar tu inscripción en el servidor. Reintenta más tarde.";
        }
    } else {
        echo "Por favor, completa todos los campos requeridos.";
    }
} else {
    header("Location: pagprincipal.html");
    exit();
}
?>