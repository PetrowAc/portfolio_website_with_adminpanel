<?php
    $css_version = 1.07;
    $js_version = 1.07;

    session_start();

    if(isset($_SESSION['username']) && isset($_SESSION['userTime'])) {
        if((time() - $_SESSION['userTime']) > 3600) {
            unset($_SESSION['username']); header("location: /admin");
        } else {
            $username = $_SESSION['username'];
            $_SESSION['userTime'] = time();
        }
    } else {
        header("location: /admin/login");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petrov Adrián - <?php echo $headTitle; ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicons/favicon-16x16.png">
    <link rel="manifest" href="../images/favicons/site.webmanifest">
    <link rel="mask-icon" href="../images/favicons/safari-pinned-tab.svg" color="#576ee0">
    <link rel="shortcut icon" href="../images/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="../images/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
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
    <header class="header" id="admin-header">
        <div class="header__logo">ColvisCode.</div>
        <div class="header__close" id="admin-nav-toggle">
            <i class="uil uil-times header__close-icon"></i>
        </div>
        <div id="test"></div>
        <nav class="nav">
            <ul class="nav__links">
                <li>
                    <a href="/admin" class="nav__link <?php if(isset($dashboard)){echo 'active';}?>">
                        <i class="uil uil-dashboard nav__icon"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="/admin/home" class="nav__link <?php if(isset($home)){echo 'active';}?>">
                        <i class="uil uil-estate nav__icon"></i> Home
                    </a>
                </li>
                <li>
                    <a href="/admin/about" class="nav__link <?php if(isset($about)){echo 'active';}?>">
                        <i class="uil uil-file-alt nav__icon"></i> About Me
                    </a>
                </li>
                <li>
                    <a href="/admin/portfolio" class="nav__link <?php if(isset($portfolio)){echo 'active';}?>">
                        <i class="uil uil-briefcase-alt nav__icon"></i> Portfolio
                    </a>
                </li>
                <li>
                    <a href="#" class="nav__link <?php if(isset($testimonial)){echo 'active';}?>">
                        <i class="uil uil-users-alt nav__icon"></i> Testimonial
                    </a>
                </li>
                <li>
                    <a href="#" class="nav__link <?php if(isset($messages)){echo 'active';}?>">
                        <i class="uil uil-message nav__icon"></i> Messages
                    </a>
                </li>
                <li>
                    <a href="#" class="nav__link <?php if(isset($settings)){echo 'active';}?>">
                        <i class="uil uil-setting nav__icon"></i> Settings
                    </a>
                </li>
                <li class="nav__link-bottom">
                    <a href="/admin/logout" class="nav__link">
                        <i class="uil uil-signout nav__icon"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
    </header>