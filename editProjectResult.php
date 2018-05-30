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
                $sql = "UPDATE Projects SET Name = '" . $_POST['Name'] . "', Pmanager = '" . $_POST['project'] .
                    "', StartDate= '" . $_POST['StartDate'] . "', TotalTaskDay= '" . $_POST['TotalTaskDay'] . "' WHERE ID = " . $_POST['ID'];
					if ($conn->query($sql) === TRUE) {
                    echo "Project was updated successfully <br />";
                    echo "<a href = 'adminLogin.php'>Go back</a>";
                } else {
                    echo "Error updating project: " . $conn->error;
                }
               
                   
                }
            
            $conn->close();
        ?>

    </body>
</html>

 