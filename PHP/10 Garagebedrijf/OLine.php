<?php
class OrderLine
{
    //user properties
    public int $orderID;
    public int $oLineID;
    public int $productID;
    public int $orderQuantity;

    public static function findById(int $id)
    {
        include "conn.php";

        $query = "SELECT * FROM order_lines WHERE order_line_order_id = " . $id;
        $result = $conn->query($query);

        $oLines = [];

        while ($row = $result->fetch_assoc()) {

            $oLine = new OrderLine();
            $oLine->orderID    = $row['order_line_order_id'];
            $oLine->oLineID = $row['order_line_id'];
            $oLine->productID   = $row['order_line_product_id'];
            $oLine->orderQuantity  = $row['order_line_quantity'];

            $oLines[] = $oLine;
        }


        $conn->close();

        return $oLines;
    }
}
