<?php
    if(isset($_POST['regButton'])){
      
       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
       $username = $_POST['username'];
       $password1 = $_POST['password1'];
       $password2 = $_POST['password2'];
       
  //connecting to the database 
      $conn = mysqli_connect('localhost','root','','kccd');
      if($password1 != $password2){
        header('Location: register.php?error=errorTryAgain');
        exit();
      }else{ 
       $sql = "INSERT INTO teachers (fname,lname,username,password) VALUES ('$fname','$lname','$username','$password1')";
      }


       

       if($conn->query($sql) === TRUE){
        header('Location: index.php?error=accountCreatedSuccessfully');
        exit();
       }else{
        header('Location: register.php?error=errorTryAgain');
        exit();
       }
    }

?>
