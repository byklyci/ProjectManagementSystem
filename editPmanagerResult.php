 <html>
    <head>
        <title>Edit project</title>
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
				$sql = "UPDATE Users SET Name = '" . $_POST['Name'] . "', Password = '" . $_POST['Password'] . "' WHERE ID = " . $_POST['ID'];
					if ($conn->query($sql) === TRUE) {
                    echo "Project manager was updated successfully <br />";
                    echo "<a href = 'adminLogin.php'>Go back</a>";
                } else {
                    echo "Error updating project: " . $conn->error;
                }
               
                   
                }
            
            $conn->close();
        ?>

    </body>
</html>

