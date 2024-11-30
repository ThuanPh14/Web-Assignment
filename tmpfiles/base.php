<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create CV</title>
    <link rel="icon" href="./assets/CV-icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="./style-home.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Box icon  -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <div id="wrapper">
        <div id="header">
            <ul id="nav">
                <li><a href="http://localhost/CV-Template/home.php ">Home</a></li>
                <li><a href="http://localhost/CV-Template/create_cv.php">Create new CV</a></li>
                <?php
                    if (isset($_SESSION["logged_in"]))
                        echo '<li><a href="http://localhost/CV-Template/logout.php">Logout</a></li>';
                    else{
                        echo "<li><a href='http://localhost/CV-Template/login.php'>Login</a></li>
                        <li><a href='http://localhost/index.php?page=register'>Register</a></li>";
                    }
                ?>
                <li>
                    <a href="">
                        More
                        <i class="nav-arrow-down ti-angle-down"></i>
                    </a>
                    <ul class="subnav">
                        <li><a href="#">User infor</a></li>
                        <li><a href="#">Extras</a></li>
                        <li><a href="#">Media</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end nav -->
            <div class="search-btn">
                <div class="search-icon">
                    <i class='bx bx-search-alt-2'></i>
                </div>
            </div>
        </div>