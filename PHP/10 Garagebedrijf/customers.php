<?php
include "Customer.php";

$customers = Customer::allCustomers();

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><td>ID</td><td>Voornaam</td><td>Achtrnaam</td><td>Address</td><td>Zipcode</td><td>City</td><td>Email</td></tr>";
foreach ($customers as $customer) {
    echo "<td>" . $customer->customerID . "</td>";
    echo "<td>" . $customer->firstName . "</td>";
    echo "<td>" . $customer->lastName  . "</td>";
    echo "<td>" . $customer->address  . "</td>";
    echo "<td>" . $customer->zipCode  . "</td>";
    echo "<td>" . $customer->city  . "</td>";
    echo "<td>" . $customer->email  . "</td>";
    echo "</tr>";
}
echo "</table>";

echo "<br>";

echo '<a href="http://localhost/garagebedrijf/orders.php">Orders</a><br>';
echo '<a href="http://localhost/garagebedrijf/products.php">Products</a><br>';
