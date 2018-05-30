<html>
    <head>
        <title>Project Insertion</title>
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

                // Insert the record
               $sql = "INSERT INTO Projects(Name, Pmanager,StartDate,TotalTaskDay) " .
                    "VALUES('" . $_POST['Name'] . "', '" . $_POST['project'] . "','" . $_POST['StartDate'] . "','" . $_POST['TotalTaskDay'] . "')";
                if ($conn->query($sql) === TRUE) {
                    echo "Project was created successfully <br />";
                    echo "<a href = 'adminLogin.php'>Go back</a>";
                } else {
                    echo "Error creating Project: " . $conn->error;
                }
            }
            $conn->close();
        ?>

    </body>
</html>