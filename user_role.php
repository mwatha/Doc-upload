<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<script>
  function redirectLogin() {
    document.location = "login.php";
  }
  
  function redirectHome() {
    document.location = "index.php";
  }
</script>
<?php

$dst_db = mysql_pconnect("localhost","root","");                        
mysql_select_db("dst", $dst_db);

$user_id = $_SESSION['user_id'];

$user_role = "SELECT role FROM user_role WHERE user_id = $user_id LIMIT 1";      
$results = mysql_query($user_role,$dst_db);                                 
$r = mysql_fetch_row($results);
$n = mysql_num_rows($results);

if ($n > 0) {
  if ($r[0] !="admin") { ?>
    <script>
      document.write('You dont have permission to view this page.');         
      setTimeout("redirectHome();", 4000);
    </script><?php 
    exit;
  }
}else{ ?>
  <script>
    document.write('Your not logged in!');         
    setTimeout("redirectLogin();", 4000);
  </script><?php 
  exit;
}

?>


<html>

<head>

<title>Assign user role</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

body{

  padding:0;

  margin:0;

}

TD{

  COLOR:#000000;

  font-family:Verdana, Arial, Helvetica, sans-serif;

  font-size:11px;

  background-color:inherit;

}

DIV{

  padding-top:7px;

  padding-bottom:7px;

  padding-left:20px;

  padding-right:15px;

} 

A{

  COLOR:#000000;

  background-color:inherit;

  font-family:Verdana, Arial, Helvetica, sans-serif;

  font-size:10px;  

  font-weight:bold;

  text-decoration:none;

}

.main{

  height:100%;

}

.bg1{

  background-image:url(images/menu_end.gif);

}

.main-imagine{                                                                  
  background-repeat: no-repeat;                                                 
  height: 150px;                                                                
  width: 99%;                                                                   
}

.bg3{

  background-image:url(images/bg_green.gif);

  height:100%;

}

.bg4{

  background-image:url(images/bg_gray.gif);

}

.bg6{

  background-image:url(images/bg_yellow.gif);

}

.bg7{

  background-image:url(images/bg_red.gif);

}

.copy{

  font-size:9px;

  padding-top:10px;

  padding-bottom:3px;

}

.fto{

  color:#000000;

  background-color:inherit;

}

#search_form {
 float: right;
}

.header {                                                                       
  text-align: right;                                                            
}                                                                               
                                                                                
.header-form {                                                                  
  text-align: right;                                                            
  width: 97.7%;                                                                 
  background: url("images/bg_green.gif");                                       
}                                                                               
                                                                                
                                                                                
.header-a {                                                                     
  text-align: left;                                                             
  width: 97%;                                                                   
}                                                                               
                                                                                
.header-a span {                                                                
  float: right;                                                                 
  background-color: inherit;                                                    
  color: #000000;                                                               
  font-family: Verdana,Arial,Helvetica,sans-serif;                              
  font-size: 10px;                                                              
  font-weight: bold;                                                            
  text-decoration: none;                                                        
}                                                                               
                                                                                
.header-form span {                                                             
  background-color: inherit;                                                    
  color: #000000;                                                               
  font-family: Verdana,Arial,Helvetica,sans-serif;                              
  font-size: 10px;                                                              
  font-weight: bold;                                                            
  text-decoration: none;                                                        
} 
</style>

</head>



<body>

<table cellpadding=0 cellspacing=0 border=0 width="100%" class="main">

<tr><td>

<table cellpadding=0 cellspacing=0 border=0 width="100%">

  <tr>
     <div class="header">                                                        
      <div class="header-a">                                                    
        <a href="index.php">Home</a>|&nbsp;&nbsp;                               
        <a href="document.php">Add document</a>|&nbsp;&nbsp;                    
        <a href="scholarships.php">Scholarships</a>|&nbsp;&nbsp;                    
        <a href="grants.php">Grant application</a>|&nbsp;&nbsp;                
        <a href="policies.php">Policies</a>|&nbsp;&nbsp;                
        <a href="report.php">Report</a>|&nbsp;&nbsp;                               
        <a href="my_account.php">My account</a>|&nbsp;&nbsp;                            
        <a href="user_role.php">Assign user roles</a>|&nbsp;&nbsp;
        <span><a href="signout.php">Sign out</a></span>&nbsp;&nbsp;             
        <span style="margin-right:40px;">Welcome:                              
          <font style="color:orangeRed;">&nbsp;<?php echo $_SESSION['username'] ?></font>
        </span>                                                                 
      </div>                                                                    
      <div class="header-form">                                                 
        <form id="search_form" method="post" action="index.php">                
          <span>Search:</span>&nbsp;&nbsp;                                      
          <input type="text" size="12" name="search_string" />                  
        </form>                                                                 
      </div>                                                                    
    </div>
    
  </tr> 

  <tr>

    <td valign=top colspan=8><img src="images/malawi.jpg" border=0 alt=""></td>

    <td width="100%" class="bg2"><img src="images/lilongwe.png" class="main-imagine"/></td>

  </tr>

</table>  

</td></tr>  

<tr><td class="main">

<table cellpadding=0 cellspacing=0 border=0 width="100%" class="main">

  <tr>

    <td valign=top class="bg3">

      <div><b>Malawi Government</b><br><br>
        The Government of Malawi established the Department of Science and Technology in the Ministry of Education Science and Technology in 2009. The department is operating in a dynamic environment; politically, economically, socially, technologically, legally and environmentally. The department is expected to play a major role in facilitating innovative competitiveness and production of high quality products for accelerated economic growth through the formulation and review of science, technology and innovation policies and fostering international cooperation in science and technology.
      </div>
    </td>
    <td valign="top" class="bg4" colspan="2">
      <div>
          
          <form action="assign_role.php" method="post" enctype="multipart/form-data" >

          <table>
          <tr>
          <td>
            <label for="Title">Select username:</label>
          </td>
          <td>
            <select name="user_id"> 
            <?php
              $query = "SELECT user_id,username FROM user_account;";      
              $results = mysql_query($query,$dst_db);                                 
              $n = mysql_num_rows($results);

              if($n > 0) { ?>
                <option value=""></option> 
              <?php for($i = 0; $i < $n; $i++) {
                $r = mysql_fetch_row($results);
             ?>
                <option value="<?php echo $r[0]; ?>"><?php echo $r[1]; ?></option> 
              <?php 
                }
              }
             ?>
          </td>
        </tr>
         <tr>
          <td>
            <label for="Title">Select user role:</label>
          </td>
          <td>
            <select name="select_user_role">
              <option value=""></option> 
              <option value="guest">Guest</option> 
              <option value="admin">Administrator</option> 
              <option value="staff">Staff</option> 
            </select>
          </td>
         </tr>
         <tr>
          <td colspan="2">
            &nbsp;
          </td>
         </tr>
         <tr>
          <td colspan="2">
            <input type="submit" name="Submit" id="Submit" value="Assign" />
          </td>
         </tr>
        </table>
        </select>
    </form>

      </div>
    </td>
  </tr>
  <tr>
    <td class="bg6" ALIGN="CENTER" COLSPAN="2">
      <div>
      
      </div>
    </td>
    <td class="bg6" width="100%">&nbsp;</td>
  </tr>
  <tr>
    <td class="bg7" ALIGN=CENTER nowrap COLSPAN=2>
      <div class="copy">Copyright &copy; 2012 Department of Science and Technology All Rights Reserved.</div>
    </td>
    <td class="bg7" width="100%">&nbsp;</td>  
  </tr> 
</table>

</td></tr>  

</table>

</body>

</html>


