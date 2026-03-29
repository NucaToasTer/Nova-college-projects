<?php
include "Product.php";

$products = Product::allProducts();

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $deleted = Product::delete($_GET['id']);
}

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><td>Product ID</td><td>Product name</td><td>Product category</td><td>Product price</td><td>Product stock</td></tr>";
foreach ($products as $product) {
    echo "<td>" . $product->productID . "</td>";
    echo "<td>" . $product->productName . "</td>";
    echo "<td>" . $product->productCategory  . "</td>";
    echo "<td>" . $product->productPrice  . "</td>";
    echo "<td>" . $product->productStock  . "</td>";
    echo "<td>";
    echo '<a href="edite.php?id=' . $product->productID . '">Edite</a>';
    echo " | ";
    echo '<a href="?action=delete&id=' . $product->productID . '" onclick="return confirm(\'Delete this product?\');">Delete</a>';
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

echo "<br>";

echo '<a href="insert.php">Insert</a>';
echo "<br>";
echo '<a href="http://localhost/garagebedrijf/customers.php">Customers</a><br>';
echo '<a href="http://localhost/garagebedrijf/orders.php">Orders</a><br>';
