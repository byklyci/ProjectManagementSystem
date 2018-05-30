<html>
    <head>
        <title>List Task by branch</title>
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
            ?>
        	 <form action="listTasksResult.php" method="POST">
				<p>Project Name: </p>
				<select name="project">
					
					<?php 
						
						$sql = mysqli_query($conn, "SELECT Name FROM Projects");
						while ($row = $sql->fetch_assoc()){
							$n1 = $row['Name'];
							echo "<option value=\"$n1\">" . $row['Name'] . "</option>";
						}
						echo "<option value=\"All\">" . "List All Tasks" . "</option>";
						
			?>
				</select>
				<p><input type='submit' value='List Tasks' /></p>
			</form>

            <?php
			echo "<br><a href = 'adminLogin.php'>Go back</a>";
            }
            $conn->close();
        ?>

    </body>
</html>