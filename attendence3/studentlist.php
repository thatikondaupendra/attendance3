<html>
    <head>
        <title>
            inserting data
</title>
</head>
<?php
$sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
$sq="SHOW TABLES FROM $db";
$rr=mysqli_query($conn,$sq);
?>
<script type="text/javascript" src="studentdata.js"></script>
    <nav>
            <a href="studentdata.html">home</a> 
            <a href="attendence.html">attendance</a> 
            <a method="post" href="http://localhost/attendence3/studentlist.php">insert record</a> | 
            <a onclick="uploads()">upload new student list</a> 
            <a onclick="deleting()">delete list</a> 
            <a onclick="deleterec()">delete all records</a> 
            <a onclick="modifys()">modify content</a>
            <a method="post" href="http://localhost/attendence3/show.php">show details</a>
        </nav>
<form method="post" action="http://localhost/attendence3/studentlist.php">
<?php 
echo "<select onchange='func()' id='insert' >";
while($table=mysqli_fetch_array($rr)){
 echo ("<option name=$table[0] value=$table[0]>$table[0]</option>");
}

echo "</select>";


if (array_key_exists('insert',$_POST)){
    insert();
}


function insert(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}

//define variables
$sname=$id=$phno=$table="";

$table=$_POST['table'];
$sname=$_POST['sname'];
$id=$_POST['id'];
$phno=$_POST['phno'];

$sq="INSERT INTO $table  values 
('$id','$sname','$phno')";
//insert in database
$rs=mysqli_query($conn,$sq);
if($rs){
    echo "details record inserted";
}
else{
    echo "error:".$sq."<br>".mysqli_error($conn);
}
echo "<h3>$sname</h3>";
mysqli_close($conn);
}
//$rrr=mysqli_fetch_all($rr);
//for ($i=0;$i<count($rrr);$i++){
//    echo $r[$i];
//}
////////$r=mysqli_fetch_all($rr);
////////echo count($r);
////////for ($i=0;$i<count($r);$i++){
////////    echo $i;
////////    echo $r[$i];
////////}
////////$n=$r[0];
////////echo $n;
////////foreach($r as $f){
////////    echo $r[0];
////////}
//while($n){
//    echo($r[0]." ");
//    $n-1;
//}
//for($i=0;$i<$n;$i++){
//    echo $i;
//    echo $r[$i];
//}
////define variables
//$sname=$id=$phno="";
//
//$sname=$_POST['sname'];
//$id=$_POST['id'];
//$phno=$_POST['phno'];
//
//$sq="INSERT INTO studentdetails  values 
//('$id','$sname','$phno')";
////insert in database
//$rs=mysqli_query($conn,$sq);
//if($rs){
//    echo "details record inserted";
//}
//else{
//    echo "error:".$sq."<br>".mysqli_error($conn);
//}
//echo "<h3>"+$sname+"</h3>";
//mysqli_close($conn);
?>
<html>
    <script>
        function func(){
            ele=document.getElementById('insert')
        val=ele.value
        document.getElementById('table').value=val
        }
    </script>
        <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
}

form {
    text-align: center;
    width: 30%;
    height: auto;
    background-color: rgba(234, 15, 51, 0.141);
    box-shadow: 5px 10px 18px rgba(255, 255, 0, 0.5);
    padding: 20px;
    margin: 100px auto;
    border-radius: 10px;
    border: 2px solid blue;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 15px;
    border: none;
    background: #f1f1f1;
}

input[type="submit"] {
    background-color: blue;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-top: 10px;
}

input[type="submit"]:hover {
    background-color: darkblue;
}

.message {
    color: red;
    font-size: 12px;
    margin-top: 10px;
}
            
    </style>
            <style>
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
select{

font-size:200%;
width:70%;
height:auto;
background-color:lightskyblue;
color:blue;
}
        </style>
    <body>


        <label for='table'>'table name:'</label>
        <input type='text' value=''name='table' id='table'/>
            <label for="id">Enter Student ID:</label>
            <input type="text" name="id"/>
            <br>
            <label for="sname">Enter Student Name:</label>
            <input type="text" name="sname"/>
            <br>
            <label for="phno">Enter parent phone number:</label>
            <input type="text" name="phno"/>
            <br>
            <input type="submit" value="submit" name='insert' >
        </form>

</body>
</html>