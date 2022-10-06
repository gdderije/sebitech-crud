<!DOCTYPE html>
<?php include('functions.php') ?>
<html>
<head>
  <title>SebiTech CRUD Exam (Mini-CRM)</title>
  <link rel = "stylesheet" href = "style.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>
<body>
  <div class = "header">
    <h2>Sign Up</h2>
  </div>
  <form method = "post" action = "register.php">
    <?php echo display_error(); ?>
    <div class = "input-group">
      <label>First Name</label>
      <input type = "text" name = "firstname" value = "" placeholder = "Enter first name..." style = "outline: none;" required>
    </div>
    <div class = "input-group">
      <label>Last Name</label>
      <input type = "text" name = "lastname" value = "" placeholder = "Enter last name..." style = "outline: none;" required>
    </div>
    <div class = "input-group">
      <label>Company Name</label>
      <input type = "text" name = "company_name" value = "" placeholder = "Enter company name..." style = "outline: none;">
    </div>
    <div class = "input-group">
      <label>Contact Number</label>
      <input type = "text" name = "phone" value = "" placeholder = "Enter contact number..." style = "outline: none;">
    </div>
    <div class = "input-group">
      <label>Username</label>
      <input type = "text" name = "username" value = "<?php echo $username; ?>" placeholder = "Enter username..." style = "outline: none;">
    </div>
    <div class = "input-group">
      <label>Email</label>
      <input type = "email" name = "email" value = "<?php echo $email; ?>" placeholder = "Enter email..." style = "outline: none;">
    </div>
    <div class = "input-group">
      <label>Password</label>
      <input type = "password" name = "password_1" placeholder = "Enter password..." style = "outline: none;">
    </div>
    <div class = "input-group">
      <label>Confirm Password</label>
      <input type = "password" name = "password_2" placeholder = "Confirm password..." style = "outline: none;">
    </div>
    <div class = "input-group">
      <button type = "submit" class = "btn" name = "signup_btn" style = "outline: none;">Sign Up</button>
    </div>
    <p>
      Already a member? <a href="login.php">Sign in</a>
    </p>
</body>
</html>
