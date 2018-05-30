<html>
    <head>
        <title>Add employee to system</title>
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
        	 <form action="employeeAction.php" method="POST">
				<p>Employee Name: <input type="text" name="Name" /></p>
				<select name="project">
					
					<?php 
						
					$sql = mysqli_query($conn, "SELECT Name FROM Projects");
						while ($row = $sql->fetch_assoc()){
							$n1 = $row['Name'];
							echo "<option value=\"$n1\">" . $row['Name'] . "</option>";
						}
						echo "<p><input type='submit' value='Add Employee' /></p>";
			?>
				</select>
			</form>

            <?php
            }
            $conn->close();
        ?>

    </body>
</html>