<?php
require_once("../config/database.php");
require_once("../config/account.php");
require_once("../config/manageData.php");

$data = new ManageData;
$user = new Account;

$user_sesi = $user->getUserSession();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>

    <div class="container">

        <div class="nav-header">
            <div class=sidebar-toggle>
                <input type="checkbox">
                <span></span>
                <span></span>
                <span></span>
            </div>


            <nav class="navbar">
                <div class="brand">
                    <a href="">DASHBOARD</a>
                </div>

                <div class="dropdown">

                    <a href=""><?=$user_sesi['nama']?></a>

                    <div class="dropdown-content">
                        <a href="../login.php">Log Out</a>
                    </div>
                </div>
            </nav>
        </div>


        <section class="container-content">
            <div class="sidebar">
                <div class="menu-sidebar">
                    <div class="icon">
                        <box-icon name='spreadsheet' color="white"></box-icon>
                    </div>
                    <a href="">Riwayat Penjualan</a>
                </div>
                <div class="menu-sidebar">
                    <div class="icon">
                        <box-icon name='cart' color="white"></box-icon>
                    </div>
                    <a href="input_pem.php">Input Produk</a>
                </div>
                
            </div>

            <div class="content">
                <div class="first">
                    <button class="tambah"><a href="../config/pdf.php">Cetak Laporan</a></button>
                    <h3>Penjualan</h3>
                    <div class="table-awal">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Order Date</th>
                                <th>Shipping Date</th>
                                <th>Ship Mode</th>
                                <th>Product Code</th>
                                <th>Quantity</th>
                                <th>Profit</th>
                                <th>Shipping Cost</th>
                                <th>Order Priority</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($data->getDataPen() as $dt) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $dt['order_date'] ?></td>
                                    <td><?= $dt['shipping_date'] ?></td>
                                    <td><?= $dt['ship_mode'] ?></td>
                                    <td><?= $dt['product_code'] ?></td>
                                    <td><?= $dt['quantity'] ?></td>
                                    <td>$ <?= $dt['profit'] ?></td>
                                    <td>$ <?= $dt['shipping_cost'] ?></td>
                                    <td><?= $dt['order_priority'] ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>


        <script src="css/admin.js"></script>

    </div>
</body>

</html>