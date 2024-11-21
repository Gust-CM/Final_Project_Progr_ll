<?php
session_start();

// Verificar si el índice del libro a eliminar está definido en la URL
if (isset($_GET['index'])) {
    $index = intval($_GET['index']); // Asegurarse de que sea un número entero

    // Verificar si el carrito está configurado en la sesión
    if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]); // Eliminar el libro del carrito
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindexar el carrito
    }
}

// Redirigir de vuelta al carrito
header('Location: cart.php');
exit;
