<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
{
$uname = $_POST['uname'];
$upswd = $_POST['upswd'];

if (!empty($uname) || !empty($upswd) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "mini";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

$sql= "SELECT * FROM register WHERE uname1 = '$uname' AND upswd1 = '$upswd' ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);
if(isset($check))
{
    header('Location: home.html');
}
else
{
echo 'invalid username or password try again!!!';
}
}
}
?>
