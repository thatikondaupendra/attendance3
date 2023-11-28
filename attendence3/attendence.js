function ff(){
   // if (l==1) {
        //var some="hello"
        //var some2=document.getElementById("present").name
        reg=parseInt(document.getElementById('num').value)
        stu=parseInt(document.getElementById('stu').value)
        document.getElementById('stable').innerHTML+=("<thead>Attendence sheet</thead><tr><th>regno</th><th>present</th><th>absent</th></tr>");
        for (i=1;i<=stu;i++){
            pre=document.getElementById('series').value
            //alert(pre+reg);
            regnos=pre+reg
            //document.getElementById("stable").innerHTML=("<thead>Attendence sheet</thead><tr><th>NAME</th><th>regno</th><th>present</th><th>absent</th></tr><tr name='sname'><td>bkr</td><td name='regno'><input type='text' value='20G31A0' oninput='msg()' class='reg'/></td><td><input type='radio' name='hello' value='1'class='present'/></td><td><input type='radio' name='hello' value='0' class='present'/></td></tr>")
            document.getElementById('stable').innerHTML+=("<tr><td><input type='text' value="+regnos+" oninput='msg()' name='reg'/></td><td><input type='radio' name="+regnos+" value='1'class='present'/></td><td><input type='radio' name="+regnos+" value='0' class='present'/></td></tr>")
         //document.getElementById("present").innerHTML=(some)
         reg+=1
              //document.write(some)
            //function msg(){
//    alert("hello world")
//    valu=document.getElementsByClassName("reg")[i].value;
//    alert(valu)
//    //document.getElementById("present").name=valu
//    document.getElementsByClassName("present").name=valu
//    //alert(document.getElementById("present").name)
//    //alert(document.getElementsByClassName("present").name)
//    //document.write(valu)
//    //it is single line comment
//    //document.write("you are in javascript bigining");
//    /*it is multi line comment space*/
//}
//alert(document.getElementsByClassName("present").name)
//}
    }
    document.getElementById('stable').innerHTML+=("<input type='submit' value='submit'></input>");
}

function vall(){
    var l=document.getElementById("val").value
    if (l==1){
        var reg=500
        lis=[];
    for (i=0;i<5;i++){
        reg+=i
        pre='20G31A0'
        regnos=pre+reg
        lis.push(regnos)
        //alert(regnos)
        document.getElementById('stable').innerHTML+=("<thead>Attendence sheet</thead><tr><th>NAME</th><th>regno</th><th>present</th><th>absent</th></tr><tr name='sname'><td>bkr</td><td name='regno'><input type='text' value="+regnos+" oninput='msg()' name='reg'/></td><td><input type='radio' name="+regnos+" value='1'class='present'/></td><td><input type='radio' name="+regnos+" value='0' class='present'/></td></tr>")
         reg=500
    }
}
}
