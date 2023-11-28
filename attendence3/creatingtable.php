<?php
$sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
//$s="DROP table about6";
//$s="CREATE TABLE totalabs(id varchar(10) ,absdate varchar(25))";
//$s="CREATE TABLE studentdetails(id varchar(10) ,studentname varchar(30),phone_num BIGINT(20) )";
//creat table in database
//$s="ALERT TABLE about5 RENAME TO todayabs";
$s="DELETE FROM totalabs";
$rs=mysqli_query($conn,$s);
if($rs){
    echo "Table created";
}
else{
    echo "error:".$sq."<br>".mysqli_error($conn);
}
mysqli_close($conn);
?>