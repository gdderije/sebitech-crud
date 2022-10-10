<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8">
		<meta name = "viewport" content = "width-device-width,initial-scale=1,maximum-scale=1">
    <title>TechSols Sign In</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel = "stylesheet" type - "text/css" href = "css/style.css">
  </head>
  <body>
    <div class = "wrapper">
      <div class = "inner">
        <div class = "image-holder">
          <img src = "images/tech1.jpg" alt = "image">
        </div>
      	<form method="post" action="login.php">

      		<?php echo display_error(); ?>
          <h2>Sign In</h2>
      		<div class="input-group">
      			<input type="text" class = "form-control" name="username" placeholder = "Username" required>
      		</div>
      		<div class="input-group">
      			<input type="password" class = "form-control" name="password"placeholder = "Password" required>
      		</div>
      		<div class="input-group">
      			<button type="submit" class="btn" name="login_btn">Login</button>
      		</div>
      		<p>
      			Not yet a member? <a href="register.php"  style = "text-decoration: none;">Sign up</a>
      		</p>
      	</form>
      </div>
    </div>
  </body>
</html>
