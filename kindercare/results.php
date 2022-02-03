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
                <form action="results.php" method="post">
                <?php

                $conn = mysqli_connect("localhost:3306", "root", "", "kccd");
                if($conn == true){

                }else{
                    die('Could not Connect'.mysqli_connect_error());
                }
                $qry = "SELECT * from pupil";
                $rs = mysqli_query($conn, $qry);
                while($dt = mysqli_fetch_array($rs)){

                ?>
                    <tr>

                        <td width="5%"><a href="results.php?stok_kodu=<?php echo $stok_kodu2;?>&sat_fatura_no=<?php echo $sat_fatura_no;?>">
                                <button class="btn btn-mini btn-danger  input1">Sil</button></a></td>

                        <td width="25%"><input class="input1" type="hidden" name="sth_stok_kod[]" value="<?php echo $stok_kodu2;?>" readonly><?php echo $urun_isim;?></td>

                        <td width="10%"><input style="text-align:center" class="input1" type="text" name="sth_adet[]" value="" required></td>

                        <td width="10%"><select style="margin: 0 !important; padding: 0 !important; width:100%" name="sth_birim[]" required>
                                <option value="" selected>Seçiniz</option>
                                <?php $brim2_bul = mysql_query("SELECT * FROM birimler");
                                while($brim2_cek = mysql_fetch_array($brim2_bul)){ ?>
                                    <option value="<?php echo $brim2_cek["birim_id"];?>"><?php echo $brim2_cek["birim_isim"];?></option>
                                <?php } ?>
                            </select></td>

                        <td width="10%">
                            <input class="input1" type="text" id="sth_birim_fiyat" name="sth_birim_fiyat[]" required>
                        </td>

                        <td width="10%">
                            <select style="margin: 0 !important; padding: 0 !important; width:100%" name="sth_kdv" required>
                                <option value="<?php echo $stok_vergisi; ?>" selected><?php echo $stok_vergisi; ?></option>
                                <?php $kdv2_bul = mysql_query("SELECT * FROM kdvler");
                                while($kdv2_cek = mysql_fetch_array($kdv2_bul)){ ?>
                                    <option value="<?php echo $kdv2_cek['kdv_isim'];?>"><?php echo $kdv2_cek['kdv_isim'];?></option>
                                <?php } ?>
                            </select>
                        </td>

                        <td width="10%">
                            <input class="input1" type="text" id="sth_iskonto1" name="sth_iskonto1[]" required>
                        </td>

                        <td width="10%">
                            <input class="input1" type="text" id="sth_iskonto2" name="sth_iskonto2[]" required>
                        </td>

                        <td width="10%">
                            <input class="input1" type="text" id="sth_tutar" name="sth_tutar[]" required>
                        </td>
                    </tr>
                    <br><br>

                    <table>
                        <tr>
                            <td> Usercode. : </td>
                            <td><input type="text" name="usercode" value=" <?php echo $dt['usercode']; ?>" readonly="readonly"></td>
                        </tr>
                        <tr>
                            <td> First Name :  </td>
                            <td> <?php echo $dt['firstname']; ?> </td>
                        </tr>
                        <tr>
                            <td> Last Name:  </td>
                            <td> <?php echo $dt['lastname']; ?></td>
                        </tr>
                        <tr>
                            <td> Phone Number:  </td>
                            <td> <?php echo $dt['phone']; ?></td>
                        </tr>



                    </table>
                    <?php }?>
                </form>
            </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>