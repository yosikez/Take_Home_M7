<?php 
    require_once("database.php");
    session_start();


class Account extends Database {
    public function register($nama, $username, $email, $password){

        $hashpass = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'password' => $hashpass
        ];

        $sql = "INSERT INTO account (nama, username, email, password) VALUES (:nama, :username, :email, :password)";
        $query = $this->conn->prepare($sql);
        $query->execute($data);

        if($query){
            $response = array(
                'status' => http_response_code(201),
                'message'=> 'Created',
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Data tidak masuk',
            );
        }

        header('Content-type: aplication/json');
        echo json_encode($response);
    }

    public function login($username, $userpass){

        $sql = $this->conn->query( "SELECT * FROM account WHERE username='$username'");
        $data = $sql->fetch(PDO::FETCH_ASSOC);
    
        $hashpass = $data['password'];
        if(password_verify($userpass, $hashpass)){
            
           
            if($data['level']==='admin'){
            ?>
            <script>
                alert('login berhasil');
                window.location.href = "view/index.php";
            </script>
            <?php
            } else if ($data['level']==='kasir'){
                ?>
                <script>
                alert('login berhasil');
                window.location.href = "view/kasir.php";
                </script>
                <?php
            }
            $_SESSION['user_session'] = $data['id'];
        } else {

            ?>
            <script>
                alert('login gagal');
                window.location.href = "login.php";
            </script>
            <?php

        }

    }

    public function isLogin(){
        if(isset($_SESSION['user_session'])){
            return true;
        }
    }

    public function getUserSession(){
        if(!$this->isLogin()){
            return false;
        }

        try {
            $sql = $this->conn->prepare("SELECT * FROM account WHERE id=:id");
            $sql->bindParam(':id', $_SESSION['user_session']);
            $sql->execute();
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function logout(){
        session_destroy();

        unset($_SESSION['user_session']);
        header("location: ../login.php");
        return true;
    }

}



    $data_account = new Account;

        // if($_GET['req']==='reg'){
        //     $nama = $_POST['nama'];
        //     $username = $_POST['username'];
        //     $email = $_POST['email'];
        //     $password = $_POST['password'];

        //     $data_account->register($nama, $username, $email, $password);
        // }
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data_account->login($username, $password);
    }

?>