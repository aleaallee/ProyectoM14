<?php
require_once('php/langVar.php');
require_once('php/classes/img.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>A.P.D 2 - User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A.P.D.2 - User">
    <link rel="manifest" href="site.webmanifest">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/slick/slick.css">
    <link rel="stylesheet" href="assets/slick/slick-theme.css">
    <script src="js/jquery-3.3.1.min.js.js"></script>
    <script src="assets/slick/slick.min.js" defer></script>
    <script src="js/main.js?v=<?php echo time();?>" defer></script>

</head>

<body>
<header class="nav">
    <div class="navbar">
        <ul role="navigation">
            <li class="logo"><a href="index.php">A.P.D.2</a></li>
            <div class="menu">
                <li class="obj-nav"><a href="index.php"><?php echo NAV_HOME ?></a></li>
                <li class="obj-nav"><a href="gallery.php"><?php echo NAV_GALLERY ?></a></li>
                <li class="obj-nav"><a href="contact.php"><?php echo NAV_CONTACT ?></a></li>
            </div>
          <?php
          if (isset($_COOKIE['user'])) {
            echo "
                <li class=\"user obj-nav\">
                  <div class='circle'>
                    <a href='user.php'>".$_COOKIE["user"][0]."</a>
                  </div>
                  <div class='logOut'>
                    <span class='sessionClose'>".NAV_SESSION_CLOSE."</span>
                   </div>
                </li>
              ";
          } else {
            header('Location: https://www.apd2.es/');
          }
          ?>
        </ul>
    </div>
</header>
<main class="user">
    <div class="profile">
        <section class="top">
            <div class="userimg">
                <p><?php echo $_COOKIE["user"][0] ?></p>
                <p class="username"><?php echo $_COOKIE["user"] ?></p>
            </div>

        </section>
        <section class="bottom">
            <aside class="list">
                <ul class="userMenuSelection">
                    <li id="images" class="active"><a href=""><?php echo USER_IMAGES; ?></a>
                    </li>
                    <?php
                        if($_COOKIE['user'] != "admin"){
                            echo "<li id='info'><a href=\"#\">".USER_INFO."</a></li>";
                        }
                    ?>
                    <?php
                        if($_COOKIE['user'] == "admin"){
                            echo "<li id='admin'><a href=\"#\">Admin</a></li>";
                        }
                    ?>
                </ul>
            </aside>
            <div class="section images active">
                <div class="imagegrid">
                    <?php echo img::printUserImages($_COOKIE['user']);?>
                </div>

            </div>
            <div class="section data">

            </div>
        </section>
    </div>
</main>

<footer>
    <div class="linkgroup">
        <ul class="links">
            <!--<li><a href="index.php">A.P.D.2</a></li>-->
            <li>
                <select name="langSelector">
                    <option selected disabled><?php echo MENU_LANG ?></option>
                    <option value="ES">ES</option>
                    <option value="EN">EN</option>
                    <option value="CAT">CAT</option>
                </select>
            </li>
            <li><a href="gallery.php"><?php echo NAV_GALLERY ?></a></li>
        </ul>
        <ul class="links">
            <li><a href="contact.php"><?php echo NAV_CONTACT ?></a></li>
            <li><a href="terms.php"><?php echo BODY_TERMS ?></a></li>
        </ul>
    </div>
</footer>
</body>
<script>
  var images = $('#images');
  var info = $('#info');
  var admin = $('#admin');
  $(document).on('ready', function(){
    $(images).on('click', function (e) {
      e.preventDefault();
      console.log(e);
      if (info.hasClass('active')) {
        info.removeClass('active');
      }
      if (admin.hasClass('active')) {
        admin.removeClass('active');
      }
    });
  
  })
  
</script>
</html>