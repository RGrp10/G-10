<?php
session_start();
    if(isset($_POST['regPupil'])){
   

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $usercode = $_POST['usercode'];
    $phoneNumber = $_POST['phoneNumber'];  
    $username = $_SESSION['Username'];
    
    //connecting to the database 
    $conn = mysqli_connect('localhost','root','','kccd');

       
       $sql = "INSERT INTO pupils (fname,lname,usercode,phoneNumber,username) VALUES ('$fname','$lname','$usercode','$phoneNumber','$username')";

       if($conn->query($sql) === TRUE){
           $_SESSION['status'] = " registered successfully";
        header('Location: register-pupil.php?error=Pupil registered succesfully');
        exit();
       }else{
           echo 'false';
       }
    }

?>