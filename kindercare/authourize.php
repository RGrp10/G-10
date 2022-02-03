
<?php 
    session_start();
    if(isset($_POST['logButton'])){
      
      $username = $_POST['username'];
      $password = $_POST['password'];

      $conn = mysqli_connect('localhost','root','','kccd');
            // Check connection
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM teachers WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);

            if(is_array($row)){
              $_SESSION['Username'] = $row['username'];
              $_SESSION['password'] =  $row['password'];
            }else{
              echo "<script type = 'text/javascript'>";
              echo "window.location.href = 'index.php'";
              echo "</script>";
            }

            if(isset($_SESSION['Username'])){
              header('Location: register-pupil.php?error=loggedin');
              exit();
            }else{
              header('Location: index.php?error=wrongpassword');
              exit(); 
            }
      
    }

?>