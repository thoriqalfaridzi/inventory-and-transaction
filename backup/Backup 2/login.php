<?php
session_start();

include 'koneksi.php';

// Set initial variables
$err = "";
$username = "";
$ingataku = "";

if (isset($_COOKIE['cookie_username'])) {
    $cookie_username = $_COOKIE['cookie_username'];
    $cookie_password = $_COOKIE['cookie_password'];

    $sql1 = "SELECT * FROM login WHERE username = '$cookie_username'";
    $q1 = mysqli_query($conn, $sql1);
    $r1 = mysqli_fetch_array($q1);
    if ($r1['password'] == $cookie_password) {
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;
    }
}

if (isset($_SESSION['session_username'])) {
    header("location:index.php");
    exit();
}



if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ingataku = $_POST['ingataku'];

    if ($username == '' or $password == '') {
        $err .= "<li>Silakan masukkan username dan juga password.</li>";
    } else {
        $sql1 = "SELECT * FROM login WHERE username = '$username'";
        $q1 = mysqli_query($conn, $sql1);
        $r1 = mysqli_fetch_array($q1);

        if ($r1['username'] == '') {
            $err .= "<li>Username <b>$username</b> tidak tersedia.</li>";
        } elseif ($r1['password'] != md5($password)) {
            $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        }

        if (empty($err)) {
            $_SESSION['session_username'] = $username;
            $_SESSION['session_password'] = md5($password);

            if ($ingataku == 1) {
                $cookie_name = "cookie_username";
                $cookie_value = $username;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");
            }
            header("location:index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Main Web</title>
        <link rel="stylesheet" type="text/css" href="backup/login screen/style.css">
    </head>
    <body>
        <header>
            <a href="#" class="logo">Logo</a>
            <ul>
                <li><a href="#" class="active">Login</a></li>
                <li><a href="registerakun.php">Register Akun</a></li>

            </ul>
        </header>
        <section>
            <img src="image/star.png" id="star">
            <img src="image/moon.png" id="moon">
            <h2 id="text">Gudang by Thoriq</h2>
            <a href="#sec" id="btnlogin">Login</a>
            <img src="image/gudangbg.png" id="gudangbg">
        </section>
        <div class="sec" id="sec">
            <p>   
        <br><br>
        <br><br>
        <br><br>


            <h2 class="logindanmasuk">Login dan Masuk Ke Sistem</h2>

            <div class="kontenlogin">
                    <?php if ($err) { ?>
                        <div id="login-alert" class="alert-danger"><?php echo $err; ?></div>
                    <?php } ?>
                    <form id="loginform" class="form-horizontal" role="form" action="" method="post">
                        <div>
                            <input id="login-username" type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Username">
                        </div>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="ingataku" value="1" 
                                    <?php if ($ingataku == 1) {echo "checked";} ?>> 
                                    Ingat Aku
                                </label>
                            </div>
                            <div class="klikregister">
                                    <a href="registerakun.php">Tidak punya akun? klik untuk Register akun</a>
                            </div>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                                <button id="btn-login" type="submit" class="btn btn-success" name="login">Login</button>
                        </div>
                    </form>
                    <br><br>
        <br><br>
        <br><br>
            </div>

            </p>                                                                                                
            
            
        </div>
        

        <script>
            let gudangbg = document.getElementById('gudangbg');

            window.addEventListener('scroll',function(){
                let value = window.scrollY;
                star.style.left = value * 0.2 + 'px';
                moon.style.top = value * 1.05 + 'px';
                text.style.marginTop = value * 3 + 'px';
                btnlogin.style.marginTop = value * 5 + 'px';
                header.style.top = value * 0.5 + 'px';
            })
        </script>
    </body>
</html>




