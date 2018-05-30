<html>
<body>
<?php
	$servername = "localhost";
    $username = "root";
    $password = "";
	$dbname = "projectmanagement";

    $con = new mysqli($servername, $username, $password, $dbname);

    if (mysqli_connect_errno($con))
    {
        echo "MySql Error: " . mysqli_connect_error();
        }
	session_start();
	if(!isset($_SESSION['Username'])){
			echo "No session detected!";
			return;
			}
	$empName = $_SESSION['empName'];
	$sql = "SELECT * FROM Tasks WHERE Employee='$empName' && Time='$_POST[DateTime]'";

    $query=mysqli_query($con,$sql);
	$result = $con->query($sql);	
	
	
   if ($result->num_rows <1 ) {
	$time = strtotime($_POST['DateTime']);
	$min = date('i', $time);
	//$days   = date("d",$time);
	if($min%60!= '0'){
		echo "Only multiples of 1 day valid!";	}
	else {
	$username = $_SESSION['Username'];
	 $sql = "INSERT INTO Tasks(User,Name,Employee, Time,TotalDay) " .
                    "VALUES('$username', '" . $_POST['Name'] . "' ,'$empName','" . $_POST['DateTime'] . "','" . $_POST['TotalDay'] . "')";
				

                if ($con->query($sql) === TRUE) {
                    echo "Record was created successfully <br />";
                    echo "<a href = 'loginSuccess.php'>Go back</a>";
                } else {
                    echo "Error updating record: " . $con->error;
                }
	}
	
} else {
    echo "The employee is not available at that time and date.";
}

    mysqli_close($con);
    ?>
</body>
</html>