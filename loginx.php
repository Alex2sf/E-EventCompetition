<?php
//menyertakan file program koneksi.php pada register
require('connect.php');
//inisialisasi session
session_start();
$error = '';
$validate = '';
//mengecek apakah sesssion username tersedia atau tidak jika tersedia maka akan diredirect ke halaman index
// if( isset($_SESSION['username']) )       header('Location: index.php');

//mengecek apakah form disubmit atau tidak
if( isset($_POST['submit']) ){
         
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($conn, $username);
         // menghilangkan backshlases
        $password = stripslashes($_POST['password']);
         //cara sederhana mengamankan dari sql injection
         
         $password = mysqli_real_escape_string($conn, $password);
        
    
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($username)) && !empty(trim($password))){
            if($username == "admin" && $password == "admin"){
                header ('Location: addadmin.php');
            }else{
            //select data berdasarkan username dari database
            $query      = "SELECT * FROM admin WHERE username_admin = '$username' AND password_admin = '$password'";
            $result     = mysqli_query($conn, $query);
            $rows       = mysqli_num_rows($result);
            if ($rows != 0) {
                // if(password_verify($password, $hash) && $_SESSION['code'] == $_POST['kodecaptcha']){
                //     // $_SESSION['username'] = $username;
                
                //     // header('Location: index.php');
                // }
                if($_SESSION['code'] == $_POST['kodecaptcha']){
                    $_SESSION['username'] = $username;                    
                    header('Location: adminhome.php');
                }else{
                    $error = 'Captcha Salah';
                }           
            //jika gagal maka akan menampilkan pesan error
            } else {
                $error =  'Register User Gagal !!';
            }
             
            }
        }else{
           echo"hshs";
        }
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

                <h1 class="text-center auth-header">Sign In</h1>
                <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>
                    <div class="form-group mb-4">
                        <label class="form-label" for="username" name="username">Username</label>
                        <input  id="username" class="form-input" type="text" name="username"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="InputPassword">Password</label>
                        <input id="InputPassword" class="form-input" type="password" name="password"/>
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
                    <button  type="submit" name="submit" class="btn mt-4 bg-success"  >Sign In</button>
                    <div class="text-center">
                        <a href="home.php" class="btn mt-2 btn-warning text-white">Kembali</a>
                    </div>
                    </form>
                </form>
            </div>


        </div>
    </main>

    <script src="assets/lib/jquery/jquery.min.js"></script>
    <script src="assets/js/index.js"></script>
</body>

</html>