<?php

$qrlink = $_POST['qrlink'];
if (!empty($qrlink) )
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
  $SELECT = "SELECT qrlink From sample Where qrlink = ? Limit 1";
  $INSERT = "INSERT Into sample (qrlink)values(?)";

     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $qrlink);
     $stmt->execute();
     $stmt->bind_result($qrlink);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("s", $qrlink);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>