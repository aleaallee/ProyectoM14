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
    <script src="js/main.js?v=<?php echo time(); ?>" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

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
              <?php
              if (isset($_COOKIE['user'])) {
                echo "<li class=\"obj-nav\"><a href=\"downloads.php\">" . NAV_DOWNLOADS . " </a></li>";
              }
              ?>
            </div>
          <?php
          if (isset($_COOKIE['user'])) {
            echo "
                <li class=\"user obj-nav\">
                  <div class='circle'>
                    <a href='user.php'>" . $_COOKIE["user"][0] . "<span>" . $_COOKIE["user"] . "</span></a>
                  </div>
                  <div class='logOut'>
                    <span class='sessionClose'>&#10005;</span>
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
                    <li id="images" class="active"><?php echo USER_IMAGES; ?></li>
                  <?php
                  if ($_COOKIE['user'] != "admin") {
                    echo "<li id='info'>" . USER_INFO . "</li>";
                  }
                  ?>
                  <?php
                  if ($_COOKIE['user'] == "admin") {
                    echo "<li id='admin'>Admin</li>";
                  }
                  ?>
                </ul>
            </aside>
            <div class="section images active">
                <div class="imagegrid">
                  <?php echo img::printUserImages($_COOKIE['user']); ?>
                </div>

            </div>
            <div class="section data">
                <fieldset>
                    <legend><?php echo DATA_USER ?></legend>
                  <?php User::getUser($_COOKIE['user'], 'personal') ?>
                </fieldset>
                <fieldset>
                    <legend><?PHP echo DATA_CHANGEPASSWORD ?></legend>
                    <form action="php/editUser.php" enctype="multipart/form-data" method="post">
                        <div class="inputgroup">
                            <label for="currentpassword"><?php echo LOG_PASSWORD ?>:</label>
                            <input type="password" autocomplete="password" name="currentpassword"
                                   placeholder="<?php echo DATA_OLDPASS ?>">
                        </div>
                        <div class="inputgroup">
                            <label for="password"><?php echo LOG_PASSWORD ?>:</label>
                            <input type="password" autocomplete="new-password" name="password"
                                   placeholder="<?php echo LOG_PASSWORD ?>">
                        </div>
                        <div class="inputgroup">
                            <label for="reppassword"><?php echo LOG_REPPASSWORD ?>:</label>
                            <input type="password" autocomplete="new-password" name="reppassword"
                                   placeholder="<?php echo LOG_REPPASSWORD ?>">
                        </div>
                        <div class="inputgroup">
                            <label for="confirm"><?php echo DATA_VERIFY ?>:</label>
                            <input type="checkbox" name="confirm" required>
                        </div>
                        <input type="submit">
                    </form>

                </fieldset>

            </div>
            <div class="section admin">
                <fieldset>
                    <legend><?php echo DATA_USER . "s"; ?></legend>
                    <table border="0">
                        <tr>
                            <th><?php echo DATA_NAME ?></th>
                            <th><?php echo DATA_LASTNAME ?></th>
                            <th><?php echo DATA_USER ?></th>
                            <th><?php echo DATA_EMAIL ?></th>
                            <th class="shown" id="created"><?php echo DATA_CREATED ?></th>
                            <th><?php echo DATA_VERIFY; ?></th>
                            <th class="" id="action" colspan="2"><?php echo DATA_ACTION ?></th>
                        </tr>
                      <?php User::getUser($_COOKIE['user'], 'admin') ?>
                    </table>
                </fieldset>
                <fieldset>
                    <legend><?php echo LOG_PASSWORD . "s"; ?></legend>
                    <table border="0">
                        <tr>
                            <th><?php echo DATA_NAME ?></th>
                            <th><?php echo LOG_PASSWORD ?></th>
                            <th><?php echo LOG_REPPASSWORD ?></th>
                            <th><?php echo DATA_VERIFY; ?></th>
                            <th id="action"><?php echo DATA_ACTION ?></th>
                        </tr>

                        <form action='php/editUser.php' enctype='multipart/form-data' method='post'>
                            <tr>
                                <td>
                                    <select name="user">
                                      <?php User::passwordChanger(); ?>
                                    </select>
                                </td>

                                <td><input type="password" name="password" placeholder="<?php echo LOG_PASSWORD; ?>"
                                           required></td>
                                <td><input type="password" name="reppassword"
                                           placeholder="<?php echo LOG_REPPASSWORD; ?>"
                                           required></td>
                                <td><input type="checkbox" required></td>
                                <input type="hidden" name="adminPass">
                                <td><input type="submit"></td>
                            </tr>
                        </form>

                    </table>
                </fieldset>
                <fieldset>
                    <legend><?php echo USER_IMAGES ?></legend>
                    <table border="0">
                        <tr>
                            <th><?php echo DATA_IMAGE ?></th>
                            <th><?php echo DATA_USER ?></th>
                            <th><?php echo GALLERY_TITLE ?></th>
                            <th><?php echo DATA_AVAILABLE ?></th>
                            <th><?php echo DATA_VERIFY; ?></th>
                            <th colspan="2"><?php echo DATA_ACTION ?></th>
                        </tr>
                      <?php img::getImgInfo(); ?>
                    </table>
                </fieldset>
                <fieldset>
                    <legend>Logs</legend>
                    <table border="0">
                        <tr>
                            <th><?php echo DATA_USER ?></th>
                            <th><?php echo DATA_LOGTIME ?></th>
                            <th><?php echo DATA_ACTION ?></th>
                        </tr>
                      <?php log::getUserLogs(); ?>
                    </table>
                </fieldset>
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
  let links = document.querySelectorAll('ul.userMenuSelection>li');

  for (let link of links) {
    link.addEventListener('click', function (e) {
      for (let link of links) {
        link.classList.remove('active');
      }

      //console.log(this.textContent);
      this.classList.add('active');

      switch (this.id) {
        case 'images':
          for (let element of document.querySelectorAll('div.section')) {
            element.classList.remove('active')
          }
          document.querySelector('.section.images').classList.toggle('active');
          break;
        case 'info':
          for (let element of document.querySelectorAll('div.section')) {
            element.classList.remove('active')
          }
          document.querySelector('.section.data').classList.toggle('active');
          break;
        case 'admin':
          for (let element of document.querySelectorAll('div.section')) {
            element.classList.remove('active')
          }
          document.querySelector('.section.admin').classList.toggle('active');
          break;
      }

    })
  }
  let userRow = document.querySelector('tr.shown');
  let userRowData = document.querySelectorAll('tr.main > td');
  let normalUserRow = document.querySelector('tr.main');
  let editRow = document.querySelector('tr.edit');
  let actionHeader = document.getElementById('action');
  let createdHeader = document.getElementById('created');
  for (let row of userRowData) {
    row.addEventListener('dblclick', function (e) {
      normalUserRow.remove();
      createdHeader.classList.add('hidden');
      actionHeader.classList.remove('hidden');
      editRow.classList.remove('hidden');
      editRow.classList.add('shown');
    })
  }


</script>
<?php
if (isset($_GET['error'])) {

  if ($_GET['error'] == 'badpassword') {
    echo "<script>
      Swal.fire('Error!.',
      'Las contraseñas no coinciden.',
      'warning').then(function(){window.location.replace('https://www.apd2.es/user.php')})
    </script>";
  }
  if ($_GET['error'] == 'wrongpassword') {
    echo "<script>
      Swal.fire('Error!.',
      'La contraseña introducida es incorrecta.',
      'warning').then(function(){window.location.replace('https://www.apd2.es/user.php')})
    </script>";
  }
  if ($_GET['error'] == 'passwordsuccess') {

    echo "<script>
      Swal.fire('Contraseña cambiada!.',
      'Contraseña cambiada con éxito.',
      'success').then(function(){window.location.replace('https://www.apd2.es/user.php')})
    </script>";
  }


}
if (isset($_GET['success'])) {
  if ($_GET['success'] == 'useredited') {
    echo "<script>
      Swal.fire('Datos cambiados!.',
      'Datos cambiados con éxito',
      'success').then(function(){window.location.replace('https://www.apd2.es/user.php')})
    </script>";
  }
}
?>
</html>
