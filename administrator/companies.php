<?php include('../functions.php');
  if (!isLoggedIn()) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../login.php');
  }
?>
<?php include('functions/php_code1.php'); ?>
<?php
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM companies_db_table WHERE id = $id");

    if ($record->num_rows == 1) {
      $n = mysqli_fetch_array($record);
      $comppany_name = $n['company_name'];
      $email = $n['email'];
      $filename = $n['filename'];
      $website = $n['website'];
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Manage Employees</title>
    <link rel = "stylesheet" type = "text/css" href = "css/style2.css">
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

    <?php $results = mysqli_query($db, "SELECT *FROM companies_db_table"); ?>

    <table>
      <thead>
        <tr>
          <th>Company Name</th>
          <th>Email</th>
          <th>Company Logo</th>
          <th>Website</th>
          <th colspan = "2">Action</th>
        </tr>
      </thead>

      <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
          <td><?php echo $row['company_name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['filename']; ?></td>
          <td><?php echo $row['website']; ?></td>
          <td><a href = "companies.php?edit=<?php echo $row['id']; ?>" class = "edit_btn">Edit</a></td>
          <td><a href = "functions/php_code1.php?del=<?php echo $row['id']; ?>" class = "del_btn">Delete</a></td>
        </tr>
      <?php } ?>
    </table>

    <form method = "post" action = "functions/php_code1.php">
      <div class = "input-group">
        <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
      </div>
      <div class = "input-group">
        <label>Company Name</label>
        <input type = "text" name = "company_name" value = "<?php echo $company_name; ?>">
      </div>
      <div class = "input-group">
        <label>Email</label>
        <input type = "text" name = "email" value = "<?php echo $email; ?>">
      </div>
      <div class = "input-group">
        <label>Company Logo</label>
        <input type = "text" name = "filename" value = "<?php echo $filename; ?>">
      </div>
      <div class = "input-group">
        <label>Website</label>
        <input type = "text" name = "website" value = "<?php echo $website; ?>">
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
