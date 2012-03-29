<?php session_start();

echo '$user_id';
exit;

$dst_db = mysql_pconnect("localhost","root","letusout");                        
mysql_select_db("dst", $dst_db);      
 
$fname = $_POST["fname"];                                                       
$lname = $_POST["lname"];                                                       
$dob =  $_POST["dob"]; 
$profession = $_POST["job"]
$sex = $_POST["gender"]; 
$username = $_POST["username"];                                                   
$email = $_POST["email"];                                                   
$password = $_POST["pswd"];                                                   
$address = $_POST["address"];                  

$user_id = $_SESSION['user_id'];                                 
 
$query = "UPDATE user SET fname = '$fname' AND lname = '$lname'
          AND dob = '$dob' AND gender = '$sex' AND location = '$address' 
          WHERE user_id = $user_id";     


mysql_query($query,$dst_db); 


$query = "UPDATE user_account SET email = '$email' 
          AND username = '$username' WERE user_id = $user_id";
mysql_query($query,$dst_db); 

if($password) {
  $password = md5($password);
  $query = "UPDATE user_account SET password = '$password' 
            WHERE user_id = $user_id";
  mysql_query($query,$dst_db); 
}

?>
<script>
  document.write("Successfuly update details");
  setTimeout("redirect();",2000);

  function redirect() { location.href = "index.php"; }
</script>
