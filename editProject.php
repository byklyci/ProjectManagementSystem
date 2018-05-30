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

                // List records
                $sql = "SELECT * FROM Projects";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    ?>
                    <table border = 1>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Pmanager</th>
                            <th>StartDate</th>
                            <th>TotalTaskDay</th>
                        </tr>
                    <?php

                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["ID"]; ?></td>
                            <td><?php echo $row["Name"]; ?></td>
                            <td><?php echo $row["Pmanager"]; ?></td>
                            <td><?php echo $row["StartDate"]; ?></td>
                            <td><?php echo $row["TotalTaskDay"]; ?></td>
                        </tr>
                        <?php
                    }

                    ?>
                    </table>
					<form form action="editProjectResult.php" method="POST">
 					 <br> Enter id of the project you want to edit: <br>
 				 		<input type="text" name="ID"><br>
					<br> Enter new name of the project you want to edit: <br>
 				 		<input type="text" name="Name"><br>	
                    <br> Enter new start date you want to edit: <br>
                        <input type="Date" name="StartDate"><br>
                    <br> Enter new total task day you want to edit: <br>
                        <input type="text" name="TotalTaskDay"><br>    
                    <br> Choose new project manager for the project you want to edit: <br>
                        <select name="project">	
					
                    <?php 
                        
                        $sql = mysqli_query($conn, "SELECT Username FROM Users");
                        while ($row = $sql->fetch_assoc()){
                            $n1 = $row['Username'];
                            echo "<option value=\"$n1\">" . $row['Username'] . "</option>";
                        }
                        echo "<p><input type='submit' value='Edit Project' /></p>";
            ?> 
                </select>
                    
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