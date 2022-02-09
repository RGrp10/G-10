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
                    <h1>pupil results</h1>

                    <form action="results.php" method="POST">
                        <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="view" id="view">
                                <i class="fa fa-dot-circle-o"></i> View Results
                            </button></p>
                        <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="pupil" id="pupil">
                                <i class="fa fa-dot-circle-o"></i> View Pupil's Details
                            </button></p>
                <?php
                if (isset($_POST['view'])){
                    ?>
                        <table border="1"  >
                            <thead>
                             <tr>
                            <th>First Name</th>

                            <th>Last Name</th>

                            <th>Username</th>

                        </tr>
                            </thead>
                <?php

                $conn = mysqli_connect("localhost:3306", "root", "", "kccd");

                    $sql = ("SELECT pupil.*,teachers.* FROM pupil, teachers");

                  //$rs = mysqli_query($conn, $sql);

                $rs = mysqli_query($conn, $sql);


                while($result= mysqli_fetch_array($rs)){

                ?>

                           <tr>
                            <td><?php echo $result['fname']?></td>
                            <td><?php echo $result['lname']?></td>
                            <td><?php echo $result['username']?></td>
                            <td><a href="addcomment.php">Comment</a></td>
                            </tr>




            <?php  }  ?>
                    </table>
                        <?php
                }else if (isset($_POST['pupil'])){
                        ?>
                     "<table border='1'>
                            <thead>

                        <tr>

                            <th>Usercode</th>

                            <th>First Name</th>

                            <th>Last Name</th>

                            <th>Phone Number</th>

                        </tr>
                            </thead>

                            <?php

                                $conn = mysqli_connect("localhost:3306", "root", "", "kccd");

                                $sql = ("SELECT pupil.*,teachers.* FROM pupil, teachers");

                                //$rs = mysqli_query($conn, $sql);

                                $rs = mysqli_query($conn, $sql);

                            while($result = mysqli_fetch_array($rs))


                        { ?>

                        <tr>

                            <tr>
                                <td><?php echo $result['usercode']?></td>
                                <td><?php echo $result['firstname']?></td>
                                <td><?php echo $result['lastname']?></td>
                            </tr>
                       <?php }}?>
                        </table>


                </form>
            </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>