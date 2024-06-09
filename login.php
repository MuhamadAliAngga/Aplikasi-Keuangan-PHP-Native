<?php 
session_start();

include 'koneksi.php';
//atur variabel
$err        = "";
$username   = "";
$ingataku   = "";

if(isset($_COOKIE['cookie_username'])){
    $cookie_username = $_COOKIE['cookie_username'];
    $cookie_password = $_COOKIE['cookie_password'];

    $sql1 = "select * from login where username = '$cookie_username'";
    $q1   = mysqli_query($koneksi,$sql1);
    $r1   = mysqli_fetch_array($q1);
    if($r1['password'] == $cookie_password){
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;
        $_SESSION['level'] = $r1; ['level'];
    }
}

if(isset($_SESSION['session_username'])){
    header("location:index.php");
    exit();
}

if(isset($_POST['login'])){
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    

    if($username == '' or $password == ''){
        $err .= "<li>Silakan masukkan username dan juga password.</li>";
    }else{
        $sql1 = "select * from login where username = '$username'";
        $q1   = mysqli_query($koneksi,$sql1);
        $r1   = mysqli_fetch_array($q1);

        if(empty($r1['username'])){
            $err .= "<li>Username <b>$username</b> tidak terdaftar.</li>";
        }else if($r1['password'] != md5($password)){
            $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        }       
        
        if(empty($err)){
            $_SESSION['session_username'] = $username; //server
            $_SESSION['session_password'] = md5($password);
            $_SESSION['level'] = $r1['level'];

            if($ingataku == 1){
                $cookie_name = "cookie_username";
                $cookie_value = $username;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");
            }
            if ($_SESSION['level'] == 0) {
                header("location: index.php");
            } elseif ($_SESSION['level'] == 1) {
                // Level 1 bisa diarahkan ke halaman tertentu jika perlu
                header("location: index.php");
            } elseif ($_SESSION['level'] == 2) {
                // Level 2 bisa diarahkan ke halaman tertentu jika perlu
                header("location: index.php");
            }
            elseif ($_SESSION['level'] == 3) {
                // Level 1 bisa diarahkan ke halaman tertentu jika perlu
                header("location: index.php");
            }elseif ($_SESSION['level'] == 4) {
                // Level 1 bisa diarahkan ke halaman tertentu jika perlu
                header("location: index.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<style>

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 1vh;
    background: url('pict3.jpg') no-repeat;
    background-size: cover;
    background-position: center;}

.panel.panel-info {
background-color: transparent; /* Biru */
width: 350px;
    background: transparent;
    border: 2px solid rgba(225, 225, 225, .2);
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(225, 225, 225, .2);
    color: #fff;
    border-radius: 10px;
    padding: 3px, 4px;
    margin: auto;
    background-position : center;
 }


</style>
<body>
<div class="container my-4">    
    <div id="loginbox" style="margin-top:5
    0px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Login dan Masuk Ke Sistem</div>
            </div>      
            <div style="padding-top:30px" class="panel-body" >
                <?php if($err){ ?>
                    <div id="login-alert" class="alert alert-danger col-sm-12">
                        <ul><?php echo $err ?></ul>
                    </div>
                <?php } ?>                
                <form id="loginform" class="form-horizontal" action="" method="post" role="form">       
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" value="<?php echo $username ?>" placeholder="masukan username terlebih dahulu">                                        
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="masukan password terlebih dahulu">
                    </div>
                    <div class="input-group">
                        <div class="checkbox">
                        <label>
                            <input id="login-remember" type="checkbox" name="ingataku" value="1" <?php if($ingataku == '1') echo "checked"?>> Ingat Saya
                        </label>
                        </div>
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <input type="submit" name="login" class="btn btn-success" value="Login"/>
                        </div>
                    </div>
                </form>    
            </div>                     
        </div>  
    </div>
</div>
</body>
</html>