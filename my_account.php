<?php session_start(); ?>

<script>                                                                        
  function redirectLogin() {                                                    
    document.location = "login.php";                                            
  }                                                                             
                                                                                
  function redirectHome() {                                                     
    document.location = "index.php";                                            
  }                                                                             
</script>                                                                       
<?php                                                                           
                                                                                
                                                                                
$dst_db = mysql_pconnect("localhost","root","letusout");                        
mysql_select_db("dst", $dst_db);                                                
                                                                                
                                                                                
if($_SESSION['user_id'] == null) { ?>                                           
  <script>redirectLogin();</script><?php                                        
}else{                                                                          
  $user_id = $_SESSION['user_id'];                                              
  $query = "SELECT username,email,fname,lname,gender,dob,
            location FROM user u 
            INNER JOIN user_account a 
            ON u.user_id = a.user_id AND u.user_id = $user_id";

  $results = mysql_query($query,$dst_db);                                     
  $r = mysql_fetch_row($results);                                                 
}

?>

<html>

<head>

<title>Edit user details</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link rel="stylesheet" type="text/css" media="all" href="javascript/jsdatepick-calendar/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="javascript/jsdatepick-calendar/jsDatePick.min.1.3.js"></script>
                                                                                
<script type="text/javascript">

 window.onload = function(){                                                   
    new JsDatePick({                                                            
      useMode:2,                                                                
      target:"dob",                                                        
      dateFormat:"%Y-%m-%d"                                                     
    });                                                                         
  }; 
</script>


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
        <a href="#">Grant application</a>|&nbsp;&nbsp;                          
        <a href="policies.php">Policies</a>|&nbsp;&nbsp;                        
        <a href="report.php">Report</a>|&nbsp;&nbsp;                                     
        <a href="my_account.php">My account</a>|&nbsp;&nbsp;                    
        <a href="user_role.php">Assign user roles</a>|&nbsp;&nbsp;              
        <span><a href="signout.php">Sign out</a></span>&nbsp;&nbsp;             
        <span style="margin-right:40px;">Login as:                              
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
    <!-- td valign=top><a href=""><img src="images/menu1.gif" border=0 alt=""></a></td>

    <td valign=top><a href=""><img src="images/menu2.gif" border=0 alt=""></a></td>

    <td valign=top><a href=""><img src="images/menu3.gif" border=0 alt=""></a></td>

    <td valign=top><a href=""><img src="images/menu4.gif" border=0 alt=""></a></td>

    <td valign=top><a href=""><img src="images/menu5.gif" border=0 alt=""></a></td>

    <td valign=top><a href=""><img src="images/menu6.gif" border=0 alt=""></a></td>

    <td valign=top><img src="images/menu_end.gif" border=0 alt=""><div style="position:absolute;top:1px;left:1px;height:0px;width:0px;overflow:hidden"><h1><a href="http://www.webdesign.org">web design</a></h1><h1><a href="http://www.freetemplatesonline.com/">free web templates</a></h1><h1><a href="http://www.websitetemplates.org/">website templates</a></h1></div></td>

    <td width="100%" class="bg1">&nbsp;</td -->

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

    <td valign=top class="bg3"><!--img src="images/news.gif" border=0 alt=""-->

      <div><b>Malawi Government</b><br><br>
        The Government of Malawi established the Department of Science and Technology in the Ministry of Education Science and Technology in 2009. The department is operating in a dynamic environment; politically, economically, socially, technologically, legally and environmentally. The department is expected to play a major role in facilitating innovative competitiveness and production of high quality products for accelerated economic growth through the formulation and review of science, technology and innovation policies and fostering international cooperation in science and technology.
      </div>
    </td>
    <td valign="top" class="bg4" colspan="2"><!--img src="images/company_text.gif" border=0 alt=""><br-->
      <div>

      <form action="edit_user.php" method="post">

  
      <table>
      <caption>Edit account:</caption>
      <tr>
        <td><label for="Username">Username:</label></td>
        <td><input type="text" name="username" id="username" value="<?php echo $r[0]; ?>" /></td>
      </tr>
      <tr>
        <td><label for="Name">First name:</label></td>
        <td><input type="text" name="fname" id="fname" value="<?php echo $r[2]; ?>" /></td>
      </tr>
      <tr>
        <td><label for="Name">Last name:</label></td>
        <td><input type="text" name="lname" id="lname" value="<?php echo $r[3]; ?>" /></td>
      </tr>
      <tr>
        <td>Birthdate:</td>
        <td><input type="text" name="dob" id="dob" size="10" value="<?php echo $r[5]; ?>" /></td>
     </tr>
     <!--tr>
      <td>Profession:</td> 
      <td><input type="text" name="job" id="job" /></td>
     </tr-->
      <tr>
        <td><label for="Email">Email address:</label></td>
        <td><input type="text" name="email" id="email" value="<?php echo $r[1]; ?>" /></td>
      </tr>
      <tr>
        <td><label for="Email">Address:</label></td>
        <td><textarea name="address" id="address"  cols="30" rows="3"><?php echo $r[6]; ?></textarea></td>
      </tr>
      <tr>
        <td><label for="Pswd">Enter Password:</label></td>
        <td><input type="password" name="pswd" id="pswd" /></td>
      </tr>
      <tr>
        <td><label for="Confirm">Confirm Password:</label></td>
        <td><input type="password" name="confirm" id="confirm" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td style="text-align:right">
        <input type="submit" name="submit" id="submit" value="Submit" />&nbsp;
        <input type="button" name="cancel" id="cancel" value="Cancel" onclick="javascript:location='index.php'" /></td>
      </tr>
      </table>

      </form>


      </div>
    </td>
  </tr>
  <tr>
    <td class="bg6" ALIGN="CENTER" COLSPAN="2">
      <div>
      <!--a href="">HOME</a>&nbsp;&nbsp;
      <a href="">ABOUT US</a>&nbsp;&nbsp;
      <a href="">SERVICES</a>&nbsp;&nbsp;
      <a href="">SUPPORT</a>&nbsp;&nbsp;
      <a href="">ABOUT SITE</a>&nbsp;&nbsp;
      <a href="">CONTACT US</a-->
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


