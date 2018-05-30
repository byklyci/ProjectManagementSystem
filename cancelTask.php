<html>
    <head>
        <title>Cancel a task </title>
    </head>
    <body>

        <?php
			session_start();
			if(!isset($_SESSION['Username'])){
			echo "No session detected!";
			return;
			}
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "projectmanagement";
			
			$Username = $_SESSION['Username'];
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {

               die("Connection failed: " . $conn->connect_error);
            }else{

                // List records
                $sql = "SELECT * FROM Tasks WHERE User='$Username'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    ?>
                    <table border = 1>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>ProjectName</th>
                            <th>Employee</th>
                            <th>Time</th>
                            <th>TotalDay</th>
                            
                        </tr>
                    <?php

                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["ID"]; ?></td>
                            <td><?php echo $row["User"]; ?></td>
                            <td><?php echo $row["Name"]; ?></td>
                            <td><?php echo $row["Employee"]; ?></td>
                            <td><?php echo $row["Time"]; ?></td>
                            <td><?php echo $row["TotalDay"]; ?></td>
                            
                        </tr>
                        <?php
                    }

                    ?>
                    </table>
					<form form action="deleteRecord.php" method="POST">
 					 <br> Enter id of task you want to cancel: <br>
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