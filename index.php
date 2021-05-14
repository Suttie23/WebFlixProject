<!-- Beginning the Session, if logout is recieved then the page will redirect the user back to the logged out homepage -->
<?php
session_start();

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user_id']);
}
require('includes/connect_db.php');
?>
<!-- Beginning the Session, if logout is recieved then the page will redirect the user back to the logged out homepage -->


<!DOCTYPE html>
<html lang="en">

<!-- Modal SIGNUP -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModal" aria-hidden="true" style="z-index: 2001;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
      </div>
      <div class="modal-body">

        <div class="container">
          <div class="col-sm d-flex justify-content-center">
            <form action="includes/reg_form.php" method="post">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" size="20" required value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" size="20" required value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" size="50" required value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
              </div>

              <!-- Date of birth input -->
              <div class="form-outline mb-4">
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Date Of Birth (YYYY-MM-DD)" size="50" required value="<?php if (isset($_POST['date_of_birth'])) echo $_POST['date_of_birth']; ?>">
              </div>

              <!-- Contact Number input -->
              <div class="form-outline mb-4">
                <input type="contact_number" class="form-control" id="contact_number" name="contact_number" placeholder="Enter Contact Number" size="50" required value="<?php if (isset($_POST['contact_number'])) echo $_POST['contact_number']; ?>">
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Create Password" size="20" required value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
              </div>

              <div class="form-outline mb-4">
                <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirm Password" size="20" required value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn text-white btn-block mb-4" style="background-color: #bc241c;">Sign up</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>or log in <strong><a href="" data-mdb-toggle="modal" data-mdb-target="#loginModal" data-mdb-dismiss="modal">here</a></strong>
                </p>
              </div>
            </form>
          </div>
        </div>
        <!-- end of container-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" style="background-color: #bc241c;" data-mdb-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>
<!-- Modal SIGNUP -->

<!-- Modal LOGIN -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true" style="z-index: 2001;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
      </div>
      <div class="modal-body">

        <div class="container">
          <div class="col-sm d-flex justify-content-center">
            <div class="card text-center">


              <div class="card-body">
                <div class="row">
                  <div class="col-sm col-md">
                    <form action="login_action.php" method="post">
                      <input type="text" class="form-control" name="email" placeholder="Email" required>
                  </div>
                  <div class="col-sm col-md">
                    <input type="password" class="form-control" name="pass" placeholder="Password" required></p>
                  </div>

                </div>
                <div class="card-footer text-muted bg-white">
                  <input type="submit" class="btn text-white btn-block mb-4" style="background-color: #bc241c;" value="Sign In Now">
                  <p>Forgot your Password? <strong><a href="" data-mdb-toggle="modal" data-mdb-target="#forgotPassModal" data-mdb-dismiss="modal">Recover Password</a></strong></p>
                  <p>Don't Have an acccount? <strong><a href="" data-mdb-toggle="modal" data-mdb-target="#signupModal" data-mdb-dismiss="modal">Register here</a></strong></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of container-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" style="background-color: #bc241c;" data-mdb-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>
<!-- Modal LOGIN -->

<!-- Modal RECOVER PASS -->
<div class="modal fade" id="forgotPassModal" tabindex="-1" aria-labelledby="forgotPassModal" aria-hidden="true" style="z-index: 2001;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recover Password</h5>
      </div>
      <div class="modal-body">
        <p class="col-sm d-flex justify-content-center">Please enter your email address. We will send you an email to help recover your password.</p>
        <div class="container">
          <div class="col-sm d-flex justify-content-center">
            <div class="card text-center">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm col-md">
                    <form action="forgotpassword.php" method="post">
                      <input type="text" class="form-control" name="email" placeholder="Email" required>
                  </div>
                </div>
                <div class="card-footer text-muted bg-white">
                  <input type="submit" class="btn text-white btn-block mb-4" style="background-color: #bc241c;" value="Recover Password">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of container-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" style="background-color: #bc241c;" data-mdb-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>
<!-- Modal RECOVER PASS -->



<?php
require('includes/header.php');
?>

<!-- IF LOGGED IN BUT NOT SUBSCRIBED, DISPLAY THE FOLLOWING -->
<?php if ($_SESSION['subscribed'] == "0" && isset($_SESSION['first_name'])) : ?>

  <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">

    <!-- Inner -->
    <div class="carousel-inner">
      <!-- Single item -->
      <div class="carousel-item active">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white text-center">
              <h1 class="mb-3">Welcome <strong style="color: #bc241c ;"><?php echo $_SESSION['first_name']; ?></strong></h1>
              <h5 class="mb-4">Subscribe now to begin watching!</h5>
              <a class="btn btn-outline-light btn-lg m-2" role="button" href="myaccount.php">Subscribe</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  require('includes/homecontent.html');
  ?>
  <!-- IF LOGGED IN BUT NOT SUBSCRIBED, DISPLAY THE FOLLOWING -->

  <!-- IF LOGGED IN AND SUBSCRIBED, DISPLAY THE FOLLOWING -->
<?php elseif ($_SESSION['subscribed'] == "1" && isset($_SESSION['first_name'])) : ?>


  <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">

    <!-- Inner -->
    <div class="carousel-inner">
      <!-- Single item -->
      <div class="carousel-item active">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white text-center">
              <h1 class="mb-3">Welcome <strong style="color: #bc241c ;"><?php echo $_SESSION['first_name']; ?></strong></h1>
              <h5 class="mb-4">Click below to begin watching</h5>
              <a class="btn btn-outline-light btn-lg m-2" role="button" href="movies.php">Watch Movies</a>
              <a class="btn btn-outline-light btn-lg m-2" role="button" href="tv.php">Watch TV</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  require('includes/homecontent.html');
  ?>
  <!-- IF LOGGED IN AND SUBSCRIBED, DISPLAY THE FOLLOWING -->

  <!-- IF NOT LOGGED IN, DISPLAY THE FOLLOWING -->
<?php else : ?>

  <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">

    <!-- Inner -->
    <div class="carousel-inner">
      <!-- Single item -->
      <div class="carousel-item active">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white text-center">
              <h1 class="mb-3">Welcome <strong style="color: #bc241c ;"><?php echo $_SESSION['first_name']; ?></strong></h1>
              <h5 class="mb-4">Log in or Sign up to begin viewing now!</h5>
              <a class="btn btn-outline-light btn-lg m-2" role="button" rel="nofollow" data-mdb-toggle="modal" data-mdb-target="#loginModal">Log In</a>
              <a class="btn btn-outline-light btn-lg m-2" role="button" rel="nofollow" data-mdb-toggle="modal" data-mdb-target="#signupModal">Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  require('includes/homecontent.html');
  ?>

<?php endif ?>
<!-- IF NOT LOGGED IN, DISPLAY THE FOLLOWING -->


<?php
require('includes/footer.php');
?>

</html>