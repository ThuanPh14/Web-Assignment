<?php

# check if user logged in
if (isset($_SESSION['logged_in'])) {
    header("Location: home.php");
    exit();
}

# load or reset form
if (isset($_SESSION['login_username'])) {
    $save_username = $_SESSION['login_username'];
} else {
    $save_username = '';
}
?>

<div class="wrapper">
    <form action="/CV-Template/public/login/processRegister" onsubmit="return validateForm()" method="POST">
        <h1>Register</h1>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">' . $_GET['error'] . '</p>';
        }
        ?>
        <div class="input-box">
            <?php
            echo "<input id='username' type='text' name='username' placeholder='Username' value='$save_username' required>"
            ?>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <?php
            echo "<input id='password' type='password' name='password' placeholder='Password' required>"
            ?>
            <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="input-box">
            <?php
            echo "<input id='confirmPassword' type='password' name='confirm_password' placeholder='Confirm password' required>"
            ?>
            <i class='bx bxs-lock-alt'></i>
        </div>

        <button class="btn" type="submit">Register</button>

    </form>
</div>
</body>

<script src="/CV-Template/public/scripts/register_form_validate.js"></script>
</html>

