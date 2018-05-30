 <html>
    <head>
        <title>Remove from Employees</title>
    </head>
    <body>

        <?php
			session_start();
			if(!isset($_SESSION['AdminUsername'])){
			echo "No session detected!";
			return;
			} 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "projectmanagement";
			
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {

               die("Connection failed: " . $conn->connect_error);
            }else{
				$sql = "DELETE FROM Employees WHERE Name = '" . $_POST['Name'] ."'";
				$sql2 = "DELETE FROM Tasks WHERE Employee = '" . $_POST['Name'] ."'";
					if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
                    echo "Employee was removed successfully <br />";
                    echo "<a href = 'adminLogin.php'>Go back</a>";
                } else {
                    echo "Error removing employee: " . $conn->error;
                }
               
                   
                }
            
            $conn->close();
        ?>

    </body>
</html>

