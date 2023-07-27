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

// Register account
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
                $_SESSION['session_username'] = $username;
                $_SESSION['session_password'] = $hashedPassword;

                if ($ingataku == 1) {
                    $cookie_name = "cookie_username";
                    $cookie_value = $username;
                    $cookie_time = time() + (60 * 60 * 24 * 30);
                    setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                    $cookie_name = "cookie_password";
                    $cookie_value = $hashedPassword;
                    $cookie_time = time() + (60 * 60 * 24 * 30);
                    setcookie($cookie_name, $cookie_value, $cookie_time, "/");
                }
                header("location:index.php");
                exit();
            } else {
                $err .= "<li>Gagal melakukan registrasi.</li>";
            }
        }
    }
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="CSS/styles.css">
</head>

<body>
    <header class="header">
        <h1>Login dan Masuk Ke Sistem</h1>
    </header>

    <div class="container">
        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div>Login</div>
                </div>
                <div class="panel-body">
                    <?php if ($err) { ?>
                        <div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $err; ?></div>
                    <?php } ?>
                    <form id="loginform" class="form-horizontal" role="form" action="" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Username">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="ingataku" value="1" <?php if ($ingataku == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?>> Ingat Aku
                                </label>
                            </div>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <button id="btn-login" type="submit" class="btn btn-success" name="login">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container">
                <div class="content">
                <button id="expandButton">Register Akun</button>
                <div id="formSection">  
                
                <div class="panel-footer">
                    <div class="panel-heading">
                        <div>Register Account</div>
                    </div>
                    <div class="panel-body">
                        <form id="registerform" class="form-horizontal" role="form" action="" method="post">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="register-username" type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="register-password" type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    <button id="btn-register" type="submit" class="btn btn-primary" name="register">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2023 by Thoriq.</p>
    </footer>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <script>
  document.addEventListener('DOMContentLoaded', function() {
    var expandButton = document.getElementById('expandButton');
    var formSection = document.getElementById('formSection');

    formSection.style.display = 'none'; // Hide the form section initially
    expandButton.textContent = 'Register Akun'; // Set the initial button text

    expandButton.addEventListener('click', function() {
      if (formSection.style.display === 'none') {
        formSection.style.display = 'block';
        expandButton.textContent = 'Batal'; // Update button text when expanded
      } else {
        formSection.style.display = 'none';
        expandButton.textContent = 'Register Akun'; // Update button text when collapsed
      }
    });
  });
</script>
</body>

</html>
