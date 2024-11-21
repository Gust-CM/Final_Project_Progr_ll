<?php
session_start();
include 'db.php'; // Asegúrate de incluir la conexión a la base de datos

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Validar que se haya enviado un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $book_id = intval($_GET['id']);
    
    // Consulta para obtener el libro por su ID
    $sql = "SELECT id, title, price, cover_image FROM books WHERE id = $book_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
        
        // Si no hay un carrito en la sesión, inicializarlo
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        // Revisar si el libro ya está en el carrito
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $book['id']) {
                $item['quantity'] += 1; // Incrementar la cantidad si ya existe
                $found = true;
                break;
            }
        }
        
        // Si el libro no está en el carrito, agregarlo como nuevo
        if (!$found) {
            $book['quantity'] = 1; // Establecer cantidad inicial como 1
            $_SESSION['cart'][] = $book;
        }
    }
}

// Redirigir de vuelta a la página principal
header('Location: index.php');
exit();
?>
