<?php
	require('config/config.php');
	require('config/DB.php');

	//Check submit
	 if(isset($_POST['delete'])){
	 	//Get Form data
	 	$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
	 	$username = mysqli_real_escape_string($conn, $_POST['username']);
	 	$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
	 	$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
	 
		 //Query
		 $query = "DELETE FROM users WHERE id = {$delete_id}";

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
		<h1 style="font-family: 'Impact'">USERS</h1>
			<div class="container" style="background-color: #CCCCCC; text-align: center">
				<h3>your username is: <?php echo $user['username']; ?></h3>
				<h4>User's Details: <?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></h4>
				<small>Created On <?php echo $user['created_at']; ?></small>
				<br>
				<form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<input type="hidden" name="delete_id" value="<?php echo $user['id']; ?>">
					<input type="submit" name="delete" value="Delete" class="btn btn-danger">
				</form>
				<a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Edit</a>
				<a href="<?php echo ROOT_URL; ?>index.php" class="btn btn-success">Back</a>
				<hr class="my-4"> 
			</div>
	</div>
<?php include('inc/footer.php'); ?>





