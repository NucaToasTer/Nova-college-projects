<?php
class Blog
{
    public int $blogID;
    public string $blogTitle;
    public string $blogImage;
    public string $blogContent;
    public string $blogAuthor;


    //data collection method
    public static function allblogs()
    {
        //connect to database
        include "conn.php";

        //query
        $query = "SELECT * FROM blogs";
        $result = $conn->query($query);

        //prep result array
        $blogs = [];

        while ($row = $result->fetch_assoc()) {

            //user object creation and variable assignment
            $blog = new Blog();
            $blog->blogID = $row['blog_id'];
            $blog->blogTitle = $row['blog_title'];
            $blog->blogImage = $row['blog_image'];
            $blog->blogContent = $row['blog_content'];
            $blog->blogAuthor = $row['blog_author'];

            //array of objects
            $blogs[] = $blog;
        }

        $conn->close();

        return $blogs;
    }

    public static function findById(int $id)
    {
        include "conn.php";

        $query = "SELECT * FROM blogs WHERE blog_id = " . $id;
        $result = $conn->query($query);

        $blog = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $blog = new Blog();
            $blog->blogID = $row['blog_id'];
            $blog->blogTitle = $row['blog_title'];
            $blog->blogImage = $row['blog_image'];
            $blog->blogContent = $row['blog_content'];
            $blog->blogAuthor = $row['blog_author'];
        }

        $conn->close();

        return $blog;
    }

    public static function findAllByAuthor(string $Author)
    {
        include "conn.php";

        $query = "SELECT * FROM blogs WHERE blog_author = '" . $Author . "'";
        $result = $conn->query($query);

        $blogs = [];

        while ($row = $result->fetch_assoc()) {
            $blog = new Blog();
            $blog->blogID = $row['blog_id'];
            $blog->blogTitle = $row['blog_title'];
            $blog->blogImage = $row['blog_image'];
            $blog->blogContent = $row['blog_content'];
            $blog->blogAuthor = $row['blog_author'];

            $blogs[] = $blog;
        }

        $conn->close();

        return $blogs;
    }

    public static function insert($blogTitle, $blogImage, $blogContent, $blogAuthor)
    {
        include "conn.php";

        // Escape values to prevent SQL injection
        $blogTitle = mysqli_real_escape_string($conn, $blogTitle);
        $blogImage = mysqli_real_escape_string($conn, $blogImage);
        $blogContent = mysqli_real_escape_string($conn, $blogContent);
        $blogAuthor = mysqli_real_escape_string($conn, $blogAuthor);

        // SQL query to insert new session
        $sql = "INSERT INTO blogs (
            blog_title,
            blog_image,
            blog_content,
            blog_author
            ) VALUES (
                '" . $blogTitle . "',
                '" . $blogImage . "',
                '" . $blogContent . "',
                '" . $blogAuthor . "'
        )";
        $conn->query($sql);

        $conn->close();
    }

    public static function edite($blogID, $blogTitle, $blogImage, $blogContent,)
    {
        include "conn.php";

        // Escape values to prevent SQL injection
        $blogID = mysqli_real_escape_string($conn, $blogID);
        $blogTitle = mysqli_real_escape_string($conn, $blogTitle);
        $blogImage = mysqli_real_escape_string($conn, $blogImage);
        $blogContent = mysqli_real_escape_string($conn, $blogContent);

        // SQL query to insert new session
        $sql = "UPDATE blogs SET
            blog_title = '" . $blogTitle . "',
            blog_image = '" . $blogImage . "',
            blog_content = '" . $blogContent . "'
            WHERE blog_id = " . $blogID;

        $conn->query($sql);

        $conn->close();
    }

    public static function delete($id)
    {
        include "conn.php";

        $id = mysqli_real_escape_string($conn, $id);

        $sql = "DELETE FROM blogs WHERE blog_id = '" . $id . "'";
        $conn->query($sql);

        $conn->close();
        header('Location: userpage.php');
    }
}
