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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
     * {
           margin: 0;
           padding: 0;
       }
       .flex-container {
  display: flex;

}

.flex-container > div {
  margin: 10px;
  padding: 20px;
  font-size: 30px;
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
            <a href="deactivate.php"class="dashboard-nav-item"><i class="fa fa-line-chart" aria-hidden="true"></i>Deactivate</a>
            

          <a
                    href="logout.php" class="dashboard-nav-item"> Logout </a>
        </nav>
    </div>
    <div class='dashboard-app'>
        <header class='dashboard-toolbar'><h5>Welcome <?php echo $_SESSION['Username']; ?></h5></header>
        <div class='dashboard-content'>

        <!-- content area -->
            <div class='container'>
              <form action="" method="post">

              <div class="flex-container">
                    <div>
                    <h1>Enter assignment characters</h1>
                    <div class="col">
                        <div class="row">
                        <input type="text" name="character1" placeholder="character1" class="form-control" name="fname" style="width: 250px"> <br>
                        <input type="text" name="character2" placeholder="character2" class="form-control" name="fname" style="width: 250px"> <br>
                

                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                        <input type="text" name="character3" placeholder="character3" class="form-control" name="fname" style="width: 250px">  <br>
                  <input type="text" name="character4" placeholder="character4" class="form-control" name="fname" style="width: 250px"> <br> 
                            
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">        
                  <input type="text" name="character5" placeholder="character5" class="form-control" name="fname" style="width: 250px"> <br>
                  <input type="text" name="character6" placeholder="character6" class="form-control" name="fname" style="width: 250px"> <br>    
                        </div>
                    </div>

                    <div class="col">
                        <div class="row">
                        <input type="text" name="character7" placeholder="character7" class="form-control" name="fname" style="width: 250px"> <br>
                  <input type="text" name="character8" placeholder="character8" class="form-control" name="fname" style="width: 250px"> <br> 


                            
                        </div>
                    </div>
                    </div>

                    <div>
                        
                  <h2>Set assignment duration</h2>
                  <label for="">Start Date</label>
                  <input type="date" name="startdate" class="form-control" name="fname" style="width: 250px">
                  <label for="">Start Time</label>
                  <input type="time" name="startTime" class="form-control" name="fname" style="width: 250px">
                  <label for="">End Time</label>
                  <input type="time" name="endTime" class="form-control" name="fname" style="width: 250px">


                    </div>

                </div>

                  
                  <button type="submit" class="btn btn-primary"  name="fname" style="width: 250px" name="createAssignment">Create Assignment</button>

                  
              </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>