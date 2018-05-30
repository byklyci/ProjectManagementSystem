<?php

session_start();
session_destroy();

	header("Location:http://localhost:2145/login.php");
?>