<?php
include '../config/koneksi.php';

if(isset($_SESSION['username'])){
    header ("Location: .$base_url.");
} else {

?>

<html>
    <head>
        
        <title>Assyifa Hospital - Login</title>

        <!-- favicon-->
        <link rel="icon" href="<?=base_url('assets/icon/hospital.png');?>">

        <!-- Bootstrap-->
        <link href="<?=base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
    </head>
    <body>
        <?php

        if(isset($_POST['login'])){

            $username = $_POST['username'];
            $password = SHA1($_POST['password']);
    
            $query_cek = mysqli_query ($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'") or die (mysqli_errno($koneksi));

            if(mysqli_num_rows($query_cek) == 0){
                echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
            } else {
                $_SESSION['username'] = $username;
                header ("Location: .$base_url.");
            }
        }



        ?>
        <div id="wrapper">
            <div class="container">
                <div align="center" style="margin-top:200px;">
                    <form action="" method="post" class="navbar-form">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="input-group">
                            <input type="submit" name="login" class="btn btn-success btn-sm btn-block" value="   Login  ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

}

?>