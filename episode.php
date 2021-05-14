<?php

# Access session.
session_start();

?>

<?php if ($_SESSION['subscribed'] == "0") { 
    header("Location: index.php");
} else {
    include('includes/header.php');
} ?>

<?php

# Get passed movie id and assign it to a variable.
if (isset($_GET['id'])) $id = $_GET['id'];

# Open database connection.
require('includes/connect_db.php');

$q = "SELECT * FROM episode WHERE tv_id = '$id'";
$r = mysqli_query($link, $q);

#Create conditional if statement which will execute code if the condition is TRUE.
if (mysqli_num_rows($r) > 0) {


  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    echo '
        <h1 class="mb-3 text-white text-center"><strong>'  . $row['episode_name'] . '</strong></h1>
        <div class="container">
        <hr class="featurette-divider text-white">
        </div>
         <iframe src="'  . $row['episode_file'] . '" width="100%" height="650" frameborder="0" allowfullscreen></iframe>

         <div class="container">
         <hr class="featurette-divider text-white">
         </div>
   
         <div class="container text-center">
         <div class="row text-white">
         <h2 style="padding-bottom:20px;">Episode Number: '  . $row['episode_number'] . ' </h2>
        </div>
        </div>
      
      ';
  }
}



?>

<div id="tvsection">


  <?php

  echo "<br>";

  $x = "SELECT * FROM episode WHERE tv_id = '$id'";
  $y = mysqli_query($link, $x);
  if (mysqli_num_rows($y) > 0) {
    # Display body section.
  ?>
    <h1 class="mb-3 text-white text-center "><strong>Episodes</strong></h1>
    <div style="margin-bottom: 40px;">
      <div class="responsive-slick">
        <?php
        while ($tv = mysqli_fetch_array($y, MYSQLI_ASSOC)) {
        ?>
          <div class="slider-image">
            <a href="episode.php?id=<?php echo $tv['tv_id']; ?>">
              <img style="max-width: 300px; max-height: 175px;" src="<?php echo "{$tv['episode_img']}"; ?>" class="slider-img" alt="<?php echo "{$tv['episode_name']}"; ?>">
              <div class="info">
                <h2 class="slider-heading"><?php echo "{$tv['episode_name']}"; ?></h2>
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

    mysqli_close($link);

    ?>

</div>

<?php

require('includes/footer.php');

?>