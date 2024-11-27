<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final_project";
include "header.php";
include 'session_config.php'; // Inicia la sesión

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consultas SQL corregidas
// Más vendidos de la semana (simulado con libros que tienen menor stock)
$sqlWeekly = "
    SELECT * 
    FROM books 
    WHERE stock > 0 
    ORDER BY stock ASC 
    LIMIT 4";
$resultWeekly = $conn->query($sqlWeekly);

// Más vendidos del mes (simulado de manera similar)
$sqlMonthly = "
    SELECT * 
    FROM books 
    WHERE stock > 0 
    ORDER BY stock ASC 
    LIMIT 4 OFFSET 4"; // Se usa OFFSET para evitar repetición
$resultMonthly = $conn->query($sqlMonthly);

// Selección aleatoria
$sqlRandom = "SELECT * FROM books ORDER BY RAND() LIMIT 4";
$resultRandom = $conn->query($sqlRandom);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Sales - Book Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Top Sales</h1>

        <!-- Más vendidos de la semana -->
        <h2 class="mt-5">Best Sellers This Week</h2>
        <div class="row">
            <?php if ($resultWeekly && $resultWeekly->num_rows > 0): ?>
                <?php while ($row = $resultWeekly->fetch_assoc()): ?>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="<?= htmlspecialchars('/Final_Project_Progr_ll/IMG_Libros/' . $row['cover_image']) ?>" class="card-img-top" alt="Book Image">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($row['author']) ?></p>
                                <p class="card-text">$<?= htmlspecialchars($row['price']) ?></p>
                                <?php
                                if (isset($_SESSION['user_id'])) {
                                    // Si el usuario está logueado, permite agregar al carrito
                                    echo '<a href="add_to_cart.php?id=' . $row['id'] . '" class="btn btn-primary">Add to Cart</a>';
                                } else {
                                    // Si no está logueado, muestra un botón que redirige al login
                                    echo '<a href="login.php" class="btn btn-secondary">Login to add</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">No bestsellers this week.</p>
            <?php endif; ?>
        </div>

        <!-- Más vendidos del mes -->
        <h2 class="mt-5">Best Sellers This Month</h2>
        <div class="row">
            <?php if ($resultMonthly && $resultMonthly->num_rows > 0): ?>
                <?php while ($row = $resultMonthly->fetch_assoc()): ?>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="<?= htmlspecialchars('/Final_Project_Progr_ll/IMG_Libros/' . $row['cover_image']) ?>" class="card-img-top" alt="Book Image">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($row['author']) ?></p>
                                <p class="card-text">$<?= htmlspecialchars($row['price']) ?></p>
                                <?php
                                if (isset($_SESSION['user_id'])) {
                                    // Si el usuario está logueado, permite agregar al carrito
                                    echo '<a href="add_to_cart.php?id=' . $row['id'] . '" class="btn btn-primary">Add to Cart</a>';
                                } else {
                                    // Si no está logueado, muestra un botón que redirige al login
                                    echo '<a href="login.php" class="btn btn-secondary">Login to add</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">No bestsellers this month.</p>
            <?php endif; ?>
        </div>

        <!-- Selección aleatoria -->
        <h2 class="mt-5">Random Picks</h2>
        <div class="row">
            <?php if ($resultRandom && $resultRandom->num_rows > 0): ?>
                <?php while ($row = $resultRandom->fetch_assoc()): ?>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="<?= htmlspecialchars('/Final_Project_Progr_ll/IMG_Libros/' . $row['cover_image']) ?>" class="card-img-top" alt="Book Image">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($row['author']) ?></p>
                                <p class="card-text">$<?= htmlspecialchars($row['price']) ?></p>
                                <?php
                                if (isset($_SESSION['user_id'])) {
                                    // Si el usuario está logueado, permite agregar al carrito
                                    echo '<a href="add_to_cart.php?id=' . $row['id'] . '" class="btn btn-primary">Add to Cart</a>';
                                } else {
                                    // Si no está logueado, muestra un botón que redirige al login
                                    echo '<a href="login.php" class="btn btn-secondary">Login to add</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">No random picks available.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>

<?php
$conn->close();
include "footer.php";
?>