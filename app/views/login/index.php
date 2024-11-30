<?php

# check if user logged in
if (isset($_SESSION['logged_in'])) {
    header("Location: home.php");
    exit();
}

# load or reset form
if (isset($_SESSION['login_username'])) {
    $save_username = $_SESSION['login_username'];
    // $save_password = $_SESSION['login_password'];
} else {
    $save_username = '';
    // $save_password = '';
}
?>

<div class="wrapper">
    <form action="/CV-Template/public/login/processLogin" method='POST'>
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
            echo "<input type='password' name='password' placeholder='Password' required>"
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
            <p>Don't have an account? <a href="/CV-Template/public/login/register">Register</a> </p>
        </div>
    </form>
</div>

</body>

</html>