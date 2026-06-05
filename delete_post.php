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

$sql = "DELETE FROM posts WHERE id='$id'";

if(mysqli_query($conn, $sql))
{
    header("Location: index.php");
    exit();
}
else
{
    echo "Failed to delete post.";
}

?>