<?php

session_start();
include 'config/db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$sql = "SELECT posts.*, users.username
        FROM posts
        INNER JOIN users
        ON posts.user_id = users.id
        ORDER BY posts.id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Blog CRUD System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<?php include 'navbar.php'; ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Dashboard</h2>

        <a href="add_post.php"
           class="btn btn-primary">
            Add New Post
        </a>

    </div>

    <div class="card shadow">

        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">All Posts</h4>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th width="150">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>

                        <tr>

                            <td>
                                <?php echo $row['id']; ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['title']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['content']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['username']); ?>
                            </td>

                            <td>
                                <?php echo $row['created_at']; ?>
                            </td>

                            <td>

                                <a href="edit_post.php?id=<?php echo $row['id']; ?>"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="delete_post.php?id=<?php echo $row['id']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to delete this post?');">
                                    Delete
                                </a>

                            </td>

                        </tr>

                    <?php
                        }
                    }
                    else
                    {
                        echo "
                        <tr>
                            <td colspan='6' class='text-center text-muted'>
                                No Posts Found
                            </td>
                        </tr>";
                    }
                    ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>