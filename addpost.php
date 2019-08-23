<?php
	require('config/config.php');
	require('config/DB.php');
	
	//Check submit
	 if(isset($_POST['submit'])){
	 	//Get Form data
	 	$username = mysqli_real_escape_string($conn, $_POST['username']);
	 	$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
	 	$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
	 
		 //Query
		 $query = "INSERT INTO users(username, first_name, last_name) VALUES('$username', '$first_name', '$last_name')";

		 if(mysqli_query($conn, $query)){
		 	header('Location: '.ROOT_URL.'');
		 } else {
		 	echo 'ERROR:'.mysqli_error($conn);
		 }
	 }
?>
	<?php include('inc/header.php'); ?>
	<div class="jumbotron">
		<h1 style="font-family: 'Roboto'">Add User</h1>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label>First Name</label>
				<input type="text" name="first_name" class="form-control">
			</div>
			<div class="form-group"> 
				<label>Last Name</label>
				<input type="text" name="last_name" class="form-control">
			</div>
			<br>
			<input type="submit" name="submit" value="Add User" class="btn btn-primary">
		</form>
	</div>
<?php include('inc/footer.php'); ?>





