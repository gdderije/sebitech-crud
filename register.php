<!DOCTYPE html>
<?php include('functions.php');?>
<?php include('employees/functions/php_code1.php'); ?>
<?php
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM companies_db_table WHERE id = $id");

    if ($record->num_rows == 1) {
      $n = mysqli_fetch_array($record);
      $company_id = $n['company_id'];
      $company_name = $n['company_name'];
      $email = $n['email'];
      $filename = $n['filename'];
      $website = $n['website'];
    }
  }
?>
<html>
<head>
  <meta charset = "UTF-8">
  <meta name = "viewport" content = "width-device-width,initial-scale=1,maximum-scale=1">
  <title>TechSols Sign Up</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
  <link rel = "stylesheet" href = "css/style.css">
</head>
<body>
  <div class="content">
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
  </div>
  <div class = "wrapper">
    <div class = "inner">
      <div class = "image-holder">
        <img src = "images/tech.jpg" alt = "image">
      </div>
      <form method = "post" action = "register.php">
        <?php echo display_error(); ?>
        <h2>Sign Up</h2>
        <div class = "input-group">
          <input type = "text" class = "form-control" name = "firstname" value = "" placeholder = "First Name" required>
          <input type = "text" class = "form-control" name = "lastname" value = "" placeholder = "Last Name" required>
        </div>
        <div class = "input-group">
          <select name = "company_name">
            <?php
            $sql = "SELECT * FROM companies_db_table";
            $all_categories = mysqli_query($db, $sql);
                while ($category = mysqli_fetch_array(
                        $all_categories, MYSQLI_ASSOC)):;
            ?>
            <option value = "<?php echo $category['company_name'];?>">
            <?php echo $category["company_name"];?>
            </option>
            <?php
                endwhile;
            ?>
          </select>
        </div>
        <div class = "input-group">
          <input type = "text" class = "form-control" name = "phone" value = "" placeholder = "Contact Number" style = "outline: none;">
        </div>
        <div class = "form-wrapper">
          <div class = "input-group">
            <input type = "text" class = "form-control" name = "username" value = "<?php echo $username; ?>" placeholder = "Username" style = "outline: none;">
          </div>
        </div>
        <div class = "form-wrapper">
          <div class = "input-group">
            <input type = "email" class = "form-control" name = "email" value = "<?php echo $email; ?>" placeholder = "Email Address" style = "outline: none;">
          </div>
        </div>
        <div class = "form-wrapper">
          <div class = "input-group">
            <input type = "password" class = "form-control" name = "password_1" placeholder = "Password" style = "outline: none;">
          </div>
          <div class = "input-group">
            <input type = "password" class = "form-control" name = "password_2" placeholder = "Confirm Password" style = "outline: none;">
          </div>
        </div>
        <div class = "input-group">
          <button type = "submit" class = "btn" name = "signup_btn" style = "outline: none;">Sign Up</button>
        </div>
        <p>
          Already a member? <a href="login.php" style = "text-decoration: none;">Sign in</a>
        </p>
      </form>
    </div>
  </div>
</body>
</html>
