<?php
require_once('php/langVar.php');
require_once('php/classes/img.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>A.P.D 2 - Galería</title>
    <link rel="manifest" href="site.webmanifest">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A.P.D.2 - Gallery">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/slick/slick.css">
    <link rel="stylesheet" href="assets/slick/slick-theme.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
    <script src="js/jquery-3.3.1.min.js.js"></script>
    <script src="assets/slick/slick.min.js" defer></script>
    <script src="js/main.js?v=<?php echo time(); ?>" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="js/nav.js" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

</head>

<body>
<header class="nav">
    <div class="navbar">
        <ul role="navigation">
            <li class="logo"><a href="index.php">A.P.D.2</a></li>
            <div class="menu">
                <li class="obj-nav "><a href="index.php"><?php echo NAV_HOME; ?></a></li>
                <li class="obj-nav actual"><a href="gallery.php"><?php echo NAV_GALLERY ?></a></li>
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
            echo '
                <li class="user obj-nav">
                  <svg viewBox="0 0 56 65" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27.4092 35.0239C27.4765 35.0239 27.5438 35.0239 27.6245 35.0239C27.6515 35.0239 27.6784 35.0239 27.7053 35.0239C27.7457 35.0239 27.7995 35.0239 27.8399 35.0239C31.7838 34.9566 34.9739 33.5702 37.3295 30.9185C42.5118 25.0767 41.6503 15.0622 41.5561 14.1065C41.2196 6.9321 37.8275 3.4997 35.0278 1.89791C32.9414 0.69994 30.5051 0.0538415 27.7861 0H27.6918C27.6784 0 27.6515 0 27.638 0H27.5572C26.0631 0 23.1288 0.242287 20.3155 1.84407C17.4888 3.44586 14.043 6.87826 13.7065 14.1065C13.6122 15.0622 12.7508 25.0767 17.933 30.9185C20.2752 33.5702 23.4653 34.9566 27.4092 35.0239ZM17.3004 14.443C17.3004 14.4026 17.3139 14.3622 17.3139 14.3353C17.7581 4.68421 24.6094 3.64776 27.5438 3.64776H27.5976C27.6245 3.64776 27.6649 3.64776 27.7053 3.64776C31.3396 3.72853 37.518 5.20917 37.9352 14.3353C37.9352 14.3757 37.9352 14.4161 37.9487 14.443C37.9621 14.5372 38.9044 23.6903 34.624 28.5091C32.9279 30.4205 30.6666 31.3627 27.6918 31.3896C27.6649 31.3896 27.6515 31.3896 27.6245 31.3896C27.5976 31.3896 27.5842 31.3896 27.5572 31.3896C24.596 31.3627 22.3211 30.4205 20.6386 28.5091C16.3716 23.7172 17.2869 14.5238 17.3004 14.443Z" />
                    <path d="M55.2855 51.6338C55.2855 51.6204 55.2855 51.6069 55.2855 51.5934C55.2855 51.4858 55.272 51.3781 55.272 51.2569C55.1913 48.5918 55.0163 42.3596 49.1745 40.3675C49.1341 40.354 49.0803 40.3405 49.0399 40.3271C42.9692 38.7791 37.9216 35.2794 37.8677 35.239C37.0467 34.6603 35.916 34.8622 35.3372 35.6832C34.7584 36.5043 34.9603 37.635 35.7814 38.2138C36.0102 38.3753 41.3675 42.1039 48.0707 43.8268C51.207 44.944 51.557 48.2956 51.6512 51.3646C51.6512 51.4858 51.6512 51.5934 51.6646 51.7011C51.6781 52.9126 51.5973 54.7836 51.382 55.8604C49.2014 57.0987 40.654 61.3791 27.6513 61.3791C14.7024 61.3791 6.10122 57.0853 3.90718 55.8469C3.69181 54.7701 3.59759 52.8991 3.62451 51.6877C3.62451 51.58 3.63797 51.4723 3.63797 51.3512C3.73219 48.2822 4.08216 44.9305 7.21843 43.8133C13.9217 42.0904 19.2789 38.3484 19.5078 38.2003C20.3289 37.6215 20.5308 36.4909 19.952 35.6698C19.3732 34.8487 18.2425 34.6468 17.4214 35.2256C17.3676 35.266 12.3468 38.7657 6.24929 40.3136C6.19544 40.3271 6.15506 40.3405 6.11468 40.354C0.272871 42.3596 0.0978865 48.5918 0.0171241 51.2435C0.0171241 51.3646 0.0171238 51.4723 0.00366344 51.58C0.00366344 51.5934 0.00366344 51.6069 0.00366344 51.6204C-0.00979695 52.3203 -0.0232571 55.9142 0.690144 57.7179C0.824748 58.0679 1.06703 58.364 1.39008 58.5659C1.7939 58.8351 11.4719 65 27.6648 65C43.8576 65 53.5356 58.8217 53.9395 58.5659C54.249 58.364 54.5048 58.0679 54.6394 57.7179C55.3124 55.9277 55.299 52.3338 55.2855 51.6338Z" />
                  </svg>
                </li>
              ';
          }
          ?>
        </ul>
    </div>
</header>
<main class="gallery">
    <div class="uploadModal" id="uploadModal">
        <form name="imgUpload" id="galleryForm" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend><?php echo GALLERY_UPLOAD_IMAGE ?></legend>
                <label for="title"><?php echo GALLERY_TITLE ?>: <input type="text" name="title"
                                                                       placeholder="<?php echo GALLERY_TITLE ?>"></label><br/>
                <label for="image"><?php echo GALLERY_IMAGE ?>: <input type="file" name="image" id="galleryimgfile"></label><br/>
                <img src="#" alt="UploadedImage" id="UploadedImage">
                <button class="imgUpload"><?php echo GALLERY_UPLOAD ?></button>
            </fieldset>
        </form>
    </div>

    <section class="img-grid">
      <?php echo img::printImages(); ?>
      <?php
      if (isset($_COOKIE['user'])) {
        echo "<a data-fancybox data-src=\"#uploadModal\" href=\"javascript:;\"><div class=\"img upload\"></div></a>";
      }
      ?>
    </section>
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

<?php
$mensaje = UPLOAD_SIZE_ERROR;
echo "<script>
        $(document).ready(function () {
    function readURL(input) {

      if (input.files && input.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
          $('fieldset > img').attr('src', e.target.result);
          $('fieldset > img').addClass('active');
        };
        reader.readAsDataURL(input.files[0]);
        if (input.files[0].name.length > 32) {
          alert(\"$mensaje\");
          setInterval(window.location.replace(window.location.href), 1000);
        }
      }
    }

    $('input[type=file]').change(function () {
      readURL(this);
    });
  })
    </script>";
?>
</body>

</html>