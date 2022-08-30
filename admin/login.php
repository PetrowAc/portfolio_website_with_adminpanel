<?php
    $css_version = 1.07;
    $js_version = 1.07;

    session_start();

    if(isset($_SESSION['username']) && isset($_SESSION['userTime'])) {
        header("location: /admin");
    } else {
        if(isset($_POST['loginSubmit'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
    
            if ($username&&$password) {
                include '../config/db_config.php';
              
                $query = $db->query("SELECT id FROM users WHERE username = '$username' and password = '$password'");
                
                if ($query->num_rows!=0){
                    $_SESSION['username'] = $username;
                    $_SESSION['userTime'] = time();

                    header("location: /admin");
                }else{
                    $loginFail = true;
                }

                $db->close();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petrov Adrián - LogIn</title>
    <!-- <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" /> -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" /> -->
    <!-- <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/ck.min.css"> -->

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--==================== SWIPER CSS ====================-->
    <!-- <link rel="stylesheet" href=""> -->

    <link rel="stylesheet" href="../css/admin.min.css?v=<?php echo $css_version; ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
    <body id="admin">
        
        <div class="main-login">
            <div class="main-login__container">
                <div class="main-login__container-column main-login__container-column--img">
                    <img src="../images/admin_bg.png">
                </div> 
                <div class="main-login__container-column">
                    <form action="/admin/login" class="form" method="POST">
                        <div class="form__title">ColvisCode.</div>
                        <div class="form__subtitle">Admin panel</div>
                        <div class="form__alert <?php if(isset($loginFail)){echo "form__alert--active"; unset($loginFail);}?>">The username or password is incorrect!</div>
                        <div class="form__inputs">
                            <div class="form__label">Username</div>
                            <input type="text" class="form__input" name="username" required>
                        </div>
                        <div class="form__inputs">
                            <div class="form__label">Password</div>
                            <input type="password" class="form__input" name="password" required>
                        </div>

                        <div class="form__inputs form__inputs--button">
                            <button class="button" name="loginSubmit">LogIn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <script src="../js/plugins.js?v=<?php echo $js_version; ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
        <script src="../js/main.js?v=<?php echo $js_version; ?>"></script>
    </body>
</html>