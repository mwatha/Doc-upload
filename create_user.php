<?php session_start(); ?>

<script>

  function successfullLogin() {
    location.href = "index.php";
  }
  
  function redirect() {
    history.go(-1);
  }
</script>

<?php

$dst_db = mysql_pconnect("localhost","root","letusout");                        
mysql_select_db("dst", $dst_db);      
 
$fname = $_POST["fname"];                                                       
$lname = $_POST["lname"];                                                       
$dob = $_POST["dob"]; 
$role = "Guest";                                                   
$sex = "Female"; 
$username = $_POST["username"];                                                   
$email = $_POST["email"];                                                   
$password = $_POST["pswd"];                                                   
$address = $_POST["address"];                                                   


$query = "SELECT * FROM user_account WHERE email = '$email'";                      
$results = mysql_query($query,$dst_db);                                     
$users = mysql_num_rows($results);                                                  
                                                                                
if ($users > 0) { ?>                                                                
  <script>                                                                      
    document.write("<?php echo $email ?>  exists already");                         
    setTimeout("redirect();",4000);                                             
  </script>                                                                     
<?php                                                                           
  exit;                                                                         
}


$query = "SELECT * FROM user_account WHERE username = '$username'";                      
$results = mysql_query($query,$dst_db);                                     
$users = mysql_num_rows($results);                                                  
                                                                                
if ($users > 0) { ?>                                                                
  <script>                                                                      
    document.write("Username: <?php echo $username ?>  exists already");                         
    setTimeout("redirect();",4000);                                             
  </script>                                                                     
<?php                                                                           
  exit;                                                                         
}


 
$user_query = "INSERT INTO user VALUES(NULL,'$fname','$lname','$dob','$sex','$address')";                                     
mysql_query($user_query,$dst_db); 


$user_id_query = "SELECT user_id FROM user ORDER BY user_id DESC LIMIT 1";
$results = mysql_query($user_id_query,$dst_db); 
$r = mysql_fetch_row($results);

$password = md5($password);
                                                                                
$account_query = "INSERT INTO user_account VALUES(NULL,'$username','$password','$email',$r[0])";                                     
mysql_query($account_query,$dst_db);

$user_query = "INSERT INTO user_role VALUES($r[0],'guest')";                                     
mysql_query($user_query,$dst_db); 


$_SESSION['username'] = $username;                                            
$_SESSION['user_id'] = $r[0]; 

?>

<script>
  successfullLogin();
</script>
