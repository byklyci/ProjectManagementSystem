 <html>
    <head>
        <title>Edit from Employees</title>
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
				$sql = "UPDATE Employees SET Name = '" . $_POST['Name'] . "', Project = '" . $_POST['project'] .
                    "' WHERE ID = " . $_POST['ID'];
					if ($conn->query($sql) === TRUE) {
                    echo "Employee was updated successfully <br />";
                    echo "<a href = 'adminLogin.php'>Go back</a>";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
               
                   
                }
            
            $conn->close();
        ?> 

    </body>
</html>

