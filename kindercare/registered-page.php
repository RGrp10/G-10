
<!DOCTYPE html>
<html lang="en">
    <head>
       <title>activation page</title>
    </head>
    
    <body>
    
        <h2>REGISTERED PUPILS TABLE</h2>
        <table>
            <thead>
            <tr>
                <th>Usercode</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>PhoneNo</th>
                <th>status</th>
                <th>togggle</th>
            </tr>
</thead>
            
             
           <tbody>
           <?php
                  
     $conn = mysqli_connect('localhost','root','','kccd');
$result = mysql_query($conn,"SELECT * FROM pupil");
while($registeredP=mysqli_fetch_array($result){
    ?>


            <tr>
            <form action="activate.php" method ="post">
                    <td><input type="text" name="usercode" value="<?php echo  $registeredP['id']?>" readonly="readonly"></td>
                    <td><?php echo $registeredP['Firstname']; ?></td>
                    <td><?php echo $registeredP['Lastname']; ?></td>
                    <td><?php echo $registeredP['phoneNo']; ?></td>
                    <?php
                        if($registeredP['status']== false){?>
                            <td><input type="text" name="status" value="Deactivated" readonly="readonly"></td>
                            <?php }?>
                        
                        <?php
                        if($registeredP['status'] == true){?>
                            <td><input type="text" name="status" value="Activated" readonly="readonly"></td>
                            <?php }?>
                            <?php
                        if($registeredP['status']== true){?>
                            <td><input type="submit" name="changeA" value="Deactivate" style="margin-left:11px;" readonly="readonly"></td>
                            <?php }?>
                         
                    

                            </form>
                    
                       </tr>
                   <?php
                           }
                           // End the While loop
                   ?>




                          
                        </tbody>           
        </table>
    </body>
</html>
