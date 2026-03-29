<?php
require 'conn.php';
require 'User.php';
require 'Session.php';
require 'Blog.php';
include "cLog.php";

$session = User::findActiveSession();

if (!$session) {

    header("Location: login.php");
    exit;
} else {

    $tempName = User::findByID($session->userId);

    if (!$tempName->role) {

        echo ("hello "  . $tempName->firstName .  "<br>");

        console_dump($tempName);

        $blogs = Blog::findAllByAuthor($tempName->userName);

        if (isset($_GET['action']) && $_GET['action'] === 'delete') {
            $deleted = Blog::delete($_GET['id']);
        }

        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><td>ID</td><td>Blog title</td><td>Blog image</td><td>Blog content</td><td>Blog author</td></tr>";
        foreach ($blogs as $blog) {
            echo "<td>" . $blog->blogID . "</td>";
            echo "<td>" . $blog->blogTitle . "</td>";
            echo "<td>";
            if (!empty($blog->blogImage)) {
                echo "<img src='" . $blog->blogImage . "' alt='Blog Image' width='200'>";
            } else {
                echo "No image available";
            }
            echo "</td>";
            echo "<td>" . $blog->blogContent . "</td>";
            echo "<td>" . $blog->blogAuthor . "</td>";
            echo "<td>";
            echo '<a href="edite.php?id=' . $blog->blogID . '">Edite</a>';
            echo " | ";
            echo '<a href="?action=delete&id=' . $blog->blogID . '" onclick="return confirm(\'Delete this product?\');">Delete</a>';
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
        echo '<a href="insert.php?userName=' . $tempName->userName . '">Insert</a>';
        echo "<br>";
        echo '<a href="login.php">Log in</a>';
        echo "<br>";
        echo '<a href="blogPage.php">Blog posts</a>';
    } else {
        echo ("hello admin "  . $tempName->firstName .  "<br>");

        $blogs = Blog::allblogs();

        if (isset($_GET['action']) && $_GET['action'] === 'delete') {
            $deleted = Blog::delete($_GET['id']);
        }

        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><td>ID</td><td>Blog title</td><td>Blog image</td><td>Blog content</td><td>Blog author</td></tr>";
        foreach ($blogs as $blog) {
            echo "<td>" . $blog->blogID . "</td>";
            echo "<td>" . $blog->blogTitle . "</td>";
            echo "<td>";
            if (!empty($blog->blogImage)) {
                echo "<img src='" . $blog->blogImage . "' alt='Blog Image' width='200'>";
            } else {
                echo "No image available";
            }
            echo "</td>";
            echo "<td>" . $blog->blogContent . "</td>";
            echo "<td>" . $blog->blogAuthor . "</td>";
            echo "<td>";
            echo '<a href="edite.php?id=' . $blog->blogID . '">Edite</a>';
            echo " | ";
            echo '<a href="?action=delete&id=' . $blog->blogID . '" onclick="return confirm(\'Delete this product?\');">Delete</a>';
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
        echo '<a href="insert.php?userName=' . $tempName->userName . '">Insert</a>';
        echo "<br>";
        echo '<a href="login.php">Log in</a>';
        echo "<br>";
        echo '<a href="blogPage.php">Blog posts</a>';
    }
}
