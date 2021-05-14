<?php

session_start();

require('../../includes/connect_db.php');


# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'])) {

  $errors = array();

  $id = $_POST['user_id'];

  # On success new password into 'users' database table.
  if (!empty($_POST['user_id'])) {

    $q = "DELETE FROM users WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../users.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['genre_name'])) {

  $errors = array();

  $id = $_POST['genre_name'];

  # On success new password into 'users' database table.
  if (!empty($_POST['genre_name'])) {

    $q = "DELETE FROM genres WHERE genre_name='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../genres.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mov_id'])) {

  $errors = array();

  $id = $_POST['mov_id'];

  # On success new password into 'users' database table.
  if (!empty($_POST['mov_id'])) {

    $q = "DELETE FROM movie WHERE mov_id='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../movies.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tv_id'])) {

  $errors = array();

  $id = $_POST['tv_id'];

  # On success new password into 'users' database table.
  if (!empty($_POST['tv_id'])) {

    $q = "DELETE FROM tv WHERE tv_id='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../tv.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['episode_id'])) {

  $errors = array();

  $id = $_POST['episode_id'];

  # On success new password into 'users' database table.
  if (!empty($_POST['episode_id'])) {

    $q = "DELETE FROM episode WHERE episode_id='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../tv.php");
}


function alert($msg)
{
  echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>