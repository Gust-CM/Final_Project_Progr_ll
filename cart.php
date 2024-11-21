<?php
session_start();
include 'header.php';

// Verificar si el carrito tiene elementos
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h1 class="text-center mb-4">Shopping Cart</h1>
    <?php if (count($cart) > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($cart as $index => $item): 
                    // Validar y calcular subtotal
                    $price = is_numeric($item['price']) ? floatval($item['price']) : 0;
                    $quantity = is_numeric($item['quantity']) ? intval($item['quantity']) : 0;
                    $subtotal = $price * $quantity;
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><img src="/Final_Project_Progr_ll/IMG_Libros/<?php echo htmlspecialchars($item['cover_image']); ?>" width="50" alt="<?php echo htmlspecialchars($item['title']); ?>"></td>
                        <td><?php echo htmlspecialchars($item['title']); ?></td>
                        <td>$<?php echo number_format($price, 2); ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td>$<?php echo number_format($subtotal, 2); ?></td>
                        <td>
                            <a href="remove_from_cart.php?index=<?php echo $index; ?>" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-end">
            <h4>Total: $<?php echo number_format($total, 2); ?></h4>
        </div>
    <?php else: ?>
        <p class="text-center">Your cart is empty.</p>
    <?php endif; ?>
</div>
</body>
</html>

<?php
include 'footer.php';
?>