<?php

session_start();

$db = require('../../includes/connect_db.php');


# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'])) {

  $db;

  $errors = array();

  $id = $_POST['user_id'];

  # On success new password into 'users' database table.
  if (!empty($_POST['first_name'])) {
    $fn = trim($_POST['first_name']);
    $q = "UPDATE users SET first_name='$fn' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['last_name'])) {
    $ln = trim($_POST['last_name']);
    $q = "UPDATE users SET last_name='$ln' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['email'])) {

    $e = trim($_POST['email']);

    $q = "SELECT * FROM users WHERE email='$e'";
    $r = @mysqli_query($link, $q);

    if (mysqli_num_rows($r) == 0) {
      $q = "UPDATE users SET email='$e' WHERE user_id='$id'";
      $r = @mysqli_query($link, $q);
    } else {

      $errors[] = "This email already exists.";
    }
  }

  if (!empty($_POST['date_of_birth'])) {
    $dob = trim($_POST['date_of_birth']);
    $q = "UPDATE users SET date_of_birth='$dob' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['contact_no'])) {
    $co = trim($_POST['contact_no']);
    $q = "UPDATE users SET contact_number='$co' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../users.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mov_id'])) {

  $db;

  $errors = array();

  $id = $_POST['mov_id'];

  if (!empty($_POST['mov_title'])) {
    $t = trim($_POST['mov_title']);
    $q = "UPDATE movie SET mov_title='$t' WHERE mov_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['mov_desc'])) {
    $desc = trim($_POST['mov_desc']);
    $q = "UPDATE movie SET mov_desc='$desc' WHERE mov_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['mov_genre'])) {
    $gn = trim($_POST['mov_genre']);
    $q = "UPDATE movie SET mov_genre='$gn' WHERE mov_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['mov_img'])) {
    $mi = trim($_POST['mov_img']);
    $q = "UPDATE movie SET mov_img='$mi' WHERE mov_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['mov_trailer'])) {
    $mt = trim($_POST['mov_trailer']);
    $q = "UPDATE movie SET mov_trailer='$mt' WHERE mov_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['mov_file'])) {
    $mf = trim($_POST['mov_file']);
    $q = "UPDATE movie SET mov_file='$mf' WHERE mov_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../movies.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_mov'])) {

  $db;

  $errors = array();

  $t = trim($_POST['new_mov']);
  $d = trim($_POST['mov_desc']);
  $g = trim($_POST['mov_genre']);
  $i = trim($_POST['mov_img']);
  $tr = trim($_POST['mov_trailer']);
  $f = trim($_POST['mov_file']);

  if (!empty($_POST['new_mov'])) {
    $q = "INSERT INTO movie (mov_title, mov_desc, mov_genre, mov_img, mov_trailer, mov_file) VALUES ('$t', '$d', '$g', '$i', '$tr', '$f')";
    $r = @mysqli_query($link, $q);
  } else {

    $errors[] = "There was an unexpected error";
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../movies.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_genre'])) {

  $db;

  $errors = array();

  if (!empty($_POST['new_genre'])) {

    $e = $_POST['new_genre'];

    $q = "INSERT INTO genres (genre_name) VALUES ('$e')";
    $r = @mysqli_query($link, $q);

  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../genres.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tv_id'])) {

  $db;

  $errors = array();

  $id = $_POST['tv_id'];

  if (!empty($_POST['tv_title'])) {
    $tt = trim($_POST['tv_title']);
    $q = "UPDATE tv SET tv_title='$tt' WHERE tv_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['tv_desc'])) {
    $td = trim($_POST['tv_desc']);
    $q = "UPDATE tv SET tv_desc='$td' WHERE tv_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['tv_genre'])) {
    $tg = trim($_POST['tv_genre']);
    $q = "UPDATE tv SET genre='$tg' WHERE tv_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['tv_img'])) {
    $ti = trim($_POST['tv_img']);
    $q = "UPDATE tv SET tv_img='$ti' WHERE tv_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['tv_trailer'])) {
    $ttv = trim($_POST['tv_trailer']);
    $q = "UPDATE tv SET tv_trailer='$ttv' WHERE tv_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../tv.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_tv'])) {

  $db;

  $errors = array();

  $t = trim($_POST['new_tv']);
  $d = trim($_POST['tv_desc']);
  $g = trim($_POST['tv_genre']);
  $i = trim($_POST['tv_img']);
  $tr = trim($_POST['tv_trailer']);

  if (!empty($_POST['new_tv'])) {
    $q = "INSERT INTO tv (tv_title, tv_desc, genre, tv_img, tv_trailer) VALUES ('$t', '$d', '$g', '$i', '$tr')";
    $r = @mysqli_query($link, $q);
  } else {

    $errors[] = "There was an unexpected error";
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../tv.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['episode_id'])) {

  $db;

  $errors = array();

  $id = $_POST['episode_id'];

  if (!empty($_POST['episode_number'])) {
    $en = trim($_POST['episode_number']);
    $q = "UPDATE episode SET episode_number='$en' WHERE episode_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['episode_name'])) {
    $ename = trim($_POST['episode_name']);
    $q = "UPDATE episode SET episode_name='$ename' WHERE episode_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['series_id'])) {
    $tv = $_POST['series_id'];
    $q = "UPDATE episode SET tv_id='$tv' WHERE episode_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['episode_file'])) {
    $ef = trim($_POST['episode_file']);
    $q = "UPDATE episode SET episode_file='$ef' WHERE episode_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['episode_img'])) {
    $ef = trim($_POST['episode_img']);
    $q = "UPDATE episode SET episode_img='$ef' WHERE episode_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../tv.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_episode'])) {

  $db;

  $errors = array();

  $e = trim($_POST['new_episode']);
  $en = trim($_POST['episode_name']);
  $si = trim($_POST['series_id']);
  $ef = trim($_POST['episode_file']);
  $ei = trim($_POST['episode_img']);

  if (!empty($_POST['new_episode'])) {
    $q = "INSERT INTO episode (episode_number, episode_name, tv_id, episode_file, episode_img) VALUES ('$e', '$en', '$si', '$ef','$ei')";
    $r = @mysqli_query($link, $q);
  } else {

    $errors[] = "There was an unexpected error";
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../tv.php");
}




function alert($msg)
{
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
