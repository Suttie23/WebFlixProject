<?php

# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  # Connect to the database.
  require('connect_db.php');

  # Initialize an error array.
  $errors = array();

  # Check for a first name.
  if (empty($_POST['first_name'])) {
    $errors[] = 'Enter your first name.';
  } else {
    $fn = mysqli_real_escape_string($link, trim($_POST['first_name']));
  }

  # Check for a last name.
  if (empty($_POST['last_name'])) {
    $errors[] = 'Enter your last name.';
  } else {
    $ln = mysqli_real_escape_string($link, trim($_POST['last_name']));
  }

  # Check for an email address:
  if (empty($_POST['email'])) {
    $errors[] = 'Enter your email address.';
  } else {
    $e = mysqli_real_escape_string($link, trim($_POST['email']));
  }

  # Check for a date of birth:
  if (empty($_POST['date_of_birth'])) {
    $errors[] = 'Enter your date of birth';
  } else {
    $dob = mysqli_real_escape_string($link, trim($_POST['date_of_birth']));
  }

  # Check for a contact number:
  if (empty($_POST['contact_number'])) {
    $errors[] = 'Enter your contact number.';
  } else {
    $cn = mysqli_real_escape_string($link, trim($_POST['contact_number']));
  }


  # Check for a password and matching input passwords.
  if (!empty($_POST['pass1'])) {
    if ($_POST['pass1'] != $_POST['pass2']) {
      $errors[] = 'Passwords do not match.';
    } else {
      $p = mysqli_real_escape_string($link, trim($_POST['pass1']));
    }
  } else {
    $errors[] = 'Enter your password.';
  }

  # Check if email address already registered.
  if (empty($errors)) {
    $q = "SELECT user_id FROM users WHERE email='$e'";
    $r = @mysqli_query($link, $q);
    if (mysqli_num_rows($r) != 0) $errors[] = 'Email address already registered.';
  }

  # On success register user inserting into 'users' database table.
  if (empty($errors)) {
    $q = "INSERT INTO users (first_name, last_name, date_of_birth, contact_number, email, pass, reg_date) VALUES ('$fn', '$ln', '$dob', '$cn', '$e', SHA2('$p',256), NOW() )";
    $r = @mysqli_query($link, $q);
    if ($r) {
      alert("Account Created Successfully!");
      header("Refresh:0; url=../index.php");
    }

    # Close database connection.
    mysqli_close($link);

    exit();
  }
  # Or report errors.
  else {
    foreach ($errors as $msg) {
      alert("$msg");
    }
    header("Refresh:0; url=../index.php");

    # Close database connection.
    mysqli_close($link);
  }
}

function alert($msg)
{
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
