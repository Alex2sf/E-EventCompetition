<?php
//menyertakan file program koneksi.php pada register
require('connect.php');
//inisialisasi session
session_start();
$error = '';
$validate = '';
$erroru = '';
$validates = '';
//mengecek apakah sesssion username tersedia atau tidak jika tersedia maka akan diredirect ke halaman index
// if( isset($_SESSION['username']) )       header('Location: index.php');

//mengecek apakah form disubmit atau tidak
if(isset($_POST['submit']) ){
         
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($conn, $username);
         // menghilangkan backshlases
        $password = stripslashes($_POST['password']);
         //cara sederhana mengamankan dari sql injection
        $password = mysqli_real_escape_string($conn, $password);
        
        $repassword = stripslashes($_POST['repassword']);
        
        $repassword = mysqli_real_escape_string($conn, $repassword);
    
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($username)) && !empty(trim($password)) && !empty(trim($repassword))){
            //select data berdasarkan username dari database
            if($password ==$repassword){
                if($_SESSION["code"] == $_POST['kodecaptcha']){
                        if(cek_nama($username,$conn)==0){
                            // $pass=password_hash($password,PASSWORD_DEFAULT);
                            // $query="INSERT INTO admin (username_admin,password_admin) VALUES ('$username','$pass')";
                            $query="INSERT INTO admin (username_admin,password_admin) VALUES ('$username','$password')";
                            $result = mysqli_query($conn,$query);                        
                                if($result){
                                header('Location: loginx.php');
                        } else {
                            $error='Register gagal';
                        }                      
                    } else {
                        $erroru='Username sudah terdaftar';
                    }
                }else{
                    $validates= 'kode captcha salah';
                    
                }
            }else{
                $validate ='Password tidak sama!!';
            }
        }else{
           $error ='Data tidak boleh kosong';
        }
    }
    function cek_nama($username,$conn){
        $nama =mysqli_real_escape_string($conn,$username);
        $query="Select * FROM admin WHERE username_admin='$username'";
        if($result = mysqli_query($conn,$query)) return mysqli_num_rows($result);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Login</title>

    <!-- Libraries css -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css" />

    <!-- Custom css-->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

    <main class="d-flex justify-content-center align-items-center parent-container">
        <div class="inner-container">
            <!-- logo -->
            <div class="logo-container">
                <img src="assets/img/logo.png" alt="logo" class="img-fluid" width="180" id="logo" />
            </div>
    

            <!-- form-->
            <div class="auth-container mt-5" >
                <form class="form-container" method="POST">
                <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                <?php } ?>
                <h1 class="text-center auth-header">Add New Admin</h1>                
                    <div class="form-group mb-4">
                        <label class="form-label" for="username" name="username">Username</label>
                        <input  id="username" class="form-input" type="text" name="username"/>
                        <?php if($erroru != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="InputPassword">Password</label>
                        <input id="InputPassword" class="form-input" type="password" name="password"/>
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="InputPassword2">Re-type password</label>
                        <input id="InputPassword2" class="form-input" type="password" name="repassword"/>
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <div class="text-center">
                        <div class="form-group">
                            <img src="captcha.php" alt="gambar" />
                        </div>
                        <div class="form-group">
                            <input class="input-submit" name="kodecaptcha" value="" maxlength="5" />
                        </div>
                    </div>                    
                        <button class="btn btn-success mt-2" type="submit" name="submit" >Register</button>        
                </form>
            </div>


        </div>
    </main>

    <script src="assets/lib/jquery/jquery.min.js"></script>
    <script src="assets/js/index.js"></script>
</body>

</html>