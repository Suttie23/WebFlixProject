<!-- Beginning the Session, if logout is recieved then the page will redirect the user back to the logged out homepage -->
<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user_id']);
}
require('includes/connect_db.php');

# Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
    require('login_tools.php');
    load();
}

?>

<?php if ($_SESSION['subscribed'] == "0") { 
    header("Location: index.php");
} else {
    include('includes/header.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">

    <!-- Inner -->
    <div class="carousel-inner">
        <!-- Single item -->
        <div class="carousel-item active">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white text-center">
                        <h1 class="mb-3">Welcome <strong style="color: #bc241c ;"><?php echo $_SESSION['first_name']; ?></strong></h1>
                        <h5 class="mb-4">Get started now by browsing our vast selection of Movies and Television!</h5>
                        <a class="btn btn-outline-light btn-lg m-2" role="button" href="movies.php">Watch Movies</a>
                        <a class="btn btn-outline-light btn-lg m-2" role="button" href="tv.php">Watch TV</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="solid">

<div id="moviesection">
    <h1 class="mb-3 text-white text-center "><strong>Movies</strong></h1>


    <?php

    echo "<br>";

    $g = "SELECT * FROM genres";
    $n = mysqli_query($link, $g);
    if (mysqli_num_rows($n) > 0) {
        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {

            $r = mysqli_query($link, "SELECT * FROM movie WHERE mov_genre = '{$row['genre_name']}'");
            if (mysqli_num_rows($r) > 0) {
                # Display body section.
    ?>
                <div style="margin-bottom: 40px;">
                    <h1 class="text-white" style="margin-left: 20px;"><?php echo "{$row['genre_name']}"; ?></h1>
                    <div class="responsive-slick">
                        <?php
                        while ($mov = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                        ?>
                            <div class="slider-image">
                                <a href="moviepage.php?id=<?php echo $mov['mov_id']; ?>">
                                    <img style="max-width: 300px; max-height: 175px;" src="<?php echo "{$mov['mov_img']}"; ?>" class="slider-img" alt="<?php echo "{$mov['mov_title']}"; ?>">
                                    <div class="info">
                                        <h2 class="slider-heading"><?php echo "{$mov['mov_title']}"; ?></h2>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    </div>
                </div>
        <?php
        }
        mysqli_close($link);
    }
        ?>

        <?php
        require('includes/footer.php');
        ?>