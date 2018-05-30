<html>
    <body>
	   
		<?php session_start(); 
		if(!isset($_SESSION['Username'])){
			echo "No session detected!";
			return;
		} ?>
		User logged in! <br>
       <a href="createTask.php">Add a Task</a> <br>
	   <a href="editTask.php">Edit a Task</a>	<br>
	   <a href="cancelTask.php">Delete a Task</a>	<br>
	   <a href = 'logout.php'>Logout</a>  <br>
    </body>
</html>
