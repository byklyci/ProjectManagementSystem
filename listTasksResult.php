<html>
    <head>
        <title>List all tasks</title>
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
				if($_POST['project'] == 'All'){
					$sql = "SELECT * FROM Tasks";
                $result = $conn->query($sql);
				
                if ($result->num_rows > 0) {
					echo "Past Tasks";
                    ?>
                    <table border = 1>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Employee</th>
                            <th>Time</th>
                            
                        </tr>
                    <?php

                    // output data of each row
					
					$current_date = new DateTime();
                    while($row = $result->fetch_assoc()) {
						$app_date = new DateTime($row["Time"]);
						if($app_date>$current_date){
							continue;
						}
                        ?>
                        <tr>
                            <td><?php echo $row["ID"]; ?></td>
                            <td><?php echo $row["User"]; ?></td>
                            <td><?php echo $row["Employee"]; ?></td>
                            <td><?php echo $row["Time"]; ?></td>
                            
                        </tr>
                        <?php
                    }

                    ?>
                    </table>
                    <?php
                } else {
                    echo "0 results";
                }
				$result = $conn->query($sql);
				echo "Future Tasks";
                if ($result->num_rows > 0) {
                    ?>
                    <table border = 1>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Employee</th>
                            <th>Time</th>
                            
                        </tr>
                    <?php

                    // output data of each row
					
					$current_date = new DateTime();
                    while($row = $result->fetch_assoc()) {
						$app_date = new DateTime($row["Time"]);
						if($app_date<$current_date){
							continue;
						}
                        ?>
                        <tr>
                            <td><?php echo $row["ID"]; ?></td>
                            <td><?php echo $row["User"]; ?></td>
                            <td><?php echo $row["Employee"]; ?></td>
                            <td><?php echo $row["Time"]; ?></td>
                            
                        </tr>
                        <?php
                    }

                    ?>
                    </table>
                    <?php
                } else {
                    echo "0 results";
                }
				}
				else{
                $sql = "SELECT * FROM Employees WHERE Project='$_POST[project]'";
                $result = $conn->query($sql);
				if ($result->num_rows > 0) {
					 while($row = $result->fetch_assoc()) {
						$empName = $row["Name"];

				$sql = "SELECT * FROM Tasks WHERE Employee='$empName'";
                $result = $conn->query($sql);
				
				
                if ($result->num_rows > 0) {
				echo "Past Tasks";
                    ?>
                    <table border = 1>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Employee</th>
                            <th>Time</th>
                    
                        </tr>
                    <?php

                    // output data of each row
					
					$current_date = new DateTime();
                    while($row = $result->fetch_assoc()) {
						$app_date = new DateTime($row["Time"]);
						if($app_date>$current_date){
							continue;
						}
                        ?>
                        <tr>
                            <td><?php echo $row["ID"]; ?></td>
                            <td><?php echo $row["User"]; ?></td>
                            <td><?php echo $row["Employee"]; ?></td>
                            <td><?php echo $row["Time"]; ?></td>
                            
                        </tr>
                        <?php
                    }

                    ?>
                    </table>
                    <?php
                } else {
                    echo "0 results";
                }
				}
			}
				else{
					echo "0 results";
				}
			}
				echo "<br><a href = 'adminLogin.php'>Go back</a>";
            }
            $conn->close();
        ?>

    </body>
</html>