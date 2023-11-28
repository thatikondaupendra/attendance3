<html>
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
        <script type="text/javascript" src="studentdata.js"></script>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
}

form {
    text-align: center;
    width: 50%;
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
select{

    font-size:200%;
    width:auto;
    height:5%;
    background-color:lightskyblue;
    color:blue;
}
table{
    width:100%;
}
thead{
    font-size:150%;
    background-color:lightgreen;
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
$sq="SHOW TABLES FROM $db";
$rr=mysqli_query($conn,$sq);
?>
    <form  method='post' action='http://localhost/attendence3/show.php'>
        <?php
echo "<select onchange='fun()' id='insert'>";
while($table=mysqli_fetch_array($rr)){
 echo ("<option name=$table[0] value=$table[0] selected>$table[0]</option>");
$s=$table[0];
}

echo "</select>";
//echo "<select onchange='fun()'><option>hello</option><option>hello2</option></select>";

?>

    <script>
        function fun(){
            ele=document.getElementById('insert')
        val=ele.value
        document.getElementById('table').value=val
        }
    </script>

        <table id="stable">
        <label for='table'>'table name:'</label>
        <input type='text' placeholder='select from above list:'name='tabl' id='table'/>
        <input type='submit' name='table' value='show list'/>
        <label for='table'>'Enter name or reg:'</label>
        <input type='text' placeholder='Enter name or register_num:' name='nr' id='table'/>
        <input type='submit' name='table1' value='table1'/>
        <label for='table'>'Enter date:'</label>
        <input type='text' placeholder='Enter date:' name='d' id='table'/>
        <input type='submit' name='table2' value='table1'/>
        
    </form>
    
<form  method='post' action='http://localhost/attendence3/show.php'>
        <table border='1' style='border-collapse:collapse;'>
        <?php
      if (array_key_exists('table',$_POST)){
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
    $tab=$_POST['tabl'];   
    if(strlen($tab)!=7){
    //$ll=array(); 
    $needs=mysqli_query($conn,"SELECT * FROM $tab");
    ?><thead>student details</thead><tr><th>register number</th><th>name</th><th>Phone number</th><th>date</th></tr>
    <?php
while($ta=mysqli_fetch_array($needs)){
    $id=$ta['id'];
    $name=$ta['studentname'];
    $phno=$ta['phone_num'];
    $dt=$ta['date_of_absent'];
    //array_push($ll,array($id,$name,$phno));
    ?>
<tr>
    <td>
        <?php echo $id;?>
</td>
<td>
        <?php echo $name;?>
</td>
<td>
        <?php echo $phno;?>
</td>
<td>
        <?php echo $dt;?>
</td>
</tr>
<?php
 
}
?>
<?php
//echo sizeof($ll);
 //echo ("<tr><td><input type='text' value=$id oninput='msg()' name='reg'/></td><td><input type='text' value=$name  name='reg'/></td><td><input type='text' value=$phno name='reg'/></td></tr>");
    }
    else{
        $needs=mysqli_query($conn,"SELECT * FROM $tab");
    ?>
    <thead>student details</thead><tr><th>register number</th><th>name</th><th>Phone number</th></tr>
    <?php
while($ta=mysqli_fetch_array($needs)){
    $id=$ta['id'];
    $name=$ta['studentname'];
    $phno=$ta['phone_num'];
    //array_push($ll,array($id,$name,$phno));
    ?>
<tr>
    <td>
        <?php echo $id;?>
</td>
<td>
        <?php echo $name;?>
</td>
<td>
        <?php echo $phno;?>
</td>
</tr>
<?php
 
}
    }
}
?>

        <?php
      if (array_key_exists('table1',$_POST)){
        creating1();
    }
    function creating1(){
        $sn="localhost";
    $un="system";
    $p="system";
    $db="myDB1";
        $conn=mysqli_connect($sn,$un,$p,$db);
    if(!$conn){
        die("connection failed:".mysqli_connect_error());
    }
    $tab=$_POST['tabl'];
    $input=$_POST['nr'];  
    if(strlen($tab)!=7){
    //$ll=array(); 
 
    $count=mysqli_fetch_array ( mysqli_query($conn,"SELECT count(id) FROM $tab WHERE id='$input' or studentname='$input'"));
    ?>
    <h4>COUNT::<?php echo $count[0];?></h4>
    <?php
  
    $count=0;
    $needs=mysqli_query($conn,"SELECT id,studentname,phone_num,date_of_absent FROM $tab WHERE id='$input' or studentname='$input'");
    ?>
    <thead>student details</thead><tr><th>register number</th><th>name</th><th>Phone number</th><th>date</th></tr>
    <?php
while($ta=mysqli_fetch_array($needs)){
    $id=$ta['id'];
    $name=$ta['studentname'];
    $phno=$ta['phone_num'];
    $dt=$ta['date_of_absent'];
    //array_push($ll,array($id,$name,$phno));
    ?>
<tr>
    <td>
        <?php echo $id;?>
</td>
<td>
        <?php echo $name;?>
</td>
<td>
        <?php echo $phno;?>
</td>
<td>
        <?php echo $dt; ?>
</td>
</tr>
<?php
 
}
?>
<?php
//echo sizeof($ll);
 //echo ("<tr><td><input type='text' value=$id oninput='msg()' name='reg'/></td><td><input type='text' value=$name  name='reg'/></td><td><input type='text' value=$phno name='reg'/></td></tr>");
    }
    else{
        $needs=mysqli_query($conn,"SELECT * FROM $tab WHERE id='$input' or studentname='$input'");
    ?>
    <thead>student details</thead><tr><th>register number</th><th>name</th><th>Phone number</th></tr>
    <?php
while($ta=mysqli_fetch_array($needs)){
    $id=$ta['id'];
    $name=$ta['studentname'];
    $phno=$ta['phone_num'];
    //array_push($ll,array($id,$name,$phno));
    ?>
<tr>
    <td>
        <?php echo $id;?>
</td>
<td>
        <?php echo $name;?>
</td>
<td>
        <?php echo $phno;?>
</td>
</tr>
<?php
 
}
    }
}
?>
        <?php
      if (array_key_exists('table2',$_POST)){
        creating2();
    }
    function creating2(){
        $sn="localhost";
    $un="system";
    $p="system";
    $db="myDB1";
        $conn=mysqli_connect($sn,$un,$p,$db);
    if(!$conn){
        die("connection failed:".mysqli_connect_error());
    }
    $tab=$_POST['tabl'];
    $input=$_POST['d'];  
    $count=mysqli_fetch_array ( mysqli_query($conn,"SELECT count(id) FROM $tab WHERE date_of_absent='$input'"));
    ?>
    <h4>COUNT::<?php echo $count[0];?></h4>
    <?php
    if(strlen($tab)!=7){
    //$ll=array(); 
    echo $input;
    echo $tab;
    $needs=mysqli_query($conn,"SELECT id,studentname,phone_num,date_of_absent FROM $tab WHERE date_of_absent='$input'");
    ?>
    <thead>student details</thead><tr><th>register number</th><th>name</th><th>Phone number</th><th>date</th></tr>";
    <?php
while($ta=mysqli_fetch_array($needs)){
    $id=$ta['id'];
    $name=$ta['studentname'];
    $phno=$ta['phone_num'];
    $dt=$ta['date_of_absent'];
    //array_push($ll,array($id,$name,$phno));
    ?>
<tr>
    <td>
        <?php echo $id;?>
</td>
<td>
        <?php echo $name;?>
</td>
<td>
        <?php echo $phno;?>
</td>
<td>
        <?php echo $dt; ?>
</td>
</tr>
<?php
 
}
?>
<h4>COUNT::<?php $count;?></h4>
<?php
//echo sizeof($ll);
 //echo ("<tr><td><input type='text' value=$id oninput='msg()' name='reg'/></td><td><input type='text' value=$name  name='reg'/></td><td><input type='text' value=$phno name='reg'/></td></tr>");
    }
}
?>
</table>
</form>
</body>
</html>


