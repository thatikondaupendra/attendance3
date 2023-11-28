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
        </style>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
}

form {
    text-align: center;
    width: 300px;
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
    <script type="text/javascript" src="studentdata.js"></script>
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


<?php
$table=$_POST['table'];



function finall(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
global $table;
$currentDate = date('Y-m-d');
$tablea=$table.'absenties';
$tableb=$table.'totalabsenties';
$s=" DELETE FROM $tablea";
$rs=mysqli_query($conn,$s);
$ta=$_POST['table'];

$needs=mysqli_query($conn,"SELECT id FROM $table");
$need=mysqli_query($conn,"SELECT id FROM $table");
while($ta=mysqli_fetch_array($need)){
    $reg=$ta[0];
   // echo $reg."<br>";
    //echo $regn;
if($_POST[$ta[0]]==""){
    $pa=1;
}
else{
$pa=$_POST[$ta[0]];}
$needs=mysqli_fetch_array(mysqli_query($conn,"SELECT studentname,phone_num FROM $table WHERE id='$reg'"));
if($needs){
$sname=$needs['studentname'];
$phno=$needs['phone_num'];
if ($pa=="0"){
$sq="INSERT INTO $tablea  values ('$reg','$sname','$phno','$currentDate')";
$ss="INSERT INTO $tableb  values ('$reg','$sname','$phno','$currentDate')";
//insert in database
$rs=mysqli_query($conn,$sq);
$rss=mysqli_query($conn,$ss);
}

//echo $reg,"<p>Variable x inside function is: $i</p>";
}
}
if($rs&$rss){
    echo "Attendence record inserted";
 }
}
?>
<html>
    <body>
    <form method="post" action="http://localhost/attendence3/attendencephp1.php">
        <input type='text' value=<?= $table?> name=table>
        <?php
        if (array_key_exists('atten',$_POST)){
    attendence();
}
function attendence(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
    $conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
$year=$newphno=$namval=$id='';
global $table;
$p=1;
$a=0;
$currentDate = date('Y-m-d');
    $needs=mysqli_query($conn,"SELECT id FROM $table");
    echo "<form><table><thead>Attendence sheet</thead><tr><th>regno</th><th>present</th><th>absent</th><th>($currentDate)</th></tr>";
while($ta=mysqli_fetch_array($needs)){
 echo ("<tr><td><input type='text' value=$ta[0] oninput='msg()' name='reg'/></td><td><input type='radio' name=$ta[0] value= $p class='present' checked/></td><td><input type='radio' name=$ta[0] value= $a class='present'/></td></tr>");
}
echo "</table> ";
echo "<input type='submit' value='post attendence' name='final' ></form>";
}

if (array_key_exists('final',$_POST)){
    finall();
}?>
    </form>
    <style>
            form{
                text-align: center;
                width:auto;
                height: auto;
                background-color: rgba(234, 15, 51, 0.141);
                box-shadow: 5px 10px 18px yellow;
                padding: 0;
                margin:20%;
                border-radius: 2%;
                border-width:20%;
                border-color: blue;
            }
            *{
                font-size: large;
            }
    </style>
</body>
</html>