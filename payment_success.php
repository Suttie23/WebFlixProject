<?php
require('includes/connect_db.php');
require('includes/header_account.php')
?>

<?php

$id = $_SESSION['user_id'];

?>

<div class="container">
    <?php

    $q = "UPDATE users SET subscribed=1 WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
    if ($r) {
        echo '<div class="container" style="margin-top:200px;">
    	<h2 class="text-center" style="margin-bottom:50px; margin-top:25px;"></h2>
      <div class="card-deck mb-3 text-center">
        <div class="card mb-4">
          <div class="card-header bg-white">
            <h4 class="my-0 font-weight-normal">Successfully Subscribed!</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">Welcome to <strong style="color: #bc241c;">Webflix! </strong></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Please click below and log back in!</li>
            </ul>
            <p><a class="btn btn-lg text-white" style="background-color: #bc241c;" href="logout.php" role="button">Re-Log</a></p>
          </div>
        </div>
      </div>
      </div>'; 
    }

    ?>

</div>
<div class="container-fluid" style="margin-top:200px;">
</div>

<?php
require('includes/footer.php');
?>

<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>