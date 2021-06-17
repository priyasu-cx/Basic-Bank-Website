<?php
//Remote database connection
$server="remotemysql.com";
$username="AyoJMmIlcV";
$password="eeMvKmZD7Z";
$db="AyoJMmIlcV";

$conn=mysqli_connect($server,$username,$password,$db);

if($conn){

}

else
die("connection to this database failed due to " .mysqli_connect_error());

?>
