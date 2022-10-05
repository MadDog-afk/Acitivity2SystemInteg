<?php
    $servername = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "ite410";
   
    $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    function createUser($conn, $name1, $birthday, $username1, $password1){
        $sql = "INSERT INTO users (name, birthday, username, password) VALUES(?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: activity2.php?error=stmtfailed");
			exit();
		}

		$HashedPwd = password_hash($password1, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss",  $name1, $birthday, $username1, $HashedPwd);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		header("location: activity2table.php");
		exit();

    }
?>