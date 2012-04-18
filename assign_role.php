<?php

$dst_db = mysql_pconnect("localhost","root","");                        
mysql_select_db("dst", $dst_db);      
 
$user_id = $_POST["user_id"];                                                   
$select_user_role = $_POST["select_user_role"];                                                   
 
$query = "UPDATE user_role SET role = '$select_user_role' WHERE user_id = $user_id;";                                     
mysql_query($query,$dst_db); 

?>
<script>
  location.href = "index.php";
</script>
