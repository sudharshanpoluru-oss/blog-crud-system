<?php
session_start();
include 'config/db.php';

$message = "";

if(isset($_POST['login']))
{
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if(empty($email) || empty($password))
    {
        $message = "<div class='alert alert-danger'>
                    All fields are required!
                    </div>";
    }
    else
    {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1)
        {
            $user = mysqli_fetch_assoc($result);

            if(password_verify($password, $user['password']))
            {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                header("Location: index.php");
                exit();
            }
            else
            {
                $message = "<div class='alert alert-danger'>
                            Invalid Password!
                            </div>";
            }
        }
        else
        {
            $message = "<div class='alert alert-danger'>
                        Email Not Found!
                        </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header text-center">
                    <h3>User Login</h3>
                </div>

                <div class="card-body">

                    <?php echo $message; ?>

                    <form method="POST">

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

                        <button
                            type="submit"
                            name="login"
                            class="btn btn-success w-100">
                            Login
                        </button>

                    </form>

                    <div class="mt-3 text-center">
                        Don't have an account?
                        <a href="register.php">Register</a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>