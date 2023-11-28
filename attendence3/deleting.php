<?php
$sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}

//$s="CREATE TABLE about5(id varchar(10) primary key,attendenceval int(1))";
//DELETE table in database
$s=" DELETE FROM about5";
$rs=mysqli_query($conn,$s);
if($rs){
    echo "Table created";
}
else{
    echo "error:".$sq."<br>".mysqli_error($conn);
}
mysqli_close($conn);
?>