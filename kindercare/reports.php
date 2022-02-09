<?php
session_start();

$conn = mysqli_connect("localhost:3306", "root", "", "kccd");
if($conn == true){

}else{
    die('Could not Connect'.mysqli_connect_error());
}

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
                    <h8>Reports</h8>
                    <form action="reports.php" method="POST">
                        <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="view" id="view">
                                <i class="fa fa-dot-circle-o"></i> View Results
                            </button></p>
                        <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="pupil" id="pupil">
                                <i class="fa fa-dot-circle-o"></i> View Pupils Details
                            </button></p>
                        <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="assign" id="assign">
                                <i class="fa fa-dot-circle-o"></i> View Assignments
                            </button></p>
                        <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="teacher" id="teacher">
                                <i class="fa fa-dot-circle-o"></i> View Teachers Details
                            </button></p>
                        <?php
                        if (isset($_POST['view'])){
                            echo "Teachers Details";
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
                            echo "Pupils Details";
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
                            <?php }?>
                        </table>
                        <?php
                        }else if (isset($_POST['assign'])){
                            echo "Assignments";
                        ?>
                        "<table border='1'>
                            <thead>

                            <tr>

                                <th>Assignment ID</th>

                                <th>Character 1</th>
                                <th>Character 2</th>
                                <th>Character 3</th>
                                <th>Character 4</th>
                                <th>Character 5</th>
                                <th>Character 6</th>
                                <th>Character 7</th>
                                <th>Character 8</th>

                                <th>Start Date</th>
                                <th>Stop Date</th>

                                <th>Start Time</th>
                                <th>Stop Time</th>

                            </tr>
                            </thead>

                            <?php

                            $conn = mysqli_connect("localhost:3306", "root", "", "kccd");

                            $sql = ("SELECT * FROM assignment");

                            //$rs = mysqli_query($conn, $sql);

                            $rs = mysqli_query($conn, $sql);

                            while($result = mysqli_fetch_array($rs))


                            { ?>

                                <tr>

                                <tr>
                                    <td><?php echo $result['assignNo']?></td>
                                    <td><?php echo $result['char1']?></td>
                                <td><?php echo $result['char2']?></td>
                                <td><?php echo $result['char3']?></td>
                                <td><?php echo $result['char4']?></td>
                                <td><?php echo $result['char5']?></td>
                                <td><?php echo $result['char6']?></td>
                                <td><?php echo $result['char7']?></td>
                                <td><?php echo $result['char8']?></td>
                                    <td><?php echo $result['startdate']?></td>
                                    <td><?php echo $result['stopdate']?></td>
                                <td><?php echo $result['startTime']?></td>
                                <td><?php echo $result['stopTime']?></td>
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