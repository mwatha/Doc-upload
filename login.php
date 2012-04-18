<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">



<html>

<head>

<title>Login</title>

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

.description {
  width: 300px;
}

.bg4{
  background-image:url(images/bg_gray.gif);
  width: 300px;
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
  float: right;
}


.header-a {
  float: left;
}

.header-a a {
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
        
      </div>                                                                    
      <div class="header-form">                                                 
                                                                         
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
      <div class="description"><b>Malawi Government</b><br><br>
        The Government of Malawi established the Department of Science and Technology in the Ministry of Education Science and Technology in 2009. The department is operating in a dynamic environment; politically, economically, socially, technologically, legally and environmentally. The department is expected to play a major role in facilitating innovative competitiveness and production of high quality products for accelerated economic growth through the formulation and review of science, technology and innovation policies and fostering international cooperation in science and technology.
      </div>
    </td>
    <td valign="top" class="bg4" colspan="2">
      <form action="authenticate.php" method="post">
        <table id="container">
          <tr>
            <td style="text-align:right;">username:</td>
            <td><input type="text" size="13" name="username" /></td>
          </tr> 
          <tr>
            <td style="text-align:right;">password:</td>
            <td><input type="password" name="password" size="13" /></td>
          </tr> 
          <tr>
            <td colspan="2" style="text-align:right;">
              <input type="submit" value="Login" />
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td><td>&nbsp;</td>
          </tr> 
          <tr>
            <td style="text-align:right;" colspan="2">Dont have an account?
            &nbsp;<a href="register_user.php">Register</a></td>
          </tr> 
      </table> 
      <form>
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


