<?php
class Order
{
    //user properties
    public int $orderID;
    public string $customerID;
    public string $oderDate;
    public int $orderPaid;

    //data collection method
    public static function allOrders()
    {
        //connect to database
        include "conn.php";

        //query
        $query = "SELECT * FROM orders";
        $result = $conn->query($query);

        //prep result array
        $orders = [];

        while ($row = $result->fetch_assoc()) {

            //user object creation and variable assignment
            $order = new Order();
            $order->orderID = $row['order_id'];
            $order->customerID = $row['order_customer_id'];
            $order->oderDate = $row['order_date'];
            $order->orderPaid = $row['order_paid'];

            //array of objects
            $orders[] = $order;
        }

        $conn->close();

        return $orders;
    }

    public static function findById(int $id)
    {
        include "conn.php";

        $query = "SELECT * FROM orders WHERE order_id = " . $id;
        $result = $conn->query($query);

        $order = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $order = new Order();
            $order->orderID = $row['order_id'];
            $order->customerID = $row['order_customer_id'];
            $order->oderDate = $row['order_date'];
            $order->orderPaid = $row['order_paid'];
        }

        $conn->close();

        return $order;
    }
}
