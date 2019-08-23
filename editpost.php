<?php
	require('config/config.php');
	require('config/DB.php');
	
	//Check submit
	 if(isset($_POST['submit'])){
	 	//Get Form data
	 	$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
	 	$username = mysqli_real_escape_string($conn, $_POST['username']);
	 	$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
	 	$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
	 
		 //Query
		 $query = "UPDATE users SET 
		           username='$username', 
		           first_name='$first_name', 
		           last_name='$last_name' 
		           WHERE id = {$update_id}";

		 if(mysqli_query($conn, $query)){
		 	header('Location: '.ROOT_URL.'');
		 } else {
		 	echo 'ERROR:'.mysqli_error($conn);
		 }
	 }

	 #Get ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	#Create Query
	$query = 'SELECT * FROM users WHERE id = '.$id;
	#Get result
	$result = mysqli_query($conn, $query);
	#Fetch data
	$user = mysqli_fetch_assoc($result);
	#Free result
	mysqli_free_result($result);
	#Close connection
	mysqli_close($conn);
?>
	<?php include('inc/header.php'); ?>
	<div class="jumbotron">
		<h1 style="font-family: 'Roboto'">Edit User</h1>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" value="<?php echo $user['username']; ?>">
			</div>
			<div class="form-group">
				<label>First Name</label>
				<input type="text" name="first_name" class="form-control" value="<?php echo $user['first_name']; ?>">
			</div>
			<div class="form-group"> 
				<label>Last Name</label>
				<input type="text" name="last_name" class="form-control" value="<?php echo $user['last_name']; ?>">
			</div>
			<input type="hidden" name="update_id" value="<?php echo $user['id']; ?>">
			<br>
			<input type="submit" name="submit" value="Edit" class="btn btn-primary">
		</form>
	</div>
<?php include('inc/footer.php'); ?>





