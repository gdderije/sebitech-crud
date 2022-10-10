<?php

  $db = mysqli_connect('localhost', 'root', '', 'sebitech_crm');

  $sql = "SELECT * FROM companies_db_table";
  $all_categories = mysqli_query($db, $sql);

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

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../../images/company_logo" . $filename;

    $sql = "INSERT INTO companies_db_table (filename) VALUES ('$filename')";

    mysqli_query($db, $sql);

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3> Image uploaded successfully!</h3>";
    } else {
        echo "<h3>Failed to upload image!</h3>";
    }

    mysqli_query($db, "INSERT INTO companies_db_table (company_name, email, filename, website)
    VALUES ('$company_name', '$email', '$filename', '$website')");
    $_SESSION['message'] = "Information saved!";
    header('location: ../companies.php');
  }

  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $company_name = $_POST['company_name'];
    $email       =  $_POST['email'];
    $filename    =  $_POST['filename'];
    $website       =  $_POST['website'];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../../images/company_logo" . $filename;

    $sql = "INSERT INTO companies_db_table (filename) VALUES ('$filename')";

    mysqli_query($db, $sql);

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3> Image uploaded successfully!</h3>";
    } else {
        echo "<h3>Failed to upload image!</h3>";
    }

    mysqli_query($db, "UPDATE companies_db_table SET company_name = '$company_name', email = '$email', filename = '$filename', website = '$website' WHERE id = $id");
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
