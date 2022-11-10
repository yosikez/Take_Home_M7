<?php 
    require_once("database.php");
    require('fpdf.php');

    class ManageData extends Database {


        public function getData($tb, $limit) {
        
            $query = $this->conn->query("SELECT * FROM $tb LIMIT $limit ");
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
    
        }
        

        public function getJoin($limit){
            $query = $this->conn->query("select pen.*, bar.product from pen inner join bar on pen.product_code = bar.product_code limit $limit");
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        }

        public function getDataPen() {
        
            $query = $this->conn->query("SELECT * FROM pen GROUP BY order_id DESC LIMIT 10 ");
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
    
        }

        public function getDataChr() {
        
            $query = $this->conn->query("SELECT product_code, SUM(quantity) as sum_quan, SUM(profit) as sum_profit FROM pen GROUP BY product_code");
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
    
        }

        public function getDataSingle($tb, $field){
            $query = $this->conn->query("SELECT $field FROM $tb");
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        }

        public function deleteData($tb, $id){
            $sql = "DELETE FROM $tb WHERE id_product=$id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            header("location: ../view/produk.php");
        }

        public function viewEdit($id){
            $query = $this->conn->query("SELECT * FROM bar WHERE id_product=$id");
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            };

            return $data;
        }

        public function updateDataBar($id, $kode_product, $nama_product, $harga_jual, $harga_beli, $stock){
            $query = $this->conn->query("UPDATE bar SET product_code='$kode_product', product='$nama_product', harga_jual='$harga_jual', harga_beli='$harga_beli', stock='$stock' WHERE id_product='$id'");
            header("location: ../view/produk.php");
        }

        public function insertDataBar($kode_product, $nama_product, $harga_jual, $harga_beli, $stock){
            $query = $this->conn->query("INSERT INTO bar (id_product, product_code, product, harga_jual, harga_beli, stock) VALUES ('', '$kode_product', '$nama_product', '$harga_jual', '$harga_beli', '$stock')");
            header("location: ../view/produk.php");
        }

        public function insertDataPen($order_date, $shipping_date, $ship_mode, $product_code, $quantity, $profit, $shipping_cost, $order_priority){
            $query =  $this->conn->query("INSERT INTO pen (order_id, order_date, shipping_date, ship_mode, product_code, quantity, profit, shipping_cost, order_priority) VALUES ('','$order_date', '$shipping_date', '$ship_mode', '$product_code', '$quantity', '$profit', '$shipping_cost', '$order_priority')");
            header("location: ../view/kasir.php");
        }

        public function avgSell(){
            $query = $this->conn->query("SELECT AVG(quantity) AS avg_all FROM pen");
            return $query;
        }
    }
















?>