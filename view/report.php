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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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

            <div class="main">
                <div class="report">
                    <h1>Report Singkat</h1>
                    <div class="card-wrap">

                        <div class="profit">
                            <div class="card">

                                <box-icon name='candles' color="white" class="icon3"></box-icon>
                                <h3>Profit</h3>
                                <?php
                                $profit = 0;
                                foreach ($data->getDataSingle("pen", "profit") as $pr) :

                                    $profit += $pr['profit'];

                                endforeach; ?>
                                <h2><?= $profit ?></h2>
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="card">
                                <box-icon type='solid' name='coin-stack' class="icon3" color="white"></box-icon>
                                <h3>Quantity Out</h3>
                                <?php
                                $quantity = 0;
                                foreach ($data->getDataSingle("pen", "quantity") as $qnty) :

                                    $quantity += $qnty['quantity'];

                                endforeach; ?>
                                <h2><?= $quantity ?></h2>
                            </div>
                        </div>

                        <div class="customer">
                            <div class="card">
                                <box-icon type='solid' name='user-check' class="icon3 bx-lg" color="white"></box-icon>
                                <h3>Customer</h3>
                                <?php
                                $customer = 0;
                                foreach ($data->getData("cus", 199) as $cus) {

                                    $customer++;
                                } ?>
                                <h2><?= $customer ?></h2>
                            </div>
                        </div>

                        <div class="shipping_cost">
                            <div class="card">
                                <box-icon name='dollar-circle' color="white" class="icon3"></box-icon>
                                <h3>Shipping Cost</h3>
                                <?php
                                $quantity = 0;
                                foreach ($data->getDataSingle("pen", "shipping_cost") as $shpc) :

                                    $quantity += $shpc['shipping_cost'];

                                endforeach; ?>
                                <h2><?= $quantity ?></h2>
                            </div>
                        </div>
                        <div class="stock_all_product">
                            <div class="card">
                                <box-icon type='solid' name='coin-stack' class="icon3" color="white"></box-icon>
                                <h3>Stock All Product</h3>
                                <?php
                                $quantity = 0;
                                foreach ($data->getDataSingle("bar", "stock") as $stc) :

                                    $quantity += $stc['stock'];

                                endforeach; ?>
                                <h2><?= $quantity ?></h2>
                            </div>
                        </div>
                        <div class="avg_sell">
                            <div class="card">
                                <box-icon type='solid' name='coin-stack' class="icon3" color="white"></box-icon>
                                <h3>Average Sales</h3>
                                <?php
                                $quantity = 0;
                                foreach ($data->avgSell() as $avg) :

                                    $quantity += $avg['avg_all'];

                                endforeach; ?>
                                <h2><?= $quantity ?></h2>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="chart">
                    <h2>Jumlah Penjualan</h2>
                    <div class="chr">
                        <div class="table-awal data-chart">
                            <table>
                                <tr>
                                    <th>No</th>
                                    <th>Product Code</th>
                                    <th>Profit</th>
                                    <th>Quantity</th>
                                </tr>
                                <?php
                                $no = 1;
                                foreach ($data->getDataChr() as $dt) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $dt['product_code'] ?></td>
                                        <td><?= $dt['sum_profit'] ?></td>
                                        <td><?= $dt['sum_quan'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <div class="mych">
                            <canvas id="myChart"></canvas>
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </section>





    </div>
    <script src="css/admin.js"></script>
    <script>
        <?php foreach ($data->getDataChr() as $dt) {
            $label[] = $dt['product_code'];
            $dtcq[] = $dt['sum_quan'];
            $dtcp[] = $dt['sum_profit'];
        };
        $jlabel = json_encode($label);
        $jdtc = json_encode($dtcq);
        $jdtcp = json_encode($dtcp);
        ?>

        function chart1() {
            const labels = <?= $jlabel; ?>;

            const data = {
                labels: labels,

                datasets: [{
                    label: 'Out Quantity',
                    backgroundColor: '#1F8EF1',
                    borderColor: '#1F8EF1',
                    data: <?= $jdtc; ?>,
                }]
            };
            const config = {
                type: 'line',
                data: data,
                options: {
                    scales: {
                        y: {
                            ticks: {
                                color: 'white'
                            },
                            grid: {
                                color: '',
                                tickWidth: 0
                            }
                        },
                        x: {
                            ticks: {
                                color: 'white'
                            },
                            grid: {
                                color: '#253D64',
                                tickWidth: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                boxWidth: 0,
                                color: 'white'
                            },
                        },
                    }
                }
            };
            const myChart = new Chart(
                document.getElementById('myChart'),

                config
            );
        };

        function chart2() {
            const labels = <?= $jlabel; ?>;

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Profit',
                    backgroundColor: '#00D6B4',
                    borderColor: '#00D6B4',
                    color: 'white',
                    data: <?= $jdtcp; ?>,
                }]
            };
            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            ticks: {
                                color: 'white'
                            },
                            grid: {
                                color: '#243E4B'
                            }
                        },
                        x: {
                            ticks: {
                                color: 'white'
                            },
                            grid: {
                                color: ''
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                boxWidth: 0,
                                color: 'white'
                            },
                        },
                    }
                }
            };
            const myChart = new Chart(
                document.getElementById('myChart2'),
                config
            );
        };


        chart1();
        chart2();
    </script>

</body>

</html>