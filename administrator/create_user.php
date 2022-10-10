<?php include('../functions.php');
  if (!isLoggedIn()) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../login.php');
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width-device-width,initial-scale=1,maximum-scale=1">
		<title>Create New User - Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
		<link rel = "stylesheet" type = "text/css" href = "../css/dashboard-style.css">
		<link rel = "stylesheet" href = "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
		<style>
			.header {
				background: #003366;
			}
			button[name=register_btn] {
				background: #003366;
			}
		</style>
	</head>
	<body>
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
					<a href = "employees.php"><span class = "las la-users"></span>
					<span>Manage Employees</span></a>
				</li>
				<li>
					<a href = "create_user.php" class = "active"><span class = "las la-plus"></span>
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
				Add User
			</h2>

			<div class = "search-wrapper">
				<span class = "las la-search"></span>
				<input type = "search" placeholder = "Search here..." />
			</div>

			<div class = "user-wrapper">
				<img src = "../images/admin_profile.png"  alt = "user_profile">
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<!-- <i style = "color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> -->
						<br>
						<a href = "home.php?logout='1'" style = "color: red;">logout</a>
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

						<form method = "post" action = "create_user.php">

							<?php echo display_error(); ?>

							<div class = "input-group">
					      <label>First Name</label>
					      <input type = "text" name = "firstname" value = "" required>
					    </div>
					    <div class = "input-group">
					      <label>Last Name</label>
					      <input type = "text" name = "lastname" value = "" required>
					    </div>
              <td>
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
              </td>
					    <div class = "input-group">
					      <label>Contact Number</label>
					      <input type = "text" name = "phone" value = "">
					    </div>
					    <div class = "input-group">
					      <label>Username</label>
					      <input type = "text" name = "username" value = "<?php echo $username; ?>">
					    </div>
					    <div class = "input-group">
					      <label>Email</label>
					      <input type = "email" name = "email" value = "<?php echo $email; ?>">
					    </div>
					    <div class = "input-group">
					      <label>Password</label>
					      <input type = "password" name = "password_1">
					    </div>
					    <div class = "input-group">
					      <label>Confirm Password</label>
					      <input type = "password" name = "password_2">
					    </div>
							<div class = "input-group">
								<label>User type</label>
								<select name = "user_type" id="user_type" >
									<option value = "">User Type</option>
									<option value = "employee">Employee</option>
									<option value = "user">User</option>
								</select>
							</div>
							<div class = "input-group">
								<button type = "submit" class = "btn" name = "signup_btn"> + Create user</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>
