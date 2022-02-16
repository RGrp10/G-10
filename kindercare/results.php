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
                <a href="deactivate.php"class="dashboard-nav-item"><i class="fa fa-line-chart" aria-hidden="true"></i>Activate</a>

                <a
                    href="logout.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
        </nav>
    </div>
    <div class='dashboard-app'>
        <header class='dashboard-toolbar'><h5>Welcome <?php echo $_SESSION['Username']; ?></h5></header>
        <div class='container'>

            <!-- content area -->

            <div>
                <div>
                    <h1>pupil results</h1>

                   
                        <table class="table"  >
                            <thead>
                             <tr>
                            <th>Usercode</th>

                            <th>AssignmentID</th>

                            <th>Score</th>
                                 <th>Comment</th>

                        </tr>
                            </thead>
                <?php

                $conn = mysqli_connect("localhost", "root", "", "kccd");
                //$username = $_SESSION['Username'];

                    $sql = ("SELECT Usercode, assignNo, score, comment FROM results");

                  //$rs = mysqli_query($conn, $sql);

                $rs = mysqli_query($conn, $sql);


                while($result= mysqli_fetch_array($rs)){

                ?>

                           <tr>
                            <td><?php echo $result['Usercode']?></td>
                            <td><?php echo $result['assignNo']?></td>
                            <td><?php echo $result['score']?></td>
                            <td><?php echo $result['comment']?>
                             
                              <?php }?>

                               

                              
                               
                               </td>
                            </tr>
                               




                    </table>



                    <form action="results.php" method="post">
                                      <td>Enter Usercode</td>
                                       <input type="text" name="Usercode">
                                       <td>Enter AssignmentID</td>
                                       <input type="text" name="assignNo">
                                       <td>Add Comment</td>
                                       <input type="text" name="comment">

                                       <button type="submit" class="btn btn-dark btn-sm" name="CommentUpdate" >
                                           <i class="fa fa-dot-circle-o"></i>Add Comment
                                       </button>
                                   </form>
                               <?php

                               
                               if (isset($_POST['CommentUpdate'])) {
                                   $usercode = $_POST['Usercode'];
                                   $comment = $_POST['comment'];
                                   $assignNo = $_POST['assignNo'];

                                   $conn = mysqli_connect("localhost:3306", "root", "", "kccd");

                                   $sql = "UPDATE results  SET comment = '$comment' WHERE Usercode = '$usercode' && assignNo = '$assignNo'";
                                  

                                   if ($conn->query($sql) === TRUE) {
                                    
                                   
                                
                                }

                                   } ?>

            </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
