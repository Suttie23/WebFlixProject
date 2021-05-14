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

$q = "SELECT * FROM movie WHERE mov_id = '$id'";
$r = mysqli_query($link, $q);

#Create conditional if statement which will execute code if the condition is TRUE.
if (mysqli_num_rows($r) > 0) {


    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '
        <h1 class="mb-3 text-white text-center"><strong>'  . $row['mov_title'] . '</strong></h1>
        <div class="container">
        <hr class="featurette-divider text-white">
        </div>
         <iframe src="'  . $row['mov_trailer'] . '" width="100%" height="650" frameborder="0" allowfullscreen></iframe>

         <div class="container">
         <hr class="featurette-divider text-white">
         </div>
   
         <div class="container text-center">
         <div class="row text-white">
         <h2 style="padding-bottom:20px;">Genre: '  . $row['mov_genre'] . ' </h2>
          <h2 style="padding-bottom:50px;">Synopsis: '  . $row['mov_desc'] . '</h2>
        </div>
        </div>
      
      ';
    }
}

?>

<?php

require('includes/footer.php');

?>
