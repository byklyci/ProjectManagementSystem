<html>
    <head>
        <title>Project Manager Insertion</title>
    </head>
    <body>

        <?php
			session_start();
            $servername = "localhost"; 
            $username = "root";
            $password = "";
            $dbname = "projectmanagement";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
			
            // Check connectionS
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);  
            }else{

                // Insert the record
                $sql = "INSERT INTO Employees(Name, Project) " .
                    "VALUES('" . $_POST['Name'] . "', '" . $_POST['project'] . "')";
                if ($conn->query($sql) === TRUE) {
                    echo "Record was created successfully <br />";
                    echo "<a href = 'adminLogin.php'>Go back</a>"; 
                } else {
                    echo "Error employee insertion: " . $conn->error;
                }
            }
            $conn->close();
        ?>

    </body>
</html>