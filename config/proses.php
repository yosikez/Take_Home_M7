<?php
require_once("../config/database.php");
require_once("../config/account.php");
require_once("../config/manageData.php");

$data = new ManageData;
$user = new Account;

$user_sesi = $user->getUserSession();


if($_GET['r'] === 'del'){
    $id = $_GET['id'];
    $data->deleteData("bar", $id);
    header("location: ../view/produk.php");
}
if($_GET['r'] === 'update'){
    $id = $_POST['id_product'];
    $kode_product = $_POST['product_code'];
    $nama_product = $_POST['product'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stock = $_POST['stock'];
    $data->updateDataBar($id, $kode_product, $nama_product, $harga_jual, $harga_beli, $stock);
}
if($_GET['r'] === 'insertBar'){
    $kode_product = $_POST['product_code'];
    $nama_product = $_POST['product'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stock = $_POST['stock'];
    $data->insertDataBar($kode_product, $nama_product, $harga_jual, $harga_beli, $stock);
}
if($_GET['r']==='insertPen'){
    $order_date = $_POST['order_date'];
    $shipping_date = $_POST['shipping_date'];
    $ship_mode = $_POST['ship_mode'];
    $product_code = $_POST['product_code'];
    $quantity = $_POST['quantity'];
    $profit = $_POST['profit'];
    $shipping_cost = $_POST['shipping_cost'];
    $order_priority = $_POST['order_priority'];
    $data->insertDataPen($order_date, $shipping_date, $ship_mode, $product_code, $quantity, $profit, $shipping_cost, $order_priority);
}
if($_GET['r']==='logout'){
    $user->logout();
}
?>