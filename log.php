<?php
require_once('php/langVar.php');
if (isset($_COOKIE["user"])) {
  header('Location: https://www.apd2.es/');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>A.P.D 2 - User access</title>
    <link rel="manifest" href="site.webmanifest">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A.P.D.2 - User access">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.min.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="assets/slick/slick.css">
    <link rel="stylesheet" href="assets/slick/slick-theme.css">
    <script src="js/jquery-3.3.1.min.js.js"></script>
    <script src="assets/slick/slick.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="js/main.js" defer></script>
    <script src="js/register.js?t=1491313943559" defer></script>
    <script src="js/particles.min.js"></script>
</head>

<body>
<div id="particles-js" class="particlesjs"></div>
<header class="nav">
    <div class="navbar">
        <ul role="navigation">
            <li class="logo"><a href="index.php">A.P.D.2</a></li>
            <div class="menu">
                <li class="obj-nav"><a href="index.php"><?php echo NAV_HOME ?></a></li>
                <li class="obj-nav"><a href="gallery.php"><?php echo NAV_GALLERY ?></a></li>
                <li class="obj-nav"><a href="contact.php"><?php echo NAV_CONTACT ?></a></li>
            </div>
        </ul>
    </div>
</header>
<main class="reglogin">
    <div class="splitsec">
        <div class="login">
            <form enctype="multipart/form-data" class="loginform">
                <div class="input">
                    <label for="user"></label>
                    <input type="text" name="user" placeholder="User" maxlength="15" required>
                </div>
                <div class="input">
                    <label for="password"></label>
                    <input type="password" name="password" placeholder="Password" maxlength="16" required>
                </div>
                <button class="loginbutton" type="submit">Login</button>
            </form>
        </div>
        <div class="reg">
            <form enctype="multipart/form-data" class="regform">
                <div class="input">
                    <label for="user"></label>
                    <input type="text" name="user" placeholder="User" maxlength="15" required>
                </div>
                <div class="input">
                    <label for="email"></label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input">
                    <label for="password"></label>
                    <input type="password" name="password" placeholder="Password" maxlength="15" required>
                </div>
                <div class="input">
                    <label for="reppassword"></label>
                    <input type="password" name="reppassword" placeholder="Repeat password" maxlength="15"
                           autocomplete="current-password"
                           required>
                </div>
                <button class="registerbutton" type="submit">Register</button>
            </form>
        </div>
    </div>
</main>

<footer>
    <div class="linkgroup">
        <ul class="links">
            <li><a href="index.php">A.P.D.2</a></li>
            <li><a href="gallery.php"><?php echo NAV_GALLERY ?></a></li>
        </ul>
        <ul class="links">
            <li><a href="contact.php"><?php echo NAV_CONTACT ?></a></li>
            <li><a href="terms.php"><?php echo BODY_TERMS ?></a></li>
        </ul>
    </div>
</footer>
</body>

</html>