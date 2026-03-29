<?php
class Session
{
    // Session properties
    public int $id;
    public int $userId;
    public string $key;
    public string $start;
    public string $end;

    // Insert a new session into the database
    public function insert()
    {
        include "conn.php";

        // Escape values to prevent SQL injection
        $userId = mysqli_real_escape_string($conn, $this->userId);
        $key = mysqli_real_escape_string($conn, $this->key);
        $start = mysqli_real_escape_string($conn, $this->start);
        $end = mysqli_real_escape_string($conn, $this->end);

        // SQL query to insert new session
        $sql = "INSERT INTO sessions (
            session_user_id,
            session_key,
            session_start,
            session_end
        ) VALUES (
            '" . $userId . "',
            '" . $key . "',
            '" . $start . "',
            '" . $end . "'
        )";

        $conn->query($sql);

        // Set the session ID (last inserted ID)
        if ($conn->insert_id) {
            $this->id = $conn->insert_id;
        }

        $conn->close();
    }

    // Find a session by its key
    public static function findByKey($key)
    {
        include "conn.php";

        $key = mysqli_real_escape_string($conn, $key);

        $query = "SELECT * FROM sessions WHERE session_key = '" . $key . "'";
        $result = $conn->query($query);

        $session = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $session = new Session();
            $session->id = $row['session_id'];
            $session->userId = $row['session_user_id'];
            $session->key = $row['session_key'];
            $session->start = $row['session_start'];
            $session->end = $row['session_end'];
        }

        $conn->close();

        return $session;
    }

    // Find an active session by key (not expired)
    public static function findActiveByKey($key)
    {
        include "conn.php";

        $key = mysqli_real_escape_string($conn, $key);
        $currentDateTime = date("Y-m-d H:i:s");

        $query = "SELECT * FROM sessions 
                  WHERE session_key = '" . $key . "' 
                  AND session_end > '" . $currentDateTime . "'";
        $result = $conn->query($query);

        $session = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $session = new Session();
            $session->id = $row['session_id'];
            $session->userId = $row['session_user_id'];
            $session->key = $row['session_key'];
            $session->start = $row['session_start'];
            $session->end = $row['session_end'];
        }

        $conn->close();

        return $session;
    }

    // Find all sessions for a specific user
    public static function findByUserId($userId)
    {
        include "conn.php";

        $userId = mysqli_real_escape_string($conn, $userId);

        $query = "SELECT * FROM sessions WHERE session_user_id = '" . $userId . "'";
        $result = $conn->query($query);

        $sessions = [];

        while ($row = $result->fetch_assoc()) {
            $session = new Session();
            $session->id = $row['session_id'];
            $session->userId = $row['session_user_id'];
            $session->key = $row['session_key'];
            $session->start = $row['session_start'];
            $session->end = $row['session_end'];
            $sessions[] = $session;
        }

        $conn->close();

        return $sessions;
    }

    // Delete this session from the database
    public function delete()
    {
        include "conn.php";

        $id = mysqli_real_escape_string($conn, $this->id);

        $sql = "DELETE FROM sessions WHERE session_id = '" . $id . "'";
        $conn->query($sql);

        $conn->close();
    }

    // Delete all expired sessions
    public static function deleteExpired()
    {
        include "conn.php";

        $currentDateTime = date("Y-m-d H:i:s");

        $sql = "DELETE FROM sessions WHERE session_end <= '" . $currentDateTime . "'";
        $conn->query($sql);

        $conn->close();
    }

    // Check if session is still valid
    public function isValid()
    {
        $currentDateTime = date("Y-m-d H:i:s");
        return ($this->end > $currentDateTime);
    }

    // Extend session end date
    public function extend($interval = "+1 month")
    {
        include "conn.php";

        $this->end = date("Y-m-d H:i:s", strtotime($interval));
        $end = mysqli_real_escape_string($conn, $this->end);
        $id = mysqli_real_escape_string($conn, $this->id);

        $sql = "UPDATE sessions SET session_end = '" . $end . "' WHERE session_id = '" . $id . "'";
        $conn->query($sql);

        $conn->close();
    }

    // Get the user associated with this session
    public function getUser()
    {
        // You'll need to include the User class and add a findById method
        // or modify your existing User class to find by ID
        return null; // Placeholder
    }
}
