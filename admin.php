<?php 
    require_once("config/database.php");
    require_once("config/account.php");

    $data = new ManageData;
    $user = new Account;
    
    $user_sesi = $user->getUserSession();
?>


<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style2.css">

</head>
<body>

    <!-- <h1>Selamat Datang Di Dasboard Admin <?= $user_sesi['username']?></h1> -->


        <nav>
            
            
            <div class="menu-toggle">
                <input type="checkbox">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="">Porfile</a></li>
            </ul>
            
            <div class="brand">
                <h4>Profile</h4>
            </div>
        </nav>


    <!-- <section id="sidebar">
        <div class="sidebar">
        <ul>
            <li><a href="">Dashboard</a></li>
            <li><a href="">Order</a></li>
            <li><a href="">Produk</a></li>
            <li><a href="">Customer</a></li>
            <li><a href="">Report</a></li>
        </ul>        
        </div>
    </section> -->


    <table border="1">
        <tr>
            <td>nomor</td>
            <td>username</td>
            <td>email</td>
        </tr>
        <?php 
        $no = 1;
        foreach($data->getData() as $dt):
        ?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $dt['username']?></td>
            <td><?= $dt['email']?></td>
        </tr>
        <?php endforeach; ?>
    </table>


    <script src="admin.js"></script>
</body>
</html>