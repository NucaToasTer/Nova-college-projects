<?php
class User
{
    //user properties
    public int $id;
    public int $role;
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $userName;
    public string $password;


    //data collection method
    public static function allUsers()
    {
        //connect to database
        include "conn.php";

        //query
        $query = "SELECT * FROM users";
        $result = $conn->query($query);

        //prep result array
        $users = [];

        while ($row = $result->fetch_assoc()) {

            //user object creation and variable assignment
            $user = new User();
            $user->firstName = $row['user_firstname'];
            $user->lastName = $row['user_lastname'];
            $user->email = $row['user_email'];

            //array of objects
            $users[] = $user;
        }

        $conn->close();

        return $users;
    }

    public static function lookUpEmail(string $email)
    {
        include "conn.php";

        //sql injection protection
        $email = mysqli_real_escape_string($conn, $email);

        $query = "SELECT * FROM users WHERE user_email = '" . $email . "'";
        $result = $conn->query($query);

        $users = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User();
                $user->firstName = $row['user_firstname'];
                $user->lastName = $row['user_lastname'];
                $user->email = $row['user_email'];
                $users[] = $user;
            }
        }

        $conn->close();

        return $users;
    }

    public static function findByUsername(string $username)
    {
        include "conn.php";

        // sql injection protection
        $username = mysqli_real_escape_string($conn, $username);

        $query = "SELECT * FROM users WHERE user_username = '" . $username . "'";
        $result = $conn->query($query);

        $user = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = new User();
            $user->id        = $row['user_id'];
            $user->firstName = $row['user_firstname'];
            $user->lastName  = $row['user_lastname'];
            $user->email     = $row['user_email'];
            $user->userName  = $row['user_username'];
            $user->password  = $row['user_password'];
            $user->role      = $row['user_admin'];
        }

        $conn->close();

        return $user;
    }


    public function insert()
    {

        include "conn.php";


        $firstName = mysqli_real_escape_string($conn, $this->firstName);
        $lastName = mysqli_real_escape_string($conn, $this->lastName);
        $email = mysqli_real_escape_string($conn, $this->email);
        $userName = mysqli_real_escape_string($conn, $this->userName);
        $password = mysqli_real_escape_string($conn, $this->password);

        //sql query
        $sql = "INSERT INTO users (
            user_firstname,
            user_lastname,
            user_email,
            user_username,
            user_password
        ) VALUES (
            '" . $firstName . "',
            '" . $lastName . "',
            '" . $email . "',
            '" . $userName . "',
            '" . $password . "'
        )";

        $conn->query($sql);

        $conn->close();
    }


    public static function findActiveSession()
    {
        $session = null;
        // if cookie, find session
        if (isset($_COOKIE["steptember-session"])) {

            include "conn.php";

            $key = mysqli_real_escape_string($conn, $_COOKIE["steptember-session"]);

            $query = "SELECT * FROM sessions WHERE session_key = '" . $key . "' AND session_end > '" . date("Y-m-d H:i:s") . "'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $session = new Session();
                $session->id     = $row['session_id'];
                $session->userId = $row['session_user_id'];
                $session->key    = $row['session_key'];
                $session->start  = $row['session_start'];
                $session->end    = $row['session_end'];
            }

            $conn->close();
        }

        return $session;
    }

    public static function findByID(int $id)
    {
        include "conn.php";

        // sql injection protection
        $id = mysqli_real_escape_string($conn, $id);

        $query = "SELECT * FROM users WHERE user_id = '" . $id . "'";
        $result = $conn->query($query);

        $user = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = new User();
            $user->id        = $row['user_id'];
            $user->firstName = $row['user_firstname'];
            $user->lastName  = $row['user_lastname'];
            $user->email     = $row['user_email'];
            $user->userName  = $row['user_username'];
            $user->password  = $row['user_password'];
            $user->role      = $row['user_admin'];
        }


        $conn->close();

        return $user;
    }

    public static function stepsData(int $userId)
    {
        include "conn.php";

        $query = "SELECT * FROM `steps` WHERE step_user_id = '" . $userId . "'";
        $result = $conn->query($query);

        $stepsData = [];

        while ($row = $result->fetch_assoc()) {
            $stepsData[] = [
                "date"  => $row["step_date"],
                "steps" => $row["step_total"]
            ];
        }

        $conn->close();

        return $stepsData;
    }

    public static function allSteps()
    {
        include "conn.php";

        $query = "SELECT * FROM `steps`";
        $result = $conn->query($query);

        $stepsData = [];

        while ($row = $result->fetch_assoc()) {
            $stepsData[] = [
                "date"  => $row["step_date"],
                "steps" => $row["step_total"]
            ];
        }

        $conn->close();

        return $stepsData;
    }
}
