<?php
include "Blog.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $insertTitle = trim($_POST["blog_title"]);
    $insertImage = trim($_POST["blog_image"]);
    $insertContent = trim($_POST["blog_content"]);
    $insertAuthor = $_GET['userName'];

    if ($insertTitle == !NULL && $insertImage == !NULL && $insertContent == !NULL && $insertAuthor == !NULL) {
        $insert = Blog::insert($insertTitle, $insertImage, $insertContent, $insertAuthor);
        echo "<p>Posted: <strong>" . htmlspecialchars($insertTitle) . "</p>";
        echo '<p><a href="userPage.php">← Back to list</a></p>';
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Compose post</title>
</head>

<body>
    <form method="post">
        <h2>Compose post</h2>

        <?php if (!empty($error)): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <input type="text" name="blog_title" required placeholder="Blog title"><br>
        <input type="text" name="blog_image" required placeholder="Blog image"><br>
        <input type="text" name="blog_content" required placeholder="Blog content"><br>

        <button type="submit">Insert blog post</button>
    </form>
</body>

</html>