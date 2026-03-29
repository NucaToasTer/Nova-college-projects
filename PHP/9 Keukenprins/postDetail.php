<?php
require 'Blog.php';
//include "cLog.php";

$blogs = Blog::findById($_GET['id']);

//console_dump($blogs);

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><td>Blog title</td><td>Blog image</td><td>Blog content</td><td>Blog author</td></tr>";
echo "<td>" . $blogs->blogTitle . "</td>";
echo "<td>";
if (!empty($blogs->blogImage)) {
    echo "<img src='" . $blogs->blogImage . "' alt='Blog Image' width='200'>";
} else {
    echo "No image available";
}
echo "</td>";
echo "<td>" . $blogs->blogContent . "</td>";
echo "<td>" . $blogs->blogAuthor . "</td>";
echo "</tr>";
echo "</table>";
echo "<br>";
echo '<a href="login.php">Log in</a>';
echo "<br>";
echo '<a href="blogPage.php">Blog posts</a>';
