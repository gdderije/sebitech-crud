<?php
include('../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}

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
		<title>Home</title>
		<link rel="icon" type="image/x-icon" href="../images/favicon.ico">
		<link rel="stylesheet" type="text/css" href="../css/dashboard-style.css">
		<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
		<div class="header">
			<h2>Admin - Home Page</h2>
		</div>
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

			<input type = "checkbox" id = "nav-toggle">
	    <div class = "sidebar">
	      <div class = "sidebar-brand">
	        <h1><span class = "lab la-accusoft"></span> <span>TechSols</span></h1>
	      </div>
	      <div class = "sidebar-menu">
	        <ul>
	          <li>
	            <a href = "home.php" class = "active"><span class = "las la-igloo"></span>
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
	          Dashboard
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
	  						<br>
	  						<a href="home.php?logout='1'" style="color: red;">logout</a>
	  					</small>

	  				<?php endif ?>
	        </div>
	      </header>

	      <main>
	        <div class = "cards">
	          <div class = "card-single">
	            <div>
	              <h1><?php
									$sql = "SELECT * FROM employees_db_table";

									if ($result = mysqli_query($db,$sql)){
										$rowcount = mysqli_num_rows($result);
										echo $rowcount;
									}
								?></h1>
	              <span>Number of Active Users</span>
	            </div>
	            <div>
	              <span class = "las la-users"></span>
	            </div>
	          </div>

						<div class = "card-single">
	            <div>
	              <h1><?php
									$sql = "SELECT * FROM companies_db_table";

									if ($result = mysqli_query($db,$sql)){
										$rowcount = mysqli_num_rows($result);
										echo $rowcount;
									}
								?></h1>
	              <span>Number of Companies</span>
	            </div>
	            <div>
	              <span class = "las la-clipboard-list"></span>
	            </div>
	          </div>

						<div class = "card-single">
	            <div>
	              <h1>Some Text</h1>
	              <span>Companies</span>
	            </div>
	            <div>
	              <span class = "las la-clipboard-list"></span>
	            </div>
	          </div>

						<div class = "card-single">
	            <div>
	              <h1>Some Text</h1>
	              <span>Companies</span>
	            </div>
	            <div>
	              <span class = "las la-clipboard-list"></span>
	            </div>
	          </div>
	        </div>
					<div class = "recent-grid">
						<div class = "projects">
							<div class = "card">
								<div class = "card-header">
									Companies
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

							    <?php $results = mysqli_query($db, "SELECT *FROM companies_db_table"); ?>
									<table>
							      <thead>
							        <tr>
							          <th>Company Name</th>
							          <th>Email</th>
												<th>Company Logo</th>
							          <th>Website</th>
							        </tr>
							      </thead>

							      <?php while ($row = mysqli_fetch_array($results)) { ?>
							        <tr>
							          <td><?php echo $row['company_name']; ?></td>
							          <td><?php echo $row['email']; ?></td>
							          <td><?php echo $row['filename']; ?></td>
							          <td align = left><?php echo $row['website']; ?></td>
							        </tr>
							      <?php } ?>
							    </table>
								</div>
							</div>
						</div>
					</div>

					<div class = "recent-grid">
						<div class = "projects">
							<div class = "card">
								<div class = "card-header">
									Employees
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
							        </tr>
							      <?php } ?>
							    </table>
								</div>
							</div>
						</div>
					</div>
	      </main>
	    </div>
	</body>
</html>
