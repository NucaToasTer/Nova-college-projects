<?php
include "Blog.php";
$eBlog = Blog::findById($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $editeTitle = trim($_POST["blog_title"]);
    $editeImage = trim($_POST["blog_image"]);
    $editeContent = trim($_POST["blog_content"]);


    if ($editeTitle == !NULL && $editeImage == !NULL && $editeContent == !NULL) {
        $edite = Blog::edite($_GET['id'], $editeTitle, $editeImage, $editeContent);
        echo "<p>Updated: <strong>" . htmlspecialchars($editeTitle) . "</p>";
        echo '<p><a href="userPage.php">← Back to list</a></p>';
        exit;
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit blog</title>
</head>

<body>
    <h1>Edit blog</h1>
    <form method="post">
        <label>Blog title<br><input type="text" name="blog_title" value="<?= $eBlog->blogTitle ?>"></label><br><br>
        <label>Blog image<br><input type="text" name="blog_image" value="<?= $eBlog->blogImage ?>"></label><br><br>
        <label>Blog content<br><input type="text" name="blog_content" value="<?= $eBlog->blogContent ?>"></label><br><br>

        <button type="submit">Save Changes</button>
    </form>
    <p><a href="userPage.php">← Back to products</a></p>
</body>

</html>