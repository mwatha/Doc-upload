<?php session_start();                                                                
header('Content-type', 'application/x-force-download');                                        
?>
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
                                                                                

if($_SESSION['user_id'] == null) { ?>
  <script>redirectLogin();</script><?php
}else{
  $user_id = $_SESSION['user_id'];                                                
}

$user_role = "SELECT role FROM user_role WHERE user_id = $user_id LIMIT 1";     
$results = mysql_query($user_role,$dst_db);                                     
$r = mysql_fetch_row($results);                                                 
$n = mysql_num_rows($results);                                                  
                                                                                
if ($n > 0) {                                                                   
  if ($r[0] !="admin") { 
  }                                                                             
}else{ ?>                                                                       
  <script>                                                                      
    document.write('Your not logged in!');                                      
    setTimeout("redirectLogin();", 4000);                                       
  </script><?php                                                                
  exit;                                                                         
}                                                                               
                                                                                
$document_type = $_POST['document_type'];
$start_date = $_POST['start_date'].' 00:00:00';
$end_date = $_POST['end_date'].' 23:59:59';
$keywords = $_POST['keywords'];

$query_str = "SELECT fname,lname,email,title,ministry,version,validity,datetime_uploaded,url 
             FROM documents_uploaded d
             INNER JOIN user u ON u.user_id = d.uploader
             INNER JOIN user_account c ON c.user_id = u.user_id
             WHERE document_type = $document_type
             AND datetime_uploaded >= '$start_date' AND datetime_uploaded <= '$end_date'
             AND keywords LIKE '%$keywords%' OR title LIKE '%$keywords%'";
$q = "SELECT name FROM document_type WHERE document_type_id = $document_type LIMIT 1";
$results = mysql_query($q,$dst_db);                               
$n = mysql_num_rows($results);                                         
                         
                          
if($n > 0) {                   
  $r = mysql_fetch_row($results);    
  $report_type = $r[0];
}
?>


<html>

<head>

<title>Selected report</title>

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

.uploads th, .uploads td {
  text-align: left;
  font-size: 14px;
  border-style: solid;
  border-width: 1px;
}

.uploads {
  width: 99%;
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

    <!--td valign=top class="bg3"><img src="images/news.gif" border=0 alt="">

      <div><b>Malawi Government</b><br><br>
        The Government of Malawi established the Department of Science and Technology in the Ministry of Education Science and Technology in 2009. The department is operating in a dynamic environment; politically, economically, socially, technologically, legally and environmentally. The department is expected to play a major role in facilitating innovative competitiveness and production of high quality products for accelerated economic growth through the formulation and review of science, technology and innovation policies and fostering international cooperation in science and technology.
      </div>
    </td-->
    <td valign="top" class="bg4" colspan="3"><!--img src="images/company_text.gif" border=0 alt=""><br-->
      <div>
        <h1>Uploaded files (<?php echo $report_type ?>)</h1><br />
        <table class='uploads'>
          <tr>
            <th>Title</th>
            <th>Ministry</th>
            <th>Version</th>
            <th>Validity</th>
            <th>Uploader</th>
            <th>Date uploaded</th>
            <th>&nbsp;</th>
          </tr>
        <?php
        $results = mysql_query($query_str,$dst_db);                               
        $n = mysql_num_rows($results);                                         
                          
        if($n > 0) {                   
          for ($i = 1;$i <= $n;$i++) {                                         
            $r = mysql_fetch_row($results);                                        
        ?>                                                                            
          <tr>
            <td><?php echo $r[3]; ?></td>       
            <td><?php echo $r[4]; ?></td>       
            <td><?php echo $r[5]; ?></td>       
            <td><?php echo $r[6]; ?></td>       
            <td><?php echo $r[0].' '.$r[1]; ?></td>       
            <td><?php echo $r[7]; ?></td>       
            <td style="text-align:center;"><a href="<?php echo $r[8]; ?>">Download</a></td>   
         </tr>    
       <?php                                                                   
          }                                                                          
        }else{ 
          if(strlen($keywords) > 0) {
        ?>                                                                            
         <tr> 
          <td colspan="6" style="text-align: center;">No files found matching <?php echo $keywords ?></td>   
         </tr>
        <?php 
          }else{ ?>
         <tr> 
          <td colspan="6" style="text-align: center;">No files uploaded yet</td>   
         </tr>
          <?php
          }
        }?> 
        </table>
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


