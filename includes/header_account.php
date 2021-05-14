<?php

session_start();

# Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
    require('login_tools.php');
    load();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>WebFlix</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom Styling -->
    <link rel="stylesheet" href="css/customstyles.css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="base.css">
    <script src="https://kit.fontawesome.com/a0043d9bc2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
</head>

<!-- Start project-->
<header class="sticky-top">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-black navbar-dark d-none d-lg-block bg-dark" style="z-index: 2000;">
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand nav-link" href="index.php">
                <strong class="" href="index.php" style="color: #bc241c ;">WebFlix</strong>
            </a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <?php if ($_SESSION['account_type'] == "1") { ?>
                            <a class="nav-link" href="tv.php">TV Shows</a>
                        <?php } ?>
                    </li>
                    <li class="nav-item">
                        <?php if ($_SESSION['account_type'] == "1") { ?>
                            <a class="nav-link" href="movies.php">Movies</a>
                        <?php } ?>
                </ul>

                <ul class="navbar-nav d-flex flex-row">
                    <?php if (isset($_SESSION['first_name'])) : ?>
                        <div class="dropdown">
                            <button class="btn text-white dropdown-toggle" style="background-color: #bc241c;" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                                Welcome <?php echo $_SESSION['first_name']; ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="myaccount.php">My Account</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                <?php if ($_SESSION['account_type'] == "1") { ?>
                                    <li><a class="dropdown-item" href="admin/admin.php">Admin</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- if NOT logged in the button will instead display log in or sign up -->
                    <?php else : ?>
                        <!-- Icons -->
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="" rel="nofollow" data-mdb-toggle="modal" data-mdb-target="#signupModal">
                                <i class="fas fa-user-circle fa-2x"></i>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
</header>

<body class="body bg-light">