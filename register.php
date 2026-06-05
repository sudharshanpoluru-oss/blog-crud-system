<?php
session_start();
include 'config/db.php';

$message = "";

if(isset($_POST['register']))
{
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if(empty($username) || empty($email) || empty($password) || empty($confirm_password))
    {
        $message = "<div class='alert alert-danger'>All fields are required!</div>";
    }
    elseif($password != $confirm_password)
    {
        $message = "<div class='alert alert-danger'>Passwords do not match!</div>";
    }
    else
    {
        $check = mysqli_query($conn,
            "SELECT * FROM users WHERE email='$email'");

        if(mysqli_num_rows($check) > 0)
        {
            $message = "<div class='alert alert-warning'>Email already exists!</div>";
        }
        else
        {
            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $sql = "INSERT INTO users(username,email,password)
                    VALUES('$username','$email','$hashed_password')";

            if(mysqli_query($conn,$sql))
            {
                $message = "<div class='alert alert-success'>
                            Registration Successful!
                            </div>";
            }
            else
            {
                $message = "<div class='alert alert-danger'>
                            Registration Failed!
                            </div>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header text-center">
                    <h3>User Registration</h3>
                </div>

                <div class="card-body">

                    <?php echo $message; ?>

                    <form method="POST">

                        <div class="mb-3">
                            <label>Username</label>
                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input
                                type="password"
                                name="confirm_password"
                                class="form-control"
                                required>
                        </div>

                        <button
                            type="submit"
                            name="register"
                            class="btn btn-primary w-100">
                            Register
                        </button>

                    </form>

                    <div class="mt-3 text-center">
                        Already have an account?
                        <a href="login.php">Login</a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>