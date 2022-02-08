<?php 
    if(isset($_POST['activate'])){
    
        $usercode = $_POST['usercode'];

        //connecting to the database 
         $conn = mysqli_connect('localhost','root','','kccd');

        $sql = "UPDATE pupils SET status = 'active' WHERE usercode = '$usercode' ";
        if($conn->query($sql) === TRUE){
         header('Location: deactivate.php');
         exit();
        }
    }
 
?>