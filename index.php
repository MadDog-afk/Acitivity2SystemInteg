<!DOCTYPE html>
<html lang="en">
<head>
       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
   
       <!-- Bootstrap CSS -->
       <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
             integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" rel="stylesheet">
    <title>Activity 2</title>
</head>
<body>
    <div class="container"
        <form action ="#" method="POST">
            <div class="form-group">
            <label for="name">Name</label>
	        <input class="form-control" type="text" name="name" placeholder="Enter Name"/ required>
            </div>
            <div class="form-group">
            <label for="birthday">Birthday</label>
	    	<input class="form-control" type="date" id="birthday" name="birthday" placeholder="YYYY/MM/DD"/ required>
            </div>
            <div class="form-group">
            <label for="username">Username</label>
	        <input class="form-control" type="text" name="username" placeholder="Enter Username"/ required>
            </div>
            <div class="form-group">
            <label for="password">Password</label>
	    	<input class="form-control" type="password" name="password" placeholder="Enter Password"/ required>
            </div>
            <button type="submit" id="button" class="btn btn-primary" name="signin">Sign Up</button>
        </form>
    </div>

    <?php
    $name1 = '';
    $username1 = '';
    $password1 = '';

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
    <script crossorigin="anonymous" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>