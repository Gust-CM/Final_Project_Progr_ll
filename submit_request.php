<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookTitle = htmlspecialchars($_POST['book_title']);
    $authorName = htmlspecialchars($_POST['author_name']);
    $contactInfo = htmlspecialchars($_POST['contact_info']);
    
    // Aquí podrías agregar lógica para guardar los datos en la base de datos.

    // Muestra un mensaje de éxito.
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Request Confirmation</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    </head>
    <body>
        <div class='container my-5'>
            <h2 class='text-center text-success'>¡Se realizó tu pedido satisfactoriamente!</h2>
            <p class='text-center'>Gracias por solicitar el libro: <strong>$bookTitle</strong></p>
            <p class='text-center'><a href='index.php' class='btn btn-primary'>Volver a la página principal</a></p>
        </div>
    </body>
    </html>";
}
?>
