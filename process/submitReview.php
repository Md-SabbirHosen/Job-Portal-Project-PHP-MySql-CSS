<?php
include "../includes/session.php";

if (isset($_GET['cid'])) {
  if (isset($_POST['submit'])) {
    $id_user = $_SESSION['id_user'];
    $id_company = $_GET['cid'];
    $review = $_POST['company-review'];
    $createdat = date("Y-m-d");
    $hash  = md5($id_company);
    if (isset($_POST['rate1'])) {
      $rate = 1;
    }
    if (isset($_POST['rate2'])) {
      $rate = 2;
    }
    if (isset($_POST['rate3'])) {
      $rate = 3;
    }
    if (isset($_POST['rate4'])) {
      $rate = 4;
    }
    if (isset($_POST['rate5'])) {
      $rate = 5;
    }

    echo $rate;
    exit();

    $sql = "INSERT into company_reviews (company_id,createdby,review,	createdat) values('$id_company','$id_user','$review','$createdat')";


    if ($conn->query($sql)) {
      header("Location: ../companyDetails.php?key=" . $hash . "&id=" . $id_company);
      exit();
    }
  }
}
