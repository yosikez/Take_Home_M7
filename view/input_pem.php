<?php
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
    <title>Edit</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/edit.css">

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

                    <a href=""><?= $user_sesi['nama'] ?></a>

                    <div class="dropdown-content">
                        <a href="">Detail</a>
                        <a href="../login.php">Log Out</a>
                    </div>
                </div>
            </nav>
        </div>


        <section class="container-content">
            <div class="sidebar">
                <?php if ($user_sesi['level'] === 'kasir') { ?>
                    <div class="menu-sidebar">
                        <div class="icon">
                            <box-icon name='spreadsheet' color="white"></box-icon>
                        </div>
                        <a href="kasir.php">Riwayat Penjualan</a>
                    </div>
                    <div class="menu-sidebar">
                        <div class="icon">
                            <box-icon name='cart' color="white"></box-icon>
                        </div>
                        <a href="input_pem.php">Input Penjualan</a>
                    </div>
                <?php }
                if ($user_sesi['level'] === 'admin') {
                ?>
                    <div class="menu-sidebar">
                        <div class="icon">
                            <box-icon name='spreadsheet' color="white"></box-icon>
                        </div>
                        <a href="index.php">Order</a>
                    </div>
                    <div class="menu-sidebar">
                        <div class="icon">
                            <box-icon name='cart' color="white"></box-icon>
                        </div>
                        <a href="produk.php">Produk</a>
                    </div>
                    <div class="menu-sidebar">
                        <div class="icon">
                            <box-icon type='solid' name='user-account' color="white"></box-icon>
                        </div>
                        <a href="customer.php">Customer</a>
                    </div>
                    <div class="menu-sidebar">
                        <div class="icon">
                            <box-icon name='bar-chart' color="white"></box-icon>
                        </div>
                        <a href="report.php">Report</a>
                    </div>
                <?php } ?>
            </div>

            <div class="content">

                <div class="first">
                    <form action="../config/proses.php?r=insertPen" method="post">
                        <table id="table-update">
                            <tr>
                                <td>Tanggal Order</td>
                                <td>:</td>
                                <td>
                                    <input type="hidden" name="order_id">
                                    <input type="text" name="order_date">
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Pengiriman</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="shipping_date">
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Pengiriman</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="ship_mode">
                                </td>
                            </tr>
                            <tr>
                                <td>Kode Product</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="product_code" ">
                                </td>
                            </tr>
                            <tr>
                                <td>Quantitas</td>
                                <td>:</td>
                                <td>
                                    <input type=" text" name="quantity">
                                </td>
                            </tr>
                            <tr>
                                <td>Profit</td>
                                <td>:</td>
                                <td>
                                    <input type=" text" name="profit">
                                </td>
                            </tr>
                            <tr>
                                <td>Biaya Pengiriman</td>
                                <td>:</td>
                                <td>
                                    <input type=" text" name="shipping_cost">
                                </td>
                            </tr>
                            <tr>
                                <td>Prioritas Order</td>
                                <td>:</td>
                                <td>
                                    <input type=" text" name="order_priority">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="submit" id="submit">Simpan</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>

        </section>




    </div>
    <script src="css/admin.js"></script>

</body>

</html>