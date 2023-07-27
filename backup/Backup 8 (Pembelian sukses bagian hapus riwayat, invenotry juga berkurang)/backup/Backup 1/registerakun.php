<?php
// Register account
session_start();

include 'koneksi.php';
$err = '';
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if ($username == '' or $password == '') {
        $err .= "<li>Silakan masukkan username dan juga password.</li>";
    } else {
        $sql1 = "SELECT * FROM login WHERE username = '$username'";
        $q1 = mysqli_query($conn, $sql1);
        $r1 = mysqli_fetch_array($q1);

        if ($r1['username'] != '') {
            $err .= "<li>Username <b>$username</b> sudah terdaftar.</li>";
        }

        if (empty($err)) {
            // Insert the new user into the database
            $hashedPassword = md5($password);
            $sql2 = "INSERT INTO login (username, password) VALUES ('$username', '$hashedPassword')";
            $q2 = mysqli_query($conn, $sql2);

            if ($q2) {
                header("location:login.php");
                exit();
            } else {
                $err .= "<li>Gagal melakukan registrasi.</li>";
            }
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
                <li><a href="login.php" >Login</a></li>
                <li><a href="registerakun.php"class="active-reg">Register Akun</a></li>

            </ul>
        </header>
        <section>
            <img src="image/star.png" id="star">
            <img src="image/moon.png" id="moon">
            <h2 id="text">Gudang by Thoriq</h2>
            <a href="#sec" id="btnlogin">Daftar Akun</a>
            <img src="image/gudangbg.png" id="gudangbg">
        </section>
        <div class="sec" id="sec">
            <p>   
        <br><br>
        <br><br>
        <br><br>


            <h2 class="logindanmasuk">Registrasi Akun baru disini</h2>

            <div class="kontenlogin">
            <?php if ($err) { ?>
                        <div id="login-alert" class="alert-danger"><?php echo $err; ?></div>
                    <?php } ?>
                    <form id="loginform" class="form-horizontal" role="form" action="" method="post">
                        <div>
                            <input id="login-username" type="text" class="form-control" name="username"  placeholder="Username">
                        </div>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group">

                            <div class="klikregister">
                                    <a href="login.php">Punya akun? klik untuk login</a>
                            </div>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                                <button id="btn-register" type="submit" class="btn-register" name="register">Register</button>
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
