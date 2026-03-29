<?php
include "OLine.php";
include "Customer.php";
include "Product.php";
include "Order.php";

$total = 0;

$orderLineItems = OrderLine::findById($_GET['id']);

$customer = Customer::findById($_GET['customerID']);

$order = Order::findById($_GET['id']);


echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Order ID</th><th>Customer ID</th><th>Order Date</th><th>Paid</th></tr>";
echo "<tr>";
echo "<td>" . $order->orderID . "</td>";
echo "<td>" . $order->customerID . "</td>";
echo "<td>" . $order->oderDate . "</td>";
echo "<td>" . ($order->orderPaid ? "Yes" : "No") . "</td>";
echo "</tr>";
echo "</table>";

echo "<br>";

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><td>Voornaam</td><td>Achtrnaam</td><td>Address</td><td>Zipcode</td><td>City</td><td>Email</td></tr>";
echo "<td>" . $customer->firstName . "</td>";
echo "<td>" . $customer->lastName  . "</td>";
echo "<td>" . $customer->address  . "</td>";
echo "<td>" . $customer->zipCode  . "</td>";
echo "<td>" . $customer->city  . "</td>";
echo "<td>" . $customer->email  . "</td>";
echo "</tr>";
echo "</table>";

echo "<br>";

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>
<td>Order line ID</td>
<td>Product ID</td>
<td>Order Quantity</td>
</tr>";
foreach ($orderLineItems as $orderLineItem) {
    echo "<td>" . $orderLineItem->oLineID . "</td>";
    echo "<td>" . $orderLineItem->productID  . "</td>";
    echo "<td>" . $orderLineItem->orderQuantity  . "</td>";
    echo "</tr>";
    $products[] = Product::findById($orderLineItem->productID);
}
echo "</table>";

echo "<br>";

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><td>Product name</td><td>Product category</td><td>Product price</td><td>Product stock</td></tr>";
foreach ($products as $product) {
    echo "<td>" . $product->productName . "</td>";
    echo "<td>" . $product->productCategory  . "</td>";
    echo "<td>" . $product->productPrice  . "</td>";
    echo "<td>" . $product->productStock  . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "<br>";

for ($i = 0; $i < sizeof($orderLineItems); $i++) {
    $total = $total + ($products[$i]->productPrice * $orderLineItems[$i]->orderQuantity);
}


echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><td>Total price</td></tr>";
echo "<td>" . $total . "</td>";
echo "</table>";

echo "<br>";


echo '<a href="http://localhost/garagebedrijf/orders.php">Orders</a><br>';
