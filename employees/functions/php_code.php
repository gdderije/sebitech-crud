<?php
  $db = mysqli_connect('localhost', 'root', '', 'sebitech_crm');

  $firstname = "";
  $lastname = "";
  $company_name = "";
  $email    = "";
  $username = "";
  $phone = "";
  $user_type = "";
  $id = 0;
  $update = false;

  if (isset($_POST['save'])) {
    $firstname   =  $_POST['firstname'];
    $lastname    =  $_POST['lastname'];
    $company_name = $_POST['company_name'];
    $email       =  $_POST['email'];
    $username    =  $_POST['username'];
    $phone       =  $_POST['phone'];
    $user_type   =  $_POST['user_type'];

    mysqli_query($db, "INSERT INTO employees_db_table (firstname, lastname, company_name, email, username, phone, user_type)
    VALUES ('$firstname', '$lastname', '$company_name', '$email', '$username', '$phone', '$user_type')");
    $_SESSION['message'] = "Information saved!";
    header('location: ../home.php');
  }

  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname   = $_POST['firstname'];
    $lastname    = $_POST['lastname'];
    $company_name = $_POST['company_name'];
    $email       =  $_POST['email'];
    $username    =  $_POST['username'];
    $phone       =  $_POST['phone'];
    $user_type       =  $_POST['user_type'];

    mysqli_query($db, "UPDATE employees_db_table SET firstname='$firstname', lastname='$lastname', company_name='$company_name', phone='$phone', username='$username', email='$email', user_type='$user_type' WHERE id=$id");
    $_SESSION['message'] = "Data updated!";
    header('location: ../employees.php');
  }

  if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM employees_db_table WHERE id=$id");
    $_SESSION['message'] = "Data deleted!";
    header('location: ../employees.php');
  }
 ?>
