<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KCCD</title>
    <link rel="stylesheet" href="styles.css">
    <script src="dashboard.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
     * {
           margin: 0;
           padding: 0;
       }
</style>
</head>
<body>

    <div class='dashboard'>
    <div class="dashboard-nav">
        <header>
                    <h3 style="color: white;">KCCD</h3>
        </header>
        <nav class="dashboard-nav-list"><a href="index.php" class="dashboard-nav-item">
            <a href="register-pupil.php" class="dashboard-nav-item">Register Pupils</a>
            <a href="assignment.php" class="dashboard-nav-item">Assignments</a>
            <a href="results.php" class="dashboard-nav-item">Results</a>
            <a href="reports.php"class="dashboard-nav-item"><i class="fa fa-line-chart" aria-hidden="true"></i>Reports</a>
            <a href="deactivate.php"class="dashboard-nav-item"><i class="fa fa-line-chart" aria-hidden="true"></i>Activation Status</a>
            
          <a href="logout.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
        </nav>

    </div>
    <div class='dashboard-app'>
        <header class='dashboard-toolbar'><h5>Welcome <?php echo $_SESSION['Username']; ?></h5></header>
        <div class='dashboard-content'>
 
        <!-- content area -->
            <div class='container'>     
              
            <h1>Registered Pupils</h1>

              
            
              <?php
              $conn = mysqli_connect('localhost','root','','kccd');
              $username = $_SESSION['Username'];

              $sql = "SELECT * FROM pupils WHERE username = '$username' ";

              $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<table class="table">
                    <thead>
                        <tr>
                        <th scope="col">User code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Deactivate</th>
                        </tr> 
</thead>
<tbody>
';
                // output data of each row
                while($row = $result->fetch_assoc()) {
                      $usercode = $row['usercode'];           
                    echo '<tr><td>'.$row["usercode"].'</td><td>'.$row["fname"].' '.$row["lname"].'</td><td>'.$row["phoneNumber"].'</td><td>'.$row['status'].'</td>
                
                    <td>';
                    if($row['status'] == 'active'){
                        echo '<form action="deactivate-backend.php" method="post">
                    
                        <input type="hidden" name="usercode" value="'.$usercode.'">
                        <button type="submit" name="deactivate" class="btn btn-danger">Deactivate</button>
                        </form>
                        </td>
                         
                        
                        </tr>';
                    }else{
                        echo '<form action="activate-backend.php" method="post">
                    
                        <input type="hidden" name="usercode" value="'.$usercode.'">
                        <button type="submit" name="activate" class="btn btn-success">Activate</button>
                        </form>
                        </td>';
                    }
                    
                
                }

                echo "</tbody>
                </table> ";
                
              
            }
              ?>
        
                                    
            </div>
        </div>
    </div>
</div>
</body>
</html> 
 