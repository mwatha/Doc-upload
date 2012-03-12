<script>
  setTimeout("redirect();",6000);
</script>

<?php 
session_start();

$dst_db = mysql_pconnect("localhost","root","letusout");                        
mysql_select_db("dst", $dst_db);

$title = $_POST['title'];
$ministry = $_POST['ministry'];
$version = 1; #$_POST['version'];
$amount = $_POST['amount'];
$qualification = 'MBA'; #$_POST['qualification'];
$validity = $_POST['validity'];
$keywords = $_POST['keywords'];

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

$query = "INSERT INTO documents_uploaded VALUES(NULL,'$title','$ministry',$version,'$url','$amount','$validity','$qualification','$keywords',$user_id)";


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
