<?php
require 'Blog.php';
include "cLog.php";

$blogs = Blog::allblogs();

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><td>Blog title</td><td>Blog image</td><td>Blog author</td></tr>";
foreach ($blogs as $blog) {
    echo "<td><a href='postDetail.php?id=" . $blog->blogID  . "'>" . $blog->blogTitle . "</a></td>";
    echo "<td>";
    if (!empty($blog->blogImage)) {
        echo "<img src='" . $blog->blogImage . "' alt='Blog Image' width='200'>";
    } else {
        echo "No image available";
    }
    echo "</td>";
    echo "<td>" . $blog->blogAuthor . "</td>";
    echo "</tr>";
}
//echo "<td><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Cat03.jpg/1200px-Cat03.jpg' alt='Blog Image' width='200'></td>";
echo "</table>";
echo "<br>";
echo '<a href="login.php">Log in</a>';
