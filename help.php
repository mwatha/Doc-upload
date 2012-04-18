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
                                                                                





$search_string = $_POST['search_string'];
?>


<html>

<head>

<title>Home</title>

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
        <a href="index.php">Home</a>&nbsp;&nbsp;                               
        <span><a href="signout.php">Sign out</a></span>&nbsp;&nbsp;
        <span style="margin-right:40px;">Welcome:
          <font style="color:orangeRed;">&nbsp;<?php echo $_SESSION['username'] ?></font>
        </span>   
      </div>                                                                    
      <div class="header-form">                                                 
        <form id="search_form" method="post" action="index.php">                
          <span>Search:</span>&nbsp;&nbsp;
          <input type="text" size="20" name="search_string" />                  
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

<table width="75%" border="2" align="Center">

  <tr>

    <td >        
<h1>Functionalities</h1>
<blockquote>
  <p>This system has three core functionalities and few  supporting functionalities. These core functions are to add documents, view  documents and search for documents.</p>
</blockquote>
<ul>
  <li>
    <h2>Add document</h2>
  </li>
  <ol>
    <li>click on add document link</li>
    <li>on the window that appears choose document type</li>
    <li>Type the document title</li>
    <li>enter the ministry to which it belongs</li>
    <li>Enter version number (like if u are entering it for the first time is version 1 when you edit and resave it is version 2 and so on )</li>
    <li>Browse the document from your computer</li>
    <li>amount and validity can be blank for policy documents if possible</li>
    <li>Type the search keywords associated with that document these can be phrases found in the document itself.</li>
    <li>click the save button</li>
  </ol>
  <li>
    <h2>View documents </h2>
    <ol>
      <li>Decide what kind of document you want to view</li>
      <li>For scholarships click on view scholarships</li>
      <li>For grants clink on view grants </li>
      <li>For policy document click on policy</li>
    </ol>
  </li>

  <li>
    <h2>Search documents</h2>
    <ol>
      <li>On every page there is a search box. it is on top with search words written before it</li>
      <li>Type the title of a document to search for e.g indian scholarships</li>
      <li>Press enter</li>
      <li>The page containing all files matching your search words in this case indian scholarship will be listed </li>
      <li>Against each file there is a download link. </li>
      <li>click on it to open the file

      </div>
    </td>
    </tr>
<table width= "100%" height="30">
   <tr>
    <td class="bg7" width="100%" align= "Center">Copyright &copy; 2012 Department of Science and Technology All Rights Reserved.</td>  
  </tr> 
</table>

</td></tr>  

</table>

</body>

</html>


