<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y sanitizar datos
    $nombre = strip_tags(trim($_POST["nombre"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensaje = trim($_POST["mensaje"]);

    // Validar datos
    if (empty($nombre) || empty($mensaje) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor completa el formulario correctamente.";
        exit;
    }

    $destinatario = "yeraydelgado54@gmail.com"; // Cambia aquí tu correo
    $asunto = "Nuevo mensaje desde formulario web";

    // Construir contenido del correo
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo: $email\n\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    // Encabezados
    $cabeceras = "From: $nombre <$email>";

    // Enviar correo
    if (mail($destinatario, $asunto, $contenido, $cabeceras)) {
        echo "¡Correo enviado correctamente! Gracias por contactarnos.";
    } else {
        echo "Error al enviar el correo. Intenta nuevamente.";
    }
} else {
    echo "Acceso no permitido.";
}
?>