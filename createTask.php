<html>
    <head>
        <title>Add a task</title>
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

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {

                die("Connection failed: " . $conn->connect_error);
            }else{
            ?>
			Employee serving for the Project: <br><br>
        	 <form action="appAction.php" method="POST">
				<select name="project">
					
					<?php 
						
						$sql = mysqli_query($conn, "SELECT Name FROM Projects");
						while ($row = $sql->fetch_assoc()){
							$n1 = $row['Name'];
							echo "<option value=\"$n1\">" . $row['Name'] . "</option>";
						}
						echo "<p><input type='submit' value='Get Tasks' /></p>";
			?>
				</select>
			</form>
			
            <?php	
			echo "<a href = 'loginSuccess.php'>Go back</a>";
            }
            $conn->close();
        ?>

    </body>
</html>