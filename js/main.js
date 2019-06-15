//Redirigir svg usuario a página de login/registro al hacer click
if (document.querySelector('li.user >svg')) {
  document.querySelector('li.user > svg').addEventListener('click', function () {
    document.location = 'log.php';
  });
}

let langSelector = document.querySelector('select[name="langSelector"');
langSelector.addEventListener('change', function (e) {
  let option = langSelector.options[this.selectedIndex].value;
  document.cookie = `lang=${option};`;
  window.location.replace(window.location.href);
});

function getCookie(name) {
  let v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
  return v ? v[2] : null;
}


$(document).on('submit', 'form[name="imgUpload"]', function (e) {

  e.preventDefault();
  $("#uploadModal").css('display', 'none');
  let form = $(this);
  if (document.getElementById("galleryimgfile").files.length == 0) {
    alert('No has subido ninguna imágen');
    window.location.replace("https://www.apd2.es/gallery.php");

  } else {
    let datos = {
      uploader: getCookie('user'),
      title: $("input[type=text]", form).val(),
      filename: $("input[type=file]", form)[0].files[0].name,
      file: $("input[type=file]", form)[0].files[0]
    };
    let formdata = new FormData();
    formdata.append('filename', datos.filename);
    formdata.append('title', datos.title);
    formdata.append('file', datos.file);
    formdata.append('uploader', datos.uploader);
    /*for (let value of formdata.entries()) {
     console.log(value);
     }*/

    $.ajax({
      type: "post",
      url: "php/imageUpload.php",
      contentType: false,
      processData: false,
      data: formdata,
      cache: false
    }).done(function (datos) {
      alert(datos[0]);
      console.log(datos);
      window.location.replace(window.location.href);

    }).fail(function (e) {
      alert(e);
      console.log(e);
    });
  }


});


$(document).ready(function () {
  $('li.user').mouseover(function () {
    $('.logOut').addClass('active');
  }).mouseout(function () {
    $('.logOut').removeClass('active');
  });
  $('.sessionClose').on('click', function () {
    document.cookie += "user=awd;expires=Thu, 01 Jan 1970 00:00:01 GMT;";
    window.location.replace("https://apd2.es/php/logUser.php?action=logout&dir=" + window.location.href);
  });
});