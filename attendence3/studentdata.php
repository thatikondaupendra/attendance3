<nav>
            <a href="studentdata.html">home</a> 
            <a href="attendence.html">attendance</a> 
            <a method="post" href="http://localhost/attendence3/studentlist.php">insert record</a> | 
            <a href="#" onclick="uploads()">upload new student list</a> 
            <a href="#" onclick="deleting()">delete list</a> 
            <a href="#" onclick="deleterec()">delete all records</a> 
            <a href="#" onclick="modifys()">modify content</a>
            <a method="post" href="http://localhost/attendence3/show.php">show details</a>
        </nav>
        <style>
            <script type="text/javascript" src="studentdata.js"></script>
body {
    font-family: Arial, sans-serif;
}

nav {
    background-color: #333;
    overflow: hidden;
}

nav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

nav a:hover {
    background-color: rgb(255, 177, 61);
}
        </style>
<?php
$sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
//$year=$branch="";
//$year=$_POST['yearr'];
//$branch=$_POST['branch'];
//echo $year;
//echo $branch;
if (array_key_exists('upload',$_POST)){
    creating();
}
function creating(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
    $conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
    $year=$_POST['yearr'];
$branch=$_POST['branch'];
  $name=$year.$branch;
  echo $name;
  $ab='absenties';
  $tot='totalabsenties';
  $a=$name.$ab;
  $b=$name.$tot;
$s="CREATE TABLE $name(id varchar(10),studentname varchar(30),phone_num BIGINT(20))";
$ss="CREATE TABLE $a(id varchar(10),studentname varchar(30),phone_num BIGINT(20) ,date_of_absent DATE)";
$sss="CREATE TABLE $b(id varchar(10),studentname varchar(30),phone_num BIGINT(20) ,date_of_absent DATE)";
$rs=mysqli_query($conn,$s);
$rss=mysqli_query($conn,$ss);
$rsss=mysqli_query($conn,$sss);
if($rs&$rss&$rsss){
    echo "new batch file created successfully...";
 }
//    $needs=mysqli_fetch_array(mysqli_query($conn,"SELECT yearr,branch FROM studentdetails"));
}

if (array_key_exists('delete',$_POST)){
    deleting();
}
function deleting(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
    $conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
    $year=$_POST['yearr'];
$branch=$_POST['branch'];
  $name=$year.$branch;
  echo $name;
$s="DROP TABLE $name";
$rs=mysqli_query($conn,$s);
if($rs){
    echo "selected batch file successfully deleted...";
 }
//    $needs=mysqli_fetch_array(mysqli_query($conn,"SELECT yearr,branch FROM studentdetails"));
}

if (array_key_exists('drops',$_POST)){
    drops();
}
function drops(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
    $conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
    $year=$_POST['yearr'];
$branch=$_POST['branch'];
  $name=$year.$branch;
  echo $name;
$s="DELETE FROM $name";
$rs=mysqli_query($conn,$s);
if($rs){
    echo "selected batch file records successfully deleted...";
 }
//    $needs=mysqli_fetch_array(mysqli_query($conn,"SELECT yearr,branch FROM studentdetails"));
}

if (array_key_exists('modify',$_POST)){
    modifing();
}

function modifing(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
    $conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
$year=$newphno=$namval=$id='';
    $year=$_POST['yearr'];
$branch=$_POST['branch'];
$id=$_POST['id'];
if($_POST['name']!=NULL){
$namval=$_POST['name'];}
$name=$year.$branch;
    $n=mysqli_fetch_array(mysqli_query($conn,"SELECT id,studentname,phone_num FROM $name WHERE id='$id'"));
    echo $n['id'];
    $needs=mysqli_query($conn,"UPDATE $name SET studentname = '$namval' WHERE id = '$id'");
    echo $namval;
//  $name=$year.$branch;
//  echo $name;
//$s="DROP TABLE $name";
//$rs=mysqli_query($conn,$s);
//if($rs){
//    echo "selected batch file successfully deleted...";
// }
   //$needs=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM $name WHERE id=$id"));
}

if (array_key_exists('modify1',$_POST)){
    modifing1();
}

function modifing1(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
    $conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
$year=$newphno=$namval=$id='';
    $year=$_POST['yearr'];
$branch=$_POST['branch'];
$id=$_POST['id'];
if($_POST['phnoo']!=NULL){
$namval=$_POST['phnoo'];}
$name=$year.$branch;
    echo $year.$branch;
        $needs=mysqli_query($conn,"UPDATE $name
        SET  phone_num= $newphno
        WHERE id = $id;");

//  $name=$year.$branch;
//  echo $name;
//$s="DROP TABLE $name";
//$rs=mysqli_query($conn,$s);
//if($rs){
//    echo "selected batch file successfully deleted...";
// }
   //$needs=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM $name WHERE id=$id"));
}


?>