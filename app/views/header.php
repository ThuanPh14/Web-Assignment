<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['page_title']; ?></title>
    <link rel="icon" href="./assets/CV-icon.png" type="image/x-icon" />    
    <link rel="stylesheet" href="/CV-Template/public/css/style-home.css">
    
    <?php if (isset($data['css'])) echo $data['css'] ?>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <ul id="nav">
                <li><a href="http://localhost/CV-Template/public/">Home</a></li>
                <li><a href="http://localhost/CV-Template/public/mycv">My CV</a></li>
                <?php
                    if (isset($_SESSION["logged_in"])) {
                        echo '<li><a href="http://localhost/CV-Template/public/logout">Logout</a></li>';
                    }
                    else{
                        echo "<li><a href='http://localhost/CV-Template/public/login'>Login</a></li>
                        <li><a href='http://localhost/CV-Template/public/login/register'>Register</a></li>";
                    }
                ?>
                <!-- <li>
                    <a href="">
                        More
                        <i class="nav-arrow-down ti-angle-down"></i>
                    </a>
                    <ul class="subnav">
                        <li><a href="#">User infor</a></li>
                        <li><a href="#">Extras</a></li>
                        <li><a href="#">Media</a></li>
                    </ul>
                </li> -->
            </ul>
            <!-- end nav -->
            <!-- <div class="search-btn">
                <div class="search-icon">
                    <i class='bx bx-search-alt-2'></i>
                </div>
            </div> -->
        </div>
    