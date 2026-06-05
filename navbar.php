<?php
if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">

        <a class="navbar-brand" href="index.php">
            Blog CRUD System
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="add_post.php">
                        Add Post
                    </a>
                </li>

                <li class="nav-item">
                    <span class="nav-link text-warning">
                        <?php echo $_SESSION['username']; ?>
                    </span>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php">
                        Logout
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>