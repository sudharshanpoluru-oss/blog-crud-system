<?php

session_start();
include 'config/db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$message = "";

if(isset($_POST['add_post']))
{
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $user_id = $_SESSION['user_id'];

    if(empty($title) || empty($content))
    {
        $message = "<div class='alert alert-danger'>
                    All fields are required!
                    </div>";
    }
    else
    {
        $sql = "INSERT INTO posts(title, content, user_id)
                VALUES('$title', '$content', '$user_id')";

        if(mysqli_query($conn, $sql))
        {
            $message = "<div class='alert alert-success'>
                        Post Added Successfully!
                        </div>";
        }
        else
        {
            $message = "<div class='alert alert-danger'>
                        Failed to Add Post!
                        </div>";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Post</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header">
                    <h3>Add New Post</h3>
                </div>

                <div class="card-body">

                    <?php echo $message; ?>

                    <form method="POST">

                        <div class="mb-3">
                            <label>Post Title</label>
                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Post Content</label>
                            <textarea
                                name="content"
                                rows="6"
                                class="form-control"
                                required></textarea>
                        </div>

                        <button
                            type="submit"
                            name="add_post"
                            class="btn btn-primary">
                            Add Post
                        </button>

                        <a href="index.php"
                           class="btn btn-secondary">
                            Dashboard
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>