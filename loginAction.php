

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "projectmanagement";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  // Connection Successfull
  else{

    $username = $_POST["Username"];
    $preventvar = $_POST["Password"];
    $password = $_POST["Password"];

    $squer2 = "SELECT * FROM Admins WHERE Username = '" . $username . "' AND PASSWORD = ? " ;
    $squer1 = "SELECT * FROM Users WHERE Username = '" . $username . "' AND PASSWORD = '" . $password . "' ";


    // SQL Injection prevention
    $cond2 = $conn->prepare($squer2);
    $cond2->bind_param("s", $preventvar);
    $cond2->execute();



    $rsl2 = $cond2->get_result();
    $rsl1 = $conn->query($squer1);


//Coming from the login.php and check if 1 or 2 for user and admin

/*
 <form action="loginAction.php" method="POST">
         <p>Your username: <input type="text" name="Username" /></p>
         <p>Your password: <input type="password" name="Password" /></p>
         <select name="type">
             <option value="1">User</option>
             <option value="2">Admin</option>
         </select>
         <p><input type="submit" /></p>
        </form>

*/
  
    if ($rsl2->num_rows > 0) {
      while( $row2 = $rsl2->fetch_assoc() ){
        session_start();
        $_SESSION['AdminUsername'] = $_POST['Username'];
        $_SESSION['AdminPassword'] = $_POST['Password'];
        header("location: adminLogin.php");
        die();
      }
    }
    
    else if ($rsl1->num_rows > 0){
      while( $row1 = $rsl1->fetch_assoc() ){
        session_start();
         $_SESSION['Username'] = $_POST['Username'];
        $_SESSION['Password'] = $_POST['Password'];
        header("location: loginSuccess.php");
        die();
      }
    }

    else{
      $conn->close();
      die("Inva username or password");
    }
  }

?>