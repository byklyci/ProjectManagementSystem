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
	if($min%30 != '0'){
		echo "Only multiples of 30 minutes are valid!";	}
	else {
	$editID = $_SESSION['EditID'];
	$empName = $_SESSION['empName'];

                // Update the record
                $sql = "UPDATE Tasks SET Employee ='$empName' , Time = '" . $_POST['DateTime'] . "' WHERE ID = " .$editID;
//'" . $_POST['empName'] . "' it cant work here 
                if ($con->query($sql) === TRUE) {
                    echo "Record was updated successfully <br />";
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
