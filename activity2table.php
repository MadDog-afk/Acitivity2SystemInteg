<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 require_once 'activity2dir.php';
 $sql = "SELECT user_no, name,  birthday, username FROM users";
 $results = mysqli_query($conn, $sql);

if ($results) {
  $row = mysqli_num_rows($results);
  echo "<table border='1'>
  <tr>
  <th>User no.</th>
  <th>Name</th>
  <th>Birthday</th>
  <th>Username</th>
  </tr>";
    while ($row = mysqli_fetch_array($results)) {
      echo "<tr>";
      echo "<td>" . $row['user_no'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['birthday'] . "</td>";
      echo "<td>" . $row['username'] . "</td>";
      echo "</tr>";
      //echo "USER ID: ". $row["user_no"]." -Name: ". $row["name"]. " Birthday: " . $row["name"]." Age: ". $row["age"]. "<br>";
    }
    echo "</table>";
  }
  else{
    echo "failed";
  }


?>
</body>
</html>