<?php
class Customer
{
    //user properties
    public int $customerID;
    public string $firstName;
    public string $lastName;
    public string $address;
    public string $zipCode;
    public string $city;
    public string $email;

    //data collection method
    public static function allCustomers()
    {
        //connect to database
        include "conn.php";

        //query
        $query = "SELECT * FROM customers";
        $result = $conn->query($query);

        //prep result array
        $customers = [];

        while ($row = $result->fetch_assoc()) {

            //user object creation and variable assignment
            $customer = new Customer();
            $customer->customerID = $row['customer_id'];
            $customer->firstName = $row['customer_firstname'];
            $customer->lastName = $row['customer_lastname'];
            $customer->address = $row['customer_address'];
            $customer->zipCode = $row['customer_zipcode'];
            $customer->city = $row['customer_city'];
            $customer->email = $row['customer_email'];

            //array of objects
            $customers[] = $customer;
        }

        $conn->close();

        return $customers;
    }

    public static function findById(int $id)
    {
        include "conn.php";

        $query = "SELECT * FROM customers WHERE customer_id = " . $id;
        $result = $conn->query($query);

        $customer = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $customer = new Customer();
            $customer->customerID = $row['customer_id'];
            $customer->firstName = $row['customer_firstname'];
            $customer->lastName = $row['customer_lastname'];
            $customer->address = $row['customer_address'];
            $customer->zipCode = $row['customer_zipcode'];
            $customer->city = $row['customer_city'];
            $customer->email = $row['customer_email'];
        }

        $conn->close();

        return $customer;
    }
}
