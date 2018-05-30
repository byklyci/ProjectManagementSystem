<html>
    <head>
        <title>Edit a record</title>
    </head>
    <body>

        <?php
			session_start();
			if(!isset($_SESSION['Username'])){
			echo "No session detected!";
			return;
			}
			$_SESSION['EditID'] = $_POST['ID'];
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
            ?>
        	 <form action="editAction.php" method="POST">
				<select name="project">
					
					<?php 
						
						$sql = mysqli_query($conn, "SELECT Name FROM Projects");
						while ($row = $sql->fetch_assoc()){
							$n1 = $row['Name'];
							echo "<option value=\"$n1\">" . $row['Name'] . "</option>";
						}
						echo "<p><input type='submit' value='Edit Employee' /></p>";
			?>
				</select>
			</form>
			
            <?php	
			echo "<a href = 'editTask.php'>Go back</a>";
            }
            $conn->close();
        ?>

    </body>
</html>