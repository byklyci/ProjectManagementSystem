<html>
    <head>
        <title>Add Project to system</title>
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
        	 <form action="createProjectResult.php" method="POST">
				<p>Project Name: <input type="text" name="Name" /></p>
                <p>Start Date: <input type="Date" name="StartDate" /></p>
                <p>Total Task Date: <input type="text" name="TotalTaskDay" /></p>

                <select name="project">
                <?php 
                        
                    $sql = mysqli_query($conn, "SELECT Username FROM Users");
                        while ($row = $sql->fetch_assoc()){
                            $n1 = $row['Username'];
                            echo "<option value=\"$n1\">" . $row['Username'] . "</option>";
                        }
                        echo "<p><input type='submit' value='Add Project' /></p>";
            ?>
                </select>
			</form>

            <?php
            }
            $conn->close();
        ?>

    </body>
</html>