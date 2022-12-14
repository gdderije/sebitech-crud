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
    <meta charset = "UTF-8">
		<meta name = "viewport" content = "width-device-width,initial-scale=1,maximum-scale=1">
    <title>Manage Employees</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <link rel = "stylesheet" type = "text/css" href = "../css/dashboard-style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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

    <input type = "checkbox" id = "nav-toggle">
    <div class = "sidebar">
      <div class = "sidebar-brand">
        <h1><span class = "lab la-accusoft"></span> <span>TechSols</span></h1>
      </div>
      <div class = "sidebar-menu">
        <ul>
          <li>
            <a href = "home.php"><span class = "las la-igloo"></span>
            <span>Dashboard</span></a>
          </li>
          <li>
            <a href = "companies.php"><span class = "las la-clipboard-list"></span>
            <span>Manage Companies</span></a>
          </li>
          <li>
            <a href = "employees.php" class = "active"><span class = "las la-users"></span>
            <span>Manage Employees</span></a>
          </li>
          <li>
            <a href = "create_user.php"><span class = "las la-plus"></span>
            <span>Add User</span></a>
          </li>
        </ul>
      </div>
    </div>

    <div class = "main-content">
      <header>
        <h2>
          <label for = "nav-toggle">
            <span class = "las la-bars" style = "cursor: pointer;"></span>
          </label>
          Manage Employees
        </h2>

        <div class = "search-wrapper">
          <span class = "las la-search"></span>
          <input type = "search" placeholder = "Search here..." />
        </div>

        <div class = "user-wrapper">
					<img src="../images/admin_profile.png"  alt="user_profile">
          <?php  if (isset($_SESSION['user'])) : ?>
  					<strong><?php echo $_SESSION['user']['username']; ?></strong>

  					<small>
  						<!-- <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> -->
  						<br>
  						<a href="home.php?logout='1'" style="color: red;">logout</a>
  					</small>

  				<?php endif ?>
        </div>
      </header>

      <div class = "recent-grid">
        <div class = "projects">
          <div class = "card">
            <div class = "card-header">
            </div>
            <div class = "card-body">
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
                  <select name = "company_id">
                    <option value = "">Company Name</option>
                    <?php
                    $sql = "SELECT * FROM companies_db_table";
                    $all_categories = mysqli_query($db, $sql);
                        while ($category = mysqli_fetch_array(
                                $all_categories, MYSQLI_ASSOC)):;
                    ?>
                    <option value = "<?php echo $category["company_name"];?>">
                    <?php echo $category["company_name"];?>
                    </option>
                    <?php
                        endwhile;
                    ?>
                </select>
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
            				<option value="">User Type</option>
            				<option value="employee">Employee</option>
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
            </div>
          </div>
        </div>
      </main>
  </body>
</html>
