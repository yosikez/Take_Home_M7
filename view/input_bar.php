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

                    <a href=""><?=$user_sesi['nama']?></a>

                    <div class="dropdown-content">
                        <a href="">Detail</a>
                        <a href="">Log Out</a>
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
                    <a href="index.php">Main</a>
                </div>
                <div class="menu-sidebar">
                    <div class="icon">
                        <box-icon name='spreadsheet' color="white"></box-icon>
                    </div>
                    <a href="">Order</a>
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
            </div>

            <div class="content">
                
                <div class="first">
                    <form action="../config/proses.php?r=insertBar" method="post">
                        <table id="table-update">
                            <tr>
                                <td>Kode Produk</td>
                                <td>:</td>
                                <td>
                                    <input type="hidden" name="id_product" >
                                    <input type="text" name="product_code" >
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Produk</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="product" >
                                </td>
                            </tr>
                            <tr>
                                <td>Harga Jual</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="harga_jual" >
                                </td>
                            </tr>
                            <tr>
                                <td>Harga Beli</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="harga_beli" ">
                                </td>
                            </tr>
                            <tr>
                                <td>Stok Barang</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="stock" >
                                </td>
                              </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="submit" id="submit" >Simpan</button>
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