<?php 
    if(isset($_POST['deactivate'])){
    
        $usercode = $_POST['usercode'];

        //connecting to the database 
         $conn = mysqli_connect('localhost','root','','kccd');

        $sql = "UPDATE pupils SET status = 'inactive' WHERE usercode = '$usercode' ";
        if($conn->query($sql) === TRUE){
         header('Location: deactivate.php');
         exit();
        }
    }
 
?>

