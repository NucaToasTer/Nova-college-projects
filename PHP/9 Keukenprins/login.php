<?php
require 'conn.php';
require 'Session.php';
require 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    var_dump($username);

    // Use the User class to query the database
    $user = User::findByUsername($username);


    if ($username == $user->userName && $password == $user->password) {
        // Clean up any expired sessions before creating a new one
        Session::deleteExpired();

        // Delegate session creation and cookie setting to sessionInsert.php
        include 'sessionInsert.php';

        header("Location: userPage.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log In – Steptember</title>
</head>

<body>
    <form method="post">
        <h2>Log In</h2>

        <?php if (!empty($error)): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <input type="text" name="username" required placeholder="Username"><br>
        <input type="password" name="password" required placeholder="Password"><br>
        <button type="submit">Log In</button>
    </form>
    <br>
    <a href="blogPage.php">Blog posts</a>
</body>

</html>