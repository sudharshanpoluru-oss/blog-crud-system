<?php

session_start();
include 'config/db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

if(!isset($_GET['id']))
{
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn,
    "SELECT * FROM posts WHERE id='$id'");

$post = mysqli_fetch_assoc($result);

if(!$post)
{
    die("Post not found");
}

$message = "";

if(isset($_POST['update_post']))
{
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $sql = "UPDATE posts
            SET title='$title',
                content='$content'
            WHERE id='$id'";

    if(mysqli_query($conn, $sql))
    {
        header("Location: index.php");
        exit();
    }
    else
    {
        $message = "<div class='alert alert-danger'>
                    Update Failed
                    </div>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header">
                    <h3>Edit Post</h3>
                </div>

                <div class="card-body">

                    <?php echo $message; ?>

                    <form method="POST">

                        <div class="mb-3">

                            <label>Title</label>

                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                value="<?php echo $post['title']; ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label>Content</label>

                            <textarea
                                name="content"
                                rows="6"
                                class="form-control"
                                required><?php echo $post['content']; ?></textarea>

                        </div>

                        <button
                            type="submit"
                            name="update_post"
                            class="btn btn-success">
                            Update Post
                        </button>

                        <a href="index.php"
                           class="btn btn-secondary">
                            Back
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>