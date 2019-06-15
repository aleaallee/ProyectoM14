<?php
require_once('php/langVar.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>A.P.D 2 - Términos y Condiciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A.P.D.2 Alexa Play Despacito 2">
    <link rel="manifest" href="site.webmanifest">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.min.css?v=<?php echo time(); ?>">
    <script src="js/jquery-3.3.1.min.js.js"></script>
    <script src="js/main.js?v=<?php echo time(); ?>" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="js/nav.js" defer></script>
</head>

<body>
<?php
if (isset($_GET['message'])) {
  switch ($_GET['message']) {
    case 'welcome':
      echo "<script>
        Swal.fire('Registered!.',
        'You have succesfully registered',
        'success')
      </script>";
      break;

    case 'logged':
      echo "<script>
        Swal.fire('Logged!.',
        'You have succesfully logged-in',
        'success')
      </script>";
      header("Location: https://www.apd2.es/");
      break;
  }
}
?>
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

            </div><?php
          if (isset($_COOKIE['user'])) {
            echo "
                <li class=\"user obj-nav\">
                  <div class='circle'>
                    <a href='user.php'>" . $_COOKIE["user"][0] . "<span>".$_COOKIE["user"]."</span></a>
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
<main class="terms">
    <div class="text">
        <p>
            <strong>Política de privacidad</strong>
            <strong></strong>
        </p>
        <ul type="disc">
            <li>
                <a
                        href="https://www.mediamarkt.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#identificacion"
                >
                    1. Identificación
                </a>
            </li>
            <li>
                <a
                        href="https://www.mediamarkt.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#informacion"
                >
                    2. Información y consentimiento
                </a>
            </li>
            <li>
                <a
                        href="https://www.mediamarkt.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#obligacion"
                >
                    3. Obligatoriedad datos
                </a>
            </li>
            <li>
                <a
                        href="https://www.mediamarkt.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#finalidad"
                >
                    4. Finalidad de datos
                </a>
            </li>
            <li>
                <a
                        href="https://www.mediamarkt.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#datos"
                >
                    5. Datos del usuario
                </a>
            </li>
            <li>
                <a
                        href="https://www.mediamarkt.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#cookies"
                >
                    6. Cookies, web y redes.
                </a>
            </li>
            <li>
                <a
                        href="https://www.mediamarkt.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#tratamiento"
                >
                    7. Tratamiento de tus datos
                </a>
            </li>
            <li>
                <a
                        href="https://www.mediamarkt.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#compartir"
                >
                    8. Compartir los datos
                </a>
            </li>
            <li>
                <a
                        href="https://www.mediamarkt.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#responsabilidad"
                >
                    9. Responsabilidad del usuario
                </a>
            </li>
            <li>
                <a
                        href="https://www.mediamarkt.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#comunicacion"
                >
                    10. Comunicaciones comerciales-promocionales
                </a>
            </li>
            <li>
                <a
                        href="https://www.mediamarkt.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#funcion"
                >
                    11. Función de chat
                </a>
            </li>
            <li>
                <a
                        href="https://www.mediamarkt.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#ejercicio-derechos"
                >
                    12. Ejercicio de derechos
                </a>
            </li>
            <li>
                <a
                        href="https://www.apd2.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#medidas"
                >
                    13. Medidas de seguridad
                </a>
            </li>
            <li>
                <a
                        href="https://www.apd2.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#cambios-privacidad"
                >
                    14. Cambios política privacidad
                </a>
            </li>
        </ul>
        <p>
            Nuestro objetivo es que te sientas cómodo en nuestro sitio web. La
            protección de tu privacidad es muy importante para nosotros. Por lo tanto,
            nos gustaría pedirte que leas detenidamente el siguiente resumen sobre cómo
            funciona nuestro sitio web. Puedes confiar en un procesamiento de datos
            transparente y justo ya que nos esforzamos día a día para manejar tus datos
            de forma segura, cuidadosa y responsable.
        </p>
        <p>
            Las siguientes políticas de privacidad están destinadas a informarte sobre
            cómo usamos tu información personal cumpliendo con las disposiciones y
            requisitos del Reglamento General Europeo de Protección de Datos
        </p>
        <p>
            <strong>1. Identificación</strong>
        </p>
        <ul type="disc">
            <li>
                Titular: APD2 S.A.
            </li>
            <li>
                NIF: A64421738
            </li>
            <li>
                Domicilio social: C/ Riumende, 15 , 08540 Centelles, Barcelona
            </li>
            <li>
                Correo electrónico:
                <a href="mailto:atencionalcliente@apd2.es">
                    atencionalcliente@apd2.es
                </a>
            </li>
            <li>
                Delegado de Protección de Datos: El usuario puede contactar con el
                Delegado de Protección de Datos mediante escrito dirigido al domicilio
                a APD2 a la atención del “Delegado de Protección de Datos” o al correo
                electrónico <a href="mailto:dpo@apd2.es">dpo@apd2.es</a>
            </li>
        </ul>
        <p>
            <strong>2. Información y consentimiento</strong>
        </p>
        <p>
            Mediante la lectura de la presente Política de Privacidad, el usuario queda
            informado sobre la forma en la que APD2 recaba, trata y protege los datos
            de carácter personal que le son facilitados a través de los formularios
            dispuestos a través del sitio web <a href="https://www.apd2.es/">www.APD2.es</a> (en adelante, el
            “Sitio Web”), así como los datos derivados de su navegación y aquellos
            otros datos que pueda facilitar en un futuro a APD2.
        </p>
        <p>
            El usuario debe leer con atención esta Política de Privacidad, que ha sido
            redactada de forma clara y sencilla, para facilitar su comprensión,
            determinando libre y voluntariamente si desea facilitar sus datos
            personales a APD2.
        </p>
        <p>
            <strong>3. Obligatoriedad de facilitar los datos</strong>
        </p>
        <p>
            Los datos solicitados en los formularios dispuestos en el Sitio Web son,
            con carácter general, obligatorios (salvo que en el campo requerido se
            especifique lo contrario) para cumplir con las finalidades establecidas.
        </p>
        <p>
            Por lo tanto, si no se facilitan dichos datos o estos no son correctos no
            podrán atenderse las mismas.
        </p>
        <p>
            <strong>
                4. ¿Con qué finalidad tratará APD2 los datos personales del usuario y
                durante cuánto tiempo?
            </strong>
        </p>
        <p>
            Los datos personales recabados serán tratados por APD2 conforme a las
            siguientes finalidades:
        </p>
        <ul type="disc">
            <li>
                Gestionar sus solicitudes de contacto con APD2 a través de los canales
                dispuestos para ello en el Sitio Web de APD2.
            </li>
            <li>
                Gestionar las compras efectuadas en el marco del Sitio Web, incluyendo
                la gestión del pago y la remisión del pedido.
            </li>
            <li>
                Gestionar la suscripción a la newsletter, realizada a través del canal
                dispuesto en el Sitio Web de APD2.
            </li>
            <li>
                Efectuar análisis sobre la utilización del Sitio Web y comprobar las
                preferencias y comportamiento de los usuarios.
            </li>
            <li>
                Gestionar el envío de comunicaciones comerciales de APD2 y del resto de
                compañías que forman parte de su mismo grupo, salvo que el usuario
                indique lo contrario marcando la casilla correspondiente, o muestre su
                oposición a dicho tratamiento.
            </li>
            <li>
                Gestionar el envío de encuestas de satisfacción en base a la compra del
                producto o servicio de APD2 realizada, mara mejorar día a día la
                experiencia de nuestros clientes.
            </li>
            <li>
                Analizar sus datos a fin de elaborar perfiles de usuario que permitan
                definir con mayor detalle los productos que puedan resultar de su
                interés.
            </li>
        </ul>
        <p>
            Los datos se conservarán durante el tiempo necesario para la realización de
            las finalidades para las que fueron recabados, salvo que el usuario
            solicite su baja a APD2, oponiéndose o revocando su consentimiento.
        </p>
        <p>
            <strong>5. ¿Qué datos del usuario tratará APD2?</strong>
        </p>
        <p>
            APD2 tratará las siguientes categorías de datos:
        </p>
        <ul type="disc">
            <li>
                Datos identificativos: nombre, apellidos, documento nacional de
                identidad o número de identidad de extranjero e imagen.
            </li>
            <li>
                Datos de contacto: domicilio, teléfono fijo, teléfono móvil, dirección
                de correo electrónico.
            </li>
            <li>
                Datos de características personales: fecha de nacimiento, edad, sexo,
                nacionalidad.
            </li>
            <li>
                Datos bancarios: número de cuenta, titular, mandato SEPA.
            </li>
            <li>
                Datos económicos, financieros y de seguros: ingresos y rentas.
            </li>
            <li>
                Otros datos: datos facilitados por los propios interesados en los
                campos abiertos de los formularios dispuestos en el Sitio Web.
            </li>
            <li>
                Datos de navegación.
            </li>
        </ul>
        <p>
            En caso de que el usuario facilite datos de terceros, manifiesta contar con
            el consentimiento de los mismos y se compromete a trasladar al interesado,
            titular de dichos datos, la información contenida en la Política de
            Privacidad, eximiendo a APD2 de cualquier responsabilidad en este sentido.
            No obstante, APD2 podrá llevar a cabo las verificaciones necesarias para
            constatar este hecho, adoptando las medidas de diligencia debida que
            correspondan, conforme a la normativa de protección de datos.
        </p>
        <p>
            <strong>6. Cookies, servicios de análisis web y redes sociales</strong>
        </p>
        <p>
            Utilizamos cookies, servicios de análisis web y complementos de redes
            sociales en nuestro sitio web para mejorar tu experiencia de navegación.
        </p>
        <p>
            <strong>7. Cuál es la legitimación del tratamiento de tus datos?</strong>
        </p>
        <p>
            El tratamiento de datos para la adquisición de productos por medio del
            Sitio Web será necesario para el cumplimiento de la relación contractual
            surgida entre el usuario y APD2.
        </p>
        <p>
            El tratamiento de sus datos con fines de marketing, relativo a bienes y
            servicios propios de APD2 y servicios análogos para sus clientes, se basará
            en el interés legítimo reconocido por la normativa cuando el usuario haya
            adquirido bienes y/o servicios de APD2. En caso no existir tal relación
            contractual, el tratamiento de datos se basará en el consentimiento del
            usuario recogido en la normativa actual vigente.
        </p>
        <p>
            El tratamiento para las referidas finalidades, se realizará siempre previo
            consentimiento del usuario o en base al referido interés legítimo, y será
            necesario para la atención de su solicitud. Asimismo, en caso de retirar su
            consentimiento a cualquiera de los tratamientos, ello no afectará a la
            licitud de los tratamientos efectuados con anterioridad.
        </p>
        <p>
            Para revocar dicho consentimiento, el Usuario podrá contactar con APD2 a
            través de los canales siguientes: mediante carta dirigida al Departamento
            de Protección de Datos de APD2 Iberia a la dirección C/ Riumende, 15 ,
            08540 Centelles, Barcelona o bien haciendo click sobre el link de baja
            automática disponible en cada comunicación comercial enviada por APD2 o
            bien mediante correo electrónico dirigido a <a href="mailto:dpo@apd2.es"
                                                           target="_blank">dpo@APD2.es</a>.
        </p>
        <p>
            <strong>
                8. ¿Con qué destinatarios se compartirán los datos del usuario?
            </strong>
        </p>
        <p>
            Los datos del usuario podrán ser comunicados a:
        </p>
        <ul type="disc">
            <li>
                Empresas del grupo al que pertenece APD2, que puedes consultar
                <a
                        href="https://www.mediamarkt.es/?gclid=CjwKCAjw8qjnBRA-EiwAaNvhwLi5Zjg5olTDijL1tmJduK3xaf63CSEk8jYUFQCruWY5AfTmjAI-HBoCgfwQAvD_BwE&amp;gclsrc=aw.ds#listado-sociedades"
                >
                    aquí
                </a>
                , únicamente para fines administrativos internos y/o para las
                finalidades anteriormente indicadas.
            </li>
            <li>
                Empresas del grupo al que pertenece APD2 para el envío de
                comunicaciones comerciales sobre los productos y servicios ofertados
                por las empresas que lo forman, siempre que el Usuario así lo haya
                consentido.
            </li>
            <li>
                Administraciones Públicas y autoridades nacionales y/o europeas
                competentes, en los casos previstos por la Ley.
            </li>
        </ul>
        <p>
            Adicionalmente, los datos podrán ser accesibles por la entidad APD2Saturn
            Retail Group GmbH y por proveedores de APD2, siendo dicho acceso el
            necesario para el adecuado cumplimiento de las obligaciones legales y/o de
            las finalidades anteriormente indicadas. Dichos proveedores no tratarán sus
            datos para finalidades propias que no hayan sido previamente informadas por
            APD2.
        </p>
        <p>
            Los destinatarios indicados en el presente apartado pueden encontrarse
            ubicados dentro o fuera del Espacio Económico Europeo, encontrándose en
            este último caso debidamente legitimadas las transferencias internacionales
            de datos.
        </p>
        <p>
            <strong>9. Responsabilidad del usuario</strong>
        </p>
        <p>
            El usuario:
        </p>
        <ul type="disc">
            <li>
                Garantiza que es mayor de dieciocho (18) años y que los datos que
                facilita a APD2 son verdaderos, exactos, completos y actualizados. A
                estos efectos, el usuario responde de la veracidad de todos los datos
                que comunique y mantendrá convenientemente actualizada la información
                facilitada, de tal forma que responda a su situación real.
            </li>
            <li>
                Garantiza que ha informado a los terceros de los que facilite sus
                datos, en caso de hacerlo, de los aspectos contenidos en este
                documento. Asimismo, garantiza que ha obtenido su autorización para
                facilitar sus datos a APD2 para los fines señalados.
            </li>
            <li>
                Será responsable de las informaciones falsas o inexactas que
                proporcione a través del Sitio Web y de los daños y perjuicios,
                directos o indirectos, que ello cause a APD2 o a terceros.
            </li>
        </ul>
        <p>
            <strong>10. Comunicaciones comerciales y promocionales</strong>
        </p>
        <p>
            Una de las finalidades para las que APD2 trata los datos personales
            proporcionados por parte de los usuarios es para remitirles comunicaciones
            electrónicas con información relativa a bienes, servicios, promociones,
            ofertas, eventos o noticias relevantes para los usuarios. Siempre que se
            realice alguna comunicación de este tipo, ésta será dirigida única y
            exclusivamente a aquellos Usuarios que no hubieran manifestado previamente
            su negativa a la recepción de las mismas.
        </p>
        <p>
            Para llevar a cabo la labor anterior, APD2 podrá analizar los datos
            obtenidos por las entidades que forman del grupo de empresas al que
            pertenece APD2, a fin de elaborar perfiles de usuario que permitan definir
            con mayor detalle los productos que puedan resultar de su interés.
        </p>
        <p>
            En caso de que el usuario desee dejar de recibir comunicaciones comerciales
            o promocionales por parte de APD2, puede solicitar la baja del servicio
            haciendo click sobre el enlace habilitado a tales efectos en el propio
            cuerpo de dichas comunicaciones comerciales o bien enviando un email a la
            siguiente dirección de correo electrónico: <a href="mailto:dpo@mediamarkt.es"
                                                          target="_blank">dpo@APD2.es</a> así como
            indicando su negativa a la recepción de las mismas, a través de la casilla
            así dispuesta en el formulario de recogida de sus datos o indicándolo
            mediante la opción de baja proporcionada en cada una de las comunicaciones
            comerciales enviadas.
        </p>
        <p>
            <strong>11. Uso de la función de chat “atención al cliente”</strong>
        </p>
        <p>
            Una de las posibilidades que te ofrecemos es la de "Chat de Atención al
            Cliente" para que nuestro servicio sea aún más agradable para ti. A través
            de este chat tienes la oportunidad de consultar antes de comprar en nuestro
            sitio web. Todo el proceso de chat se realiza de forma totalmente anónima,
            sin que se muestre tu nombre u otros datos personales. Con el fin de
            mejorar constantemente la calidad de nuestro servicio al cliente en el
            chat, registramos este historial para fines de análisis y mejora, de forma
            totalmente anónima. Estos registros se eliminan una vez evaluados.
        </p>
        <p>
            <strong>12. Ejercicio de derechos</strong>
        </p>
        <p>
            El usuario puede enviar un escrito a APD2, a la dirección indicada en el
            encabezado de la presente Política, o bien por medio de un correo
            electrónico a la dirección <a href="mailto:dpo@mediamarkt.es" target="_blank">dpo@APD2.es</a>,
            adjuntando fotocopia de su documento de identidad, en cualquier momento y
            de manera gratuita, para:
        </p>
        <ul type="disc">
            <li>
                Revocar los consentimientos otorgados.
            </li>
            <li>
                Obtener confirmación acerca de si en APD2 se están tratando datos
                personales que conciernen al Usuario o no.
            </li>
            <li>
                Acceder a sus datos personales.
            </li>
            <li>
                Rectificar los datos inexactos o incompletos.
            </li>
            <li>
                Solicitar la supresión de sus datos cuando, entre otros motivos, los
                datos ya no sean necesarios para los fines que fueron recogidos.
            </li>
            <li>
                Obtener de APD2 la limitación del tratamiento de los datos cuando se
                cumpla alguna de las condiciones previstas en la normativa de
                protección de datos.
            </li>
            <li>
                Obtener intervención humana, a expresar tu punto de vista y a impugnar
                las decisiones automatizadas a adoptadas por parte de APD2.
            </li>
            <li>
                Solicitar la portabilidad de tus datos.
            </li>
            <li>
                Ponerse en contacto con el DPO de APD2 a través de la siguiente
                dirección: <a href="mailto:dpo@mediamarkt.es" target="_blank">dpo@APD2.es</a>
            </li>
            <li>
                Interponer una reclamación relativa a la protección de sus datos
                personales cuando el interesado considere que APD2 ha vulnerado los
                derechos que le son reconocidos por la normativa aplicable en
                protección de datos.
            </li>
        </ul>
        <p>
            <strong>13. Medidas de seguridad</strong>
        </p>
        <p>
            APD2 tratará los datos del Usuario en todo momento de forma absolutamente
            confidencial y guardando el secreto de los mismos, de conformidad con lo
            previsto en la normativa de aplicación, adoptando al efecto las medidas de
            índole técnico-organizativa necesarias que garanticen la seguridad de sus
            datos y eviten su alteración, pérdida, tratamiento o acceso no autorizado,
            habida cuenta del estado de la tecnología, la naturaleza de los datos
            almacenados y los riesgos a que están expuestos.
        </p>
        <p>
            <strong>14. Cambios en la política de privacidad</strong>
        </p>
        <p>
            Para garantizar que nuestras directrices de protección de datos cumplan
            siempre con los requisitos legales actuales, nos reservamos el derecho de
            realizar cambios para estar siempre adecuados a la legislación vigente.
        </p>
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

</html>