<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity 2</title>
</head>
<body>
    <form action ="#" method="POST">
        <label for="name">Name</label>
	    <input type="text" name="name" placeholder="Enter Name"/ required>
        <label for="birthday">Birthday</label>
		<input type="text" id="birthday" name="birthday" placeholder="YYYY/MM/DD"/ required>
        <label for="username">Username</label>
	    <input type="text" name="username" placeholder="Enter Username"/ required>
        <label for="password">Password</label>
		<input type="password" name="password" placeholder="Enter Password"/ required>
        <button type="submit" id="button" name="signin">Sign Up</button>
    </form>

    <?php
    $name1 = '';
    $username1 = '';
    $password1 = '';
    require_once 'activity2dir.php';
    if(isset($_POST["signin"])){
        $birthday = $_POST["birthday"];
        $name = $_POST["name"];
        if (preg_match('~[0-9]+~', $name)) {
           echo 'Error Name has Number/s';
           exit();
        }
        else{
            $name1 = $name;
        }
        $username = $_POST["username"];
        if(strlen($username) == 8){
            if((preg_match("/[0-9]+/", $username) == TRUE)&&(preg_match("/[a-z]+/", $username) ==TRUE)){
            $username1 = $username;
            }
            else {
                echo 'Error Username has no Number/s or no Character/s ';
                exit();
            }
        }
        else{
            echo 'Error Username should be 8 characters';
            exit();
        }
        $password = $_POST["password"];
        if((strlen($password) >= 8)&&(strlen($password) <=16 )){
            if((preg_match("/[A-Z]+/", $password) == TRUE)&& (preg_match("/[a-z]+/", $password) == TRUE) && (preg_match("/[0-9]+/", $password) == TRUE)){
                $password1 = $password;
                
                }
                else {
                    echo 'Error Password has no Number/s or no Capital Character/s ';
                    exit();
                }
        }
        else{
            echo 'Error Password should be 8 to 16 characters';
            exit();
        }
        if (($name1 !='') && ($username1 !='') && ($password1 !='') ) {
            createUser($conn, $name1, $birthday, $username1, $password1);
        }
        else{
            echo "Error";
        }
    }
    ?>
</body>
</html>