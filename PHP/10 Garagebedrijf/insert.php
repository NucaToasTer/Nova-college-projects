<?php
include "Product.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $insertName = trim($_POST["product_name"]);
    $insertCategory = trim($_POST["product_category"]);
    $insertPrice = trim($_POST["product_price"]);
    $insertStock = trim($_POST["product_instock"]);

    if ($insertName == !NULL && $insertCategory == !NULL && $insertPrice == !NULL && $insertStock == !NULL) {
        $insert = Product::insert($insertName, $insertCategory, $insertPrice, $insertStock);
        echo "<p>Added: <strong>" . htmlspecialchars($insertName) . "</p>";
        echo '<p><a href="products.php">← Back to list</a></p>';
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Insert product garage</title>
</head>

<body>
    <form method="post">
        <h2>Insert product</h2>

        <?php if (!empty($error)): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <input type="text" name="product_name" required placeholder="Product name"><br>
        <input type="text" name="product_category" required placeholder="Product category"><br>
        <input type="number" name="product_price" required placeholder="Product price"><br>
        <input type="number" name="product_instock" required placeholder="Stock"><br>
        <button type="submit">Insert product</button>
    </form>
</body>

</html>