<?php

session_start();
include 'config/db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

/* SEARCH */

$search = "";

if(isset($_GET['search']))
{
    $search = mysqli_real_escape_string(
        $conn,
        $_GET['search']
    );
}

/* PAGINATION */

$limit = 5;

$page = isset($_GET['page'])
        ? (int)$_GET['page']
        : 1;

$offset = ($page - 1) * $limit;

/* MAIN QUERY */

$sql = "SELECT posts.*, users.username
        FROM posts
        INNER JOIN users
        ON posts.user_id = users.id";

if(!empty($search))
{
    $sql .= "
    WHERE posts.title LIKE '%$search%'
    OR posts.content LIKE '%$search%'";
}

$sql .= "
ORDER BY posts.id DESC
LIMIT $limit OFFSET $offset";

$result = mysqli_query($conn, $sql);

/* TOTAL POSTS */

$countSql = "
SELECT COUNT(*) AS total
FROM posts";

if(!empty($search))
{
    $countSql .= "
    WHERE title LIKE '%$search%'
    OR content LIKE '%$search%'";
}

$countResult = mysqli_query(
    $conn,
    $countSql
);

$totalPosts =
mysqli_fetch_assoc(
$countResult
)['total'];

$totalPages =
ceil(
$totalPosts / $limit
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Dashboard - Blog CRUD System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<style>

body
{
    background:
    linear-gradient(
    135deg,
    #e3f2fd,
    #ffffff
    );

    min-height:100vh;
}

.card
{
    border-radius:15px;
}

.card:hover
{
    transform:translateY(-2px);
    transition:0.3s;
}

.btn
{
    border-radius:8px;
}

.table-hover tbody tr:hover
{
    background:#eef5ff;
}

.pagination .page-link
{
    border-radius:8px;
    margin:2px;
}

</style>

</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold text-primary">
            📝 Blog Dashboard
        </h2>

        <a href="add_post.php"
           class="btn btn-primary">

           Add New Post

        </a>

    </div>

    <!-- SEARCH -->

    <div class="card shadow mb-4">

        <div class="card-body">

            <form method="GET">

                <div class="input-group">

                    <input
                    type="text"
                    class="form-control"
                    name="search"
                    placeholder="Search posts by title or content..."
                    value="<?php echo htmlspecialchars($search); ?>">

                    <button
                    class="btn btn-primary"
                    type="submit">

                    Search

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- POSTS TABLE -->

    <div class="card shadow-lg border-0">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                All Posts
            </h4>

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
                    ?>

                    <tr>

                        <td colspan="6"
                            class="text-center text-muted">

                            No Posts Found

                        </td>

                    </tr>

                    <?php
                    }
                    ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- PAGINATION -->

    <nav class="mt-4">

        <ul class="pagination justify-content-center">

        <?php

        for($i = 1; $i <= $totalPages; $i++)
        {
        ?>

        <li class="page-item
        <?php echo ($i == $page) ? 'active' : ''; ?>">

            <a class="page-link"
               href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>">

                <?php echo $i; ?>

            </a>

        </li>

        <?php
        }
        ?>

        </ul>

    </nav>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>