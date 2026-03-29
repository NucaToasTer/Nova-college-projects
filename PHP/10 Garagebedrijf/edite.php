<?php
include "Product.php";
$eProduct = Product::findById($_GET['id']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $editeName = trim($_POST["product_name"]);
    $editeCategory = trim($_POST["product_category"]);
    $editePrice = trim($_POST["product_price"]);
    $editeStock = trim($_POST["product_instock"]);

    if ($editeName == !NULL && $editeCategory == !NULL && $editePrice == !NULL && $editeStock == !NULL) {
        $edite = Product::edite($_GET['id'], $editeName, $editeCategory, $editePrice, $editeStock);
        echo "<p>Updated: <strong>" . htmlspecialchars($editeName) . "</p>";
        echo '<p><a href="products.php">← Back to list</a></p>';
        exit;
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit edite</title>
</head>

<body>
    <h1>Edit edite</h1>
    <form method="post">
        <label>Product name<br><input type="text" name="product_name" value="<?= $eProduct->productName ?>"></label><br><br>
        <label>Product category<br><input type="text" name="product_category" value="<?= $eProduct->productCategory ?>"></label><br><br>
        <label>Product price<br><input type="number" name="product_price" value="<?= $eProduct->productPrice ?>"></label><br><br>
        <label>Product stock<br><input type="number" name="product_instock" value="<?= $eProduct->productStock ?>"></label><br><br>

        <button type="submit">Save Changes</button>
    </form>
    <p><a href="products.php">← Back to products</a></p>
</body>

</html>