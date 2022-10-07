<?php include('../functions.php');
  if (!isLoggedIn()) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../login.php');
  }
?>
<?php include('functions/php_code.php'); ?>
<?php
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM employees_db_table WHERE id = $id");

    if ($record->num_rows == 1) {
      $n = mysqli_fetch_array($record);
      $firstname = $n['firstname'];
      $lastname = $n['lastname'];
      $company_name = $n['company_name'];
      $email = $n['email'];
      $username = $n['username'];
      $phone = $n['phone'];
      $user_type = $n['user_type'];
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Manage Employees</title>
    <link rel = "stylesheet" type = "text/css" href = "css/style1.css">
  </head>
  <body>
    <?php if (isset($_SESSION['message'])): ?>
      <div class = "msg">
        <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        ?>
      </div>
    <?php endif ?>

    <?php $results = mysqli_query($db, "SELECT *FROM employees_db_table"); ?>

    <table>
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Company Name</th>
          <th>Email</th>
          <th>Username</th>
          <th>Contact Number</th>
          <th>User Type</th>
          <th colspan = "2">Action</th>
        </tr>
      </thead>

      <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
          <td><?php echo $row['firstname']; ?></td>
          <td><?php echo $row['lastname']; ?></td>
          <td><?php echo $row['company_name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td><?php echo $row['user_type']; ?></td>
          <td><a href = "employees.php?edit=<?php echo $row['id']; ?>" class = "edit_btn">Edit</a></td>
          <td><a href = "functions/php_code.php?del=<?php echo $row['id']; ?>" class = "del_btn">Delete</a></td>
        </tr>
      <?php } ?>
    </table>

    <form method = "post" action = "functions/php_code.php">
      <div class = "input-group">
        <input type = "hidden" name = "id" value = "<?php echo $id; ?>"
      </div>
      <div class = "input-group">
        <label>First Name</label>
        <input type = "text" name = "firstname" value = "<?php echo $firstname; ?>" required>
      </div>
      <div class = "input-group">
        <label>Last Name</label>
        <input type = "text" name = "lastname" value = "<?php echo $lastname; ?>" required>
      </div>
      <div class = "input-group">
        <label>Company Name</label>
        <input type = "text" name = "company_name" value = "<?php echo $company_name; ?>">
      </div>
      <div class = "input-group">
        <label>Contact Number</label>
        <input type = "text" name = "phone" value = "<?php echo $phone ?>">
      </div>
      <div class = "input-group">
        <label>Username</label>
        <input type = "text" name = "username" value = "<?php echo $username; ?>">
      </div>
      <div class = "input-group">
        <label>Email</label>
        <input type = "text" name = "email" value = "<?php echo $email; ?>">
      </div>
      <div class="input-group">
  			<label>User type</label>
  			<select name="user_type" id="user_type" >
  				<option value=""></option>
  				<option value="administrator">Administrator</option>
  				<option value="user">User</option>
  			</select>
  		</div>
      <div class = "input-group">
        <?php if ($update == true): ?>
          <button class = "btn" type = "submit" name = "update" style = "background: #556b2f;">Update</button>
        <?php else: ?>
          <button class = "btn" type = "submit" name = "save">Save</button>
        <?php endif ?>
      </div>
    </form>
  </body>
</html>
