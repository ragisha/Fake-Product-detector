<?php
$pname = $_POST['pname'];
$cname = $_POST['cname'];
$pinfo = $_POST['pinfo'];
$cinfo = $_POST['cinfo'];
$locat = $_POST['locat'];
$manufacturing = date('Y-m-d',strtotime($_POST['manufacturing']));
$expiry =  date('Y-m-d',strtotime($_POST['expiry']));

if (!empty($pname) || !empty($cname) || !empty($pinfo) || !empty($cinfo) || !empty($locat) || !empty($manufacturing) || !empty($expiry) )
{
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "mini";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT pname From product Where pname = ? Limit 1";
  $INSERT = "INSERT Into product (pname,cname,pinfo,cinfo,locat,manufacturing,expiry )values(?,?,?,?,?,?,?)";

     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $pname);
     $stmt->execute();
     $stmt->bind_result($pname);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssss", $pname,$cname,$pinfo,$cinfo,$locat,$manufacturing,$expiry);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already registered for this product";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>