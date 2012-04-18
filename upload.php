<?php session_start(); ?>

<script>
  setTimeout("redirect();",6000);
</script>

<?php 

$dst_db = mysql_pconnect("localhost","root","");                        
mysql_select_db("dst", $dst_db);

$title = $_POST['title'];
$ministry = $_POST['ministry'];
$version = 1; #$_POST['version'];
$amount = $_POST['amount'];
$validity = $_POST['validity'];
$keywords = $_POST['keywords'];
$document_type = $_POST['document_type'];

$user_id = $_SESSION['user_id'];
$allowed_filetypes = array('.pdf','.odt','.docx','.doc','.csv'); // These will be the types of file that will pass the validation.
 
$filename = $_FILES['uploadedfile']['name']; // Get the name of the file (including file extension).

$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.


$query = "SELECT document_id FROM documents_uploaded ORDER BY document_id DESC LIMIT 1";     
$results = mysql_query($query,$dst_db);                                     
$r = mysql_fetch_row($results);                                                 
$n = mysql_num_rows($results);                                                  
                                                                                
if ($n > 0) {                                                                   
  $url = 'uploads/'.$r[0].rand(1000, 1000000).$ext;
}else{
  $url = 'uploads/'.rand(1000, 1000000).$ext;
}


$hour =  date("G") - 1;
if ($hour < 9) {
  $hour = "0".$hour;
}

$time =  $hour.date(":i:s");
$datetime = date("Y-m-d ").$time;

$query = "INSERT INTO documents_uploaded VALUES(NULL,$document_type,'$title',
          '$ministry',$version,'$url','$amount','$validity','$keywords',$user_id,'$datetime')";

// Check if the filetype is allowed, if not DIE and inform the user.
if(!in_array($ext,$allowed_filetypes)) {
?>
  <script>
    document.write('The file you attempted to upload is not allowed.');
    setTimeout("redirect();",4000);
  </script>
<?php
}else if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $url)) {
?>
  <script>
    <?php mysql_query($query,$dst_db); ?>
    document.write("The file " + "<?php  echo basename( $_FILES['uploadedfile']['name']) ?>" + " has been uploaded");
    setTimeout("redirect();",4000);
  </script>
<?php
} else{ ?>
  <script>
    document.write("There was an error uploading the file, please try again!");
    setTimeout("redirect();",4000);
  </script>
<?php 
}
?>

<script>

  function redirect() {
    window.location="document.php";
  }
</script>
