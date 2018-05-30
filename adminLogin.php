<html>
    <body>
	   
		<?php session_start(); 
		if(!isset($_SESSION['AdminUsername'])){
			echo "No session detected!";
			return;
		} ?>
		Admin logged in! <br>
	   <a href="addPmanager.php">Add a Project Manager</a>	<br>
	   <a href="editPmanager.php">Edit a Project Manager</a>	<br>
	   <a href="deletePmanager.php">Delete a Project Manager</a>	<br>
	   <a href="createProject.php">Add a Project</a>	<br>
	   <a href="editProject.php">Edit a Project</a>	<br>
	   <a href="deleteProject.php">Delete a Project</a>	<br>
       <a href="addEmployee.php">Add an Employee</a> <br>
	   <a href="editEmployee.php">Edit an Employee</a>	<br>
	   <a href="removeEmployee.php">Delete an Employee</a>	<br>
	   <a href="listTasks.php">List Tasks</a>	<br>
	   <a href = 'logout.php'>Logout</a>  <br>
    </body>
</html>
