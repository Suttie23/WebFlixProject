<?php
include('includes/header_account.php');

?>

  <div class="container text-center" style="margin-bottom:25px;">
    <?php if (isset($_SESSION['first_name'])) : ?>
      <h2 class="text-left " style="margin-bottom:25px; margin-top:25px;">Welcome <strong style="color: #bc241c ;"><?php echo $_SESSION['first_name']; ?></strong></h2>
      <hr class="featurette-divider">
    <?php endif ?>
    <h2 class="featurette-heading text-center" style="margin-bottom:25px;">Account Details</h2>


    <?php

    # Open database connection.
    require('includes/connect_db.php');

    # Create query to retrieve items from 'users' table, based on the user_id PHP set in session.
    $q = "SELECT * FROM users WHERE user_id={$_SESSION['user_id']}";
    #Create variable to validate database connection and query.
    $r = mysqli_query($link, $q);
    #Create conditional if statement which will execute code if the condition is TRUE.
    if (mysqli_num_rows($r) > 0) {


      while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '
	
		
        <div class="d-flex justify-content-center">
        <div class="col-md-7">
        <p class="lead">Forename: '  . $row['first_name'] . '</p>
        <p class="lead">Surname: '  . $row['last_name'] . '</p>
          <p class="lead">Email: '  . $row['email'] . ' </p>
          <p class="lead">Contact Number: '  . $row['contact_number'] . ' </p>
          <p class="lead">Password:  ************</p>
          <p class="lead">Date Of Birth: '  . $row['date_of_birth'] . '</p>
          <p class="lead">Registration Date: '  . $row['reg_date'] . '</p>
        </div>
      </div>
	
	';
      }
    }

    ?>

    <a class="nav-link" href="" rel="nofollow" data-mdb-toggle="modal" data-mdb-target="#password"> <i class="fa fa-edit"></i> Change Password</a>

    <!-- CHANGE PASSWORD MODAL-->
    <div class="modal fade" id="password" tabindex="-1" aria-labelledby="password" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          </div>
          <div class="modal-body">

            <div class="container">
              <div class="col-sm d-flex justify-content-center">
                <div class="card text-center">
                  <form action="change-password.php" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm col-md">
                          <input type="email" name="email" class="form-control" placeholder="Confirm Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>
                        </div>
                        <div class="col-sm col-md">
                          <input type="password" name="pass1" class="form-control" placeholder="New Password" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" required>
                        </div>
                        <div class="col-sm col-md">
                          <input type="password" name="pass2" class="form-control" placeholder="Confirm New Password" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" required>
                        </div>
                  </form>
                </div>
                <div class="card-footer text-muted bg-white">
                  <button name="btnChangePassword"" type="submit" class="btn btn-danger btn-block mb-4" value="Change Password">Change Password</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
  </div>
  <!-- CHANGE PASSWORD MODAL-->



  <hr class="featurette-divider">
  <?php if ($_SESSION['subscribed'] == "0")
    echo '<h2 class="featurette-heading text-left" style="margin-bottom:25px;">Subscription Options</h2>

  <div id="paypal-button-container">
            <script src="https://www.paypal.com/sdk/js?client-id=Aerd3MrfCtNITyThP4lGdAO4tVLTd6w4elkOjJNWYw--GIKQCaMV8DkFz0G29fXSJuLkeqiqaF1-cdLn&currency=GBP" data-sdk-integration-source="button-factory"></script>
            <script>
              function paid() {
                location.replace("payment_success.php");
              }

              paypal.Buttons({
                  style: {
                    color: "silver",
                    shape: "pill",
                  },
                  createOrder: function(data, actions) {
                    // Set up the transaction
                    return actions.order.create({
                      purchase_units: [{
                        amount: {
                          currency_code: "GBP",
                          value: "99",
                        },
                        description: "Webflix Premium",
                        custom_id: "69420",
                      }, ],
                    });
                  },
                  onApprove: function(data, actions) {
                    // Capture order after payment approved
                    return actions.order.capture().then(function(details) {
                      paid();
                    });
                  },
                  onError: function(err) {
                    errorText = err;
                    error = true;
                  },
                })
                .render("#paypal-button-container"); // Renders the PayPal button
            </script>


  </div>';

  else echo '<h2 class="featurette-heading text-left" style="margin-bottom:25px;">Subscription Type</h2>
  <div class="d-flex justify-content-center">
  <div class="col-md-7">
    <p class="lead">You are a subscribed member of Webflix!</p>
  </div> 
</div>
';
  ?>

  </div>
  <div class="container-fluid" style="margin-bottom:170px;">
  </div>


<?php
require('includes/footer.php');
?>

<!-- End project -->

</html>