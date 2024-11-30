<?php
session_start();

# check if user logged in
if (isset($_SESSION['logged_in'])) {
    header("Location: home.php");
    exit();
}

# load or reset form
if (isset($_SESSION['login_username']) && isset($_SESSION['login_password'])) {
    $save_username = $_SESSION['login_username'];
    $save_password = $_SESSION['login_password'];
} else {
    $save_username = '';
    $save_password = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="./style-login-form.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="login_processing.php" method='POST'>
            <h1>Login</h1>
            <?php
            if (isset($_GET['error'])) {
                echo '<p class="error">' . $_GET['error'] . '</p>';
            }
            ?>
            <div class="input-box">
                <?php
                echo "<input type='text' name='username' placeholder='Username' value='$save_username' required>"
                ?>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <?php
                echo "<input type='password' name='password' placeholder='Password' value='$save_password' required>"
                ?>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">
                    Remember me
                </label>
                <a href="#">Forgot password?</a>
            </div>

            <button class="btn" type="submit">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="#">Register</a> </p>
            </div>
        </form>
    </div>

</body>

</html>