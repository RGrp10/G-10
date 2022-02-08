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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
     * {
           margin: 0;
           padding: 0;
       }
    .error {color: #FF0000;}
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
            <a href="deactivate.php"class="dashboard-nav-item"><i class="fa fa-line-chart" aria-hidden="true"></i>Deactivate</a>
            

          <a
                    href="logout.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
        </nav>
    </div>
    <div class='dashboard-app'>
        <header class='dashboard-toolbar'><h5>Welcome <?php echo $_SESSION['Username']; ?></h5></header>

        <div class='dashboard-content'>

     
   
        <!-- content area -->
            <div class="card" style="width: 50%">
                <div  class="card-body">  
                    <?php
                    if(isset($_SESSION['status'])){
                        ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Pupil</strong><?php echo $_SESSION['status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                        

                        <?php
                        unset($_SESSION['status']);
                    }
                    
                    ?>
                <form action="pupilRegistration.php" method="post">
  <div class="row mb-3">
    <label for="fname" class="col-sm-2 col-form-label">Firt Name</label>
    <div class="col-sm-10">
      <input type="fname" class="form-control" name="fname" style="width: 250px" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
    <div class="col-sm-10">
      <input type="lname" class="form-control" name="lname" style="width: 250px" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="usercode" class="col-sm-2 col-form-label">User Code</label>
    <div class="col-sm-10">
      <input type="usercode" class="form-control" name="usercode" style="width: 250px" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="lname" class="col-sm-2 col-form-label">Phone Number</label>
    <div class="col-sm-10">
      <input type="phoneNumber" class="form-control" name="phoneNumber" style="width: 250px"  required>
    </div>
  </div>
  
  
  <button type="submit" class="btn btn-primary" name="regPupil">Register</button>
</form>
                </div>
            
            </div>
        </div>
    </div>
</div>
</body>
</html>