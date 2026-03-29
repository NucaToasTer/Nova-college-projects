<?php
include "Order.php";

$orders = Order::allOrders();

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Order ID</th><th>Customer ID</th><th>Order Date</th><th>Paid</th></tr>";
foreach ($orders as $order) {
    echo "<tr>";
    echo "<td><a href='orderLine.php?id=" . $order->orderID . "&customerID=" . $order->customerID . "'>" . $order->orderID . "</a></td>";
    echo "<td>" . $order->customerID . "</td>";
    echo "<td>" . $order->oderDate . "</td>";
    echo "<td>" . ($order->orderPaid ? "Yes" : "No") . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "<br>";
echo '<a href="http://localhost/garagebedrijf/customers.php">Customers</a><br>';
echo '<a href="http://localhost/garagebedrijf/products.php">Products</a><br>';
