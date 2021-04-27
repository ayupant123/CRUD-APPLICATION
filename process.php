<?php 

session_start();
 
 $mysqli = new mysqli('localhost', 'root', '' , 'crud') or die(mysqli_error($mysqli)); 
 $name = '';
 $city = '';
 $update= false;
 $id=0;
 $email='';
 $mobile=0000000000;
 $state='';
 $address='';

 if(isset($_POST['save'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $mobile = $_POST['mobile'];
     $state = $_POST['state'];
     $city = $_POST['city'];
     $address = $_POST['address'];
     $mysqli->query("INSERT INTO data (name,email,mobile,state,city,address) VALUES('$name','$email',$mobile,'$state','$city','$address' )") or die($mysqli->error);


    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

 }

 if (isset($_GET['delete'])) {
     $id = $_GET['delete'];
   
     $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
 }

 if(isset($_GET['edit'])){
     $id = $_GET['edit'];
     $update = true;
     $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error);
    
     if(isset($result)){
         $row = $result->fetch_array();
         $name = $row['Name'];
         $email = $row['Email'];
         $mobile = $row['mobile'];
         $state = $row['state'];
         $city = $row['city'];
         $address= $row['address'];
     }
    
}
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile = $_POST['mobile'];
    $state = $_POST['state'];
    $city= $_POST['city'];
    $address = $_POST['address'];

    $mysqli->query("UPDATE data SET Name='$name', email='$email', mobile=$mobile, state='$state' city='$city', address='$address' WHERE id=$id") or die($mysqli->error);
    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type']= "warning";
    header("location:index.php");
}

?>