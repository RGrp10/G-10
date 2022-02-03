<?php 
$assignNo= $_POST['assignNo'];
$char1= $_POST['character1'];
$char2= $_POST['character2'];
$char3= $_POST['character3'];
$char4= $_POST['character4'];
$char5= $_POST['character5'];
$char6= $_POST['character6'];
$char7= $_POST['character7'];
$char8= $_POST['character8'];
$startdate= $_POST['startdate'];
$startTime=$_POST['startTime'];
$endTime=$_POST['endTime'];
$closedate= $_POST['closedate'];

$con=new mysqli('localhost', 'root', '', 'kccd');
if (!$con){
    echo "Problem connecting the database.";
}

$qry="INSERT INTO `assignment`(`assignNo`, `char1`, `char2`, `char3`, `char4`, `char5`, `char6`, `char7`, `char8`, `startdate`, `startTime`, `endTime`, `closedate`) VALUES ('$assignNo','$char1','$char2','$char3','$char4','$char5','$char6','$char7','$char8','$startdate','$startTime','$endTime','$closedate')";

if($con->query($qry)===TRUE){
    echo "Data inserted";
}
else{
    echo "Problem while inserting data";
}
?>