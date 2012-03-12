<?php        
session_start(); 

$dst_db = mysql_pconnect("localhost","root","letusout");                        
mysql_select_db("dst", $dst_db);      
                                                                                
$username = $_POST["username"];                                                       
$password = md5($_POST["password"]);                                                       

$user = "SELECT * FROM user_account WHERE username='$username' AND password='$password' LIMIT 1";      
$results = mysql_query($user,$dst_db);                                 
$n = mysql_num_rows($results);                                         
$r = mysql_fetch_row($results);
?>                                                                                 
<script>
<?php
if($n > 0) { 
  $_SESSION['username'] = $username;
  $_SESSION['user_id'] = $r[4];  
?>
  window.location="index.php";
<?php
}else{ ?>
  window.location="login.php";
<?php
} ?>
</script>
