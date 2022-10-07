<?php

  $db = mysqli_connect('localhost', 'root', '', 'sebitech_crm');

  $company_name = "";
  $email    = "";
  $filename = "";
  $website = "";
  $id = 0;
  $update = false;

  if (isset($_POST['save'])) {
    $company_name = $_POST['company_name'];
    $email       =  $_POST['email'];
    $filename    =  $_POST['filename'];
    $website       =  $_POST['website'];

    mysqli_query($db, "INSERT INTO companies_db_table (company_name, email, filename, website)
    VALUES ('$company_name', '$email', '$filename', '$website')");
    $_SESSION['message'] = "Information saved!";
    header('location: ../home.php');
  }

  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $company_name = $_POST['company_name'];
    $email       =  $_POST['email'];
    $filename    =  $_POST['filename'];
    $website       =  $_POST['website'];

    mysqli_query($db, "UPDATE companies_db_table SET company_name='$company_name', email='$email', filename='$filename', website='$website' WHERE id=$id");
    $_SESSION['message'] = "Data updated!";
    header('location: ../companies.php');
  }

  if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM companies_db_table WHERE id=$id");
    $_SESSION['message'] = "Data deleted!";
    header('location: ../companies.php');
  }
 ?>
