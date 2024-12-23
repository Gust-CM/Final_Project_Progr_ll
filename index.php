<?php
include 'session_config.php'; // Inicia la sesión
include 'db.php'; // Conexión a la base de datos
include 'header.php';

// Consulta para obtener todos los libros
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-6">
    <h1 class="text-center mb-4">Catálogo de libros</h1>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-2 mb-4">';
                echo '  <div class="card h-100">';
                echo '      <img src="/Final_Project_Progr_ll/IMG_Libros/' . $row['cover_image'] . '" class="card-img-top" alt="' . $row['title'] . '">';
                echo '      <div class="card-body">';
                echo '          <h5 class="card-title">' . $row['title'] . '</h5>';
                echo '          <p class="card-text">Author: ' . $row['author'] . '</p>';
                echo '          <p class="card-text">Price: $' . $row['price'] . '</p>';
                echo '      </div>';
                echo '      <div class="card-footer text-center">';

                // Verifica si el usuario está logueado antes de mostrar el botón "Add to Cart"
                if (isset($_SESSION['user_id'])) {
                    echo '          <a href="add_to_cart.php?id=' . $row['id'] . '" class="btn btn-primary">Add to Cart</a>';
                } else {
                    echo '          <a href="login.php" class="btn btn-secondary">Login to add</a>';
                }

                echo '      </div>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-center">No books found.</p>';
        }
        ?>
    </div>
</div>

</body>
</html>

<?php include 'footer.php'; ?>