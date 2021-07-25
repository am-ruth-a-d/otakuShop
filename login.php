
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="otakushop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else 

echo "Connected<br><br>";


if(isset($_POST['name']))
{
$nme=$_POST['name'];
$pswd=$_POST['password'];

if($nme!="" && $pswd!="")
{
$sql = "INSERT INTO login (username, password)
VALUES ('$nme','$pswd')";
$sql2 ="SELECT username,password FROM admin WHERE username=$nme AND password=$pswd";
//$arr=mysqli_fetch_row($conn->query($sql2));

if((($nme=="Amrutha") || ($nme=="Aditya")) && $pswd=="webdev")
  {
  	echo "YOURE AN ADMIN";
 	header('location:http://localhost/otakuShop/admin_login.html');
	die;
  }

  
if ($conn->query($sql) === TRUE) {

  echo "New record created successfully";

  header('location:http://localhost/otakuShop/index.html');
	die;
  
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



}

else 
echo "Username or Password missing.";

}
$conn->close();
?>
