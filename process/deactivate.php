<?php include "../includes/session.php";

if (isset($_POST['userProfile'])) {
  $id_user = $_SESSION['id_user'];

  $sql = "DELETE  from users where id_user = '$id_user'";
  if ($conn->query($sql)) {
    echo "Account Deactivate Successfully!";
  }
}
