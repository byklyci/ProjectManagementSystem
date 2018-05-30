<html>
    <head>
        <title>Delete project manager</title>
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

                // List records
                $sql = "SELECT * FROM Users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    ?>
                    <table border = 1>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Password</th>
                        </tr>
                    <?php

                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["ID"]; ?></td>
                            <td><?php echo $row["Username"]; ?></td>
                            <td><?php echo $row["Name"]; ?></td>
                            <td><?php echo $row["Password"]; ?></td>
                        </tr>
                        <?php
                    }

                    ?>
                    </table>
					<form form action="removePmanagerResult.php" method="POST">
 					 <br> Enter id of the project manager you want to delete: <br>
 				 		<input type="text" name="ID"><br>	
						<p><input type="submit" /></p>
					</form>
                    <?php
                } else {
                    echo "0 results";
                }
            }
            $conn->close();
        ?>

    </body>
</html>