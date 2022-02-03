<?php
session_start();
    if(isset($_POST['regPupil'])){
   

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $usercode = $_POST['usercode'];
    $phoneNo = $_POST['phoneNumber'];  
    
    //connecting to the database 
    $conn = mysqli_connect('localhost','root','','kccd');

       
       $sql = "INSERT INTO `pupil`(`Usercode`, `Firstname`, `Lastname`, `phoneNo`) VALUES ('$usercode','$fname','$lname','$phoneNo')";

       if($conn->query($sql) === TRUE){
           $_SESSION['status'] = " registered successfully";
        header('Location: register-pupil.php?error=Pupil registered succesfully');
        exit();
       }else{
           echo 'false';
       }
    }

?>