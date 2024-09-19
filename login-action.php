<?php
if (!isset($_POST['do_login'])) {
    header('location:login.php');
}

require "connection.php";

// Retrieve user inputs
$username = isset($_POST['username'])?$_POST["username"]:'';
$password = isset($_POST['password'])?$_POST["password"]:'';


$login_query = 'SELECT * from users where username=? AND password=?';
$statement = $conn->prepare($login_query);
$statement->bind_param('ss', $username, $password);
$statement->execute();

if ($statement->error){echo "something has gone wrong";} 

$result = $statement->get_result();


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["ID"]. " - Name: " . $row["username"]. " " ." - Email: ". $row["email"]. "<br>";
    // // Check if the provided username and password match the correct credentials
    if ($username === $row["username"] && $password === $row["password"]) {
        // Redirect to a successful login page or perform any other actions here
           header('location:logedin.php');
           echo "Login successful!";
        }
    }
} else {
  echo "0 results";
}
$conn->close();
?>