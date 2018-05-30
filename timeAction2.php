<html>
<body>
<?php
	$servername = "localhost";
    $username = "root";
    $password = "";
	$dbname = "projectmanagement";

    $con = new mysqli($servername, $username, $password, $dbname);
	session_start();
	if(!isset($_SESSION['Username'])){
			echo "No session detected!";
			return;
			}
    if (mysqli_connect_errno($con))
    {
        echo "MySql Error: " . mysqli_connect_error();
        }
	$radioVal = $_POST["employee"];
	
	$_SESSION['empName'] = $radioVal;
	echo "You have choosen employee : " . $radioVal . "<br><br>";
	echo "Enter task date and time : <br><br>";
	?>
	<form action="checkResult2.php" method="POST">
  		<input type="datetime-local" name="DateTime">
  		<input type="submit" value="Enter">
	</form>
	<?php
	echo "<a href = 'editTask.php'>Go back</a>";
    mysqli_close($con);
    ?>
</body>
</html>