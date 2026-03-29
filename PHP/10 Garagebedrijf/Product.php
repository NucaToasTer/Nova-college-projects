<?php
class Product
{
    //user properties
    public int $productID;
    public string $productName;
    public string $productCategory;
    public int $productPrice;
    public int $productStock;


    //data collection method
    public static function allProducts()
    {
        //connect to database
        include "conn.php";

        //query
        $query = "SELECT * FROM products";
        $result = $conn->query($query);

        //prep result array
        $products = [];

        while ($row = $result->fetch_assoc()) {

            //user object creation and variable assignment
            $product = new Product();
            $product->productID = $row['product_id'];
            $product->productName = $row['product_name'];
            $product->productCategory = $row['product_category'];
            $product->productPrice = $row['product_price'];
            $product->productStock = $row['product_instock'];

            //array of objects
            $products[] = $product;
        }

        $conn->close();

        return $products;
    }

    public static function findById(int $id)
    {
        include "conn.php";

        $query = "SELECT * FROM products WHERE product_id = " . $id;
        $result = $conn->query($query);

        $product = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product = new Product();
            $product->productID = $row['product_id'];
            $product->productName = $row['product_name'];
            $product->productCategory = $row['product_category'];
            $product->productPrice = $row['product_price'];
            $product->productStock = $row['product_instock'];
        }

        $conn->close();

        return $product;
    }

    public static function insert($productName, $productCategory, $productPrice, $productStock)
    {
        include "conn.php";

        // Escape values to prevent SQL injection
        $productName = mysqli_real_escape_string($conn, $productName);
        $productCategory = mysqli_real_escape_string($conn, $productCategory);
        $productPrice = mysqli_real_escape_string($conn, $productPrice);
        $productStock = mysqli_real_escape_string($conn, $productStock);

        // SQL query to insert new session
        $sql = "INSERT INTO products (
            product_name,
            product_category,
            product_price,
            product_instock
            ) VALUES (
                '" . $productName . "',
                '" . $productCategory . "',
                '" . $productPrice . "',
                '" . $productStock . "'
        )";
        $conn->query($sql);

        $conn->close();
    }

    public static function edite($productID, $productName, $productCategory, $productPrice, $productStock)
    {
        include "conn.php";

        // Escape values to prevent SQL injection
        $productID = mysqli_real_escape_string($conn, $productID);
        $productName = mysqli_real_escape_string($conn, $productName);
        $productCategory = mysqli_real_escape_string($conn, $productCategory);
        $productPrice = mysqli_real_escape_string($conn, $productPrice);
        $productStock = mysqli_real_escape_string($conn, $productStock);

        // SQL query to insert new session
        $sql = "UPDATE products SET
            product_name = '" . $productName . "',
            product_category = '" . $productCategory . "',
            product_price = '" . $productPrice . "',
            product_instock = '" . $productStock . "'
            WHERE product_id = " . $productID;

        $conn->query($sql);

        $conn->close();
    }

    public static function delete($id)
    {
        include "conn.php";

        $id = mysqli_real_escape_string($conn, $id);

        $sql = "DELETE FROM products WHERE product_id = '" . $id . "'";
        $conn->query($sql);

        $conn->close();
        header('Location: products.php');
    }
}
