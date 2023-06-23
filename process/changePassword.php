<?php
include "../includes/session.php";

if (isset($_POST['myPassword'])) {
  $email = $_SESSION['email'];
  $newPassword = $_POST['newPassword'];

  $password = password_hash($newPassword, PASSWORD_DEFAULT);

  $sql = "UPDATE users set password = '$password' where email = '$email'";
}

header("location : ../index.php");
exit();
