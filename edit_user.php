<?php session_start();

$dst_db = mysql_pconnect("localhost","root","");                        
mysql_select_db("dst", $dst_db);      
 
$fname = $_POST["fname"];                                                       
$lname = $_POST["lname"];                                                       
$dob =  $_POST["dob"]; 
$profession = $_POST["job"];
$sex = $_POST["gender"]; 
$username = $_POST["username"];                                                   
$email = $_POST["email"];                                                   
$password = $_POST["pswd"];                                                   
$address = $_POST["address"];                  

$user_id = $_SESSION['user_id'];                                 


$user_role = "SELECT * FROM user_account WHERE user_id <> $user_id 
AND (email = '$email' OR username = '$username') LIMIT 1";     
$results = mysql_query($user_role,$dst_db);                                     
$n = mysql_num_rows($results);

if ($n > 0) { ?>
  <script>
    document.write("Email or username exists already");
    setTimeout("redirect();",2000);
  </script>  
<?php
  exit;
}

 
$query = "UPDATE user SET fname = '$fname' , lname = '$lname',
          dob = '$dob' , gender = '$sex' , location = '$address' 
          WHERE user_id = $user_id";     
mysql_query($query,$dst_db); 


$query = "UPDATE user_account SET email = '$email' ,
          username = '$username' WHERE user_id = $user_id";
mysql_query($query,$dst_db); 

if($password) {
  $password = md5($password);
  $query = "UPDATE user_account SET password = '$password' 
            WHERE user_id = $user_id";
  mysql_query($query,$dst_db); 
}

$_SESSION['username'] = $username;
?>
<script>
  document.write("Successfuly update details");
  setTimeout("redirect();",2000);

  function redirect() { location.href = "index.php"; }
</script>
