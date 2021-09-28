<?php
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $Email=$_POST['Email'];
    $number=$_POST['number'];
    $address=$_POST['address'];
    $productid=$_POST['productid'];
    $state=$_POST['state'];
    $gender=$_POST['gender'];
    $query=$_POST['query'];
    //database connection
    $conn=new mysqli("localhost","root","","query");
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connectio Failed: ".$conn->connect_error);
    }else{
        $stmt=$conn->prepare("INSERT into querydata(firstname,lastname,Email,number,address,productid,state,gender,query) values(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssisisss",$firstname,$lastname,$Email,$number,$address,$productid,$state,$gender,$query);
        $execval=$stmt->execute();
        echo $execval;
        echo"Yaah!!! You Have Successfully submited your Query...:)";
        $stmt->close();
        $conn->close();
    }
?>