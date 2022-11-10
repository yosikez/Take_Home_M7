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

                    <a href=""><?= $user_sesi['nama'] ?></a>

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
            </div>

            <div class="content">

                <div class="first">
                    <button class="tambah"><a href="input_bar.php">Tambah</a></button>
                    <h3>Data Barang</h3>
                    <div class="table-awal">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Harga Jual</th>
                                <th>Harga Beli</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($data->getData("bar", 10) as $dt) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $dt['product_code'] ?></td>
                                    <td><?= $dt['product'] ?></td>
                                    <td><?= $dt['harga_jual'] ?></td>
                                    <td><?= $dt['harga_beli'] ?></td>
                                    <td><?= $dt['stock'] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $dt['id_product'] ?>&r=edit">Edit</a>
                                        <a href="../config/proses.php?id=<?= $dt['id_product'] ?>&r=del">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>


        </section>




    </div>
    <script src="css/admin.js"></script>

</body>

</html>