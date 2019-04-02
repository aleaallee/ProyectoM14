particlesJS.load('particles-js', 'js/particles.json', function () {
    console.log('callback - particles.js config loaded');
});
$(document).on("submit", "form.regform", function (event) {
    event.preventDefault();

    var form = $(this);
    //Datos de los inputs del formulario

    var datos = {
        user: $("input[name='user']", form).val(),
        email: $("input[name='email']", form).val(),
        password: $("input[name='password']", form).val(),
        reppassword: $("input[name='reppassword']", form).val()
    };

    $.ajax({
        type: "post",
        url: "php/register.php",
        data: datos,
        dataType: "json",
        async: true,
    }).done(function ajaxDone(data) {
        console.log('Succesfully registered.');
        if (data.redirect !== undefined) {
            window.location.replace(data.redirect);
        } else if (data.error !== undefined) {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: data.error
            })
        }

    }).fail(function ajaxFail(e) {
        console.log(e.message);
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: e.error
        })
    }).always(function ajaxAlwaysDoThis(test) {
        console.log(test);
    });
});
$(document).on("submit", "form.loginform", function (event) {
    event.preventDefault();

    var form = $(this);
    //Datos de los inputs del formulario

    var datos = {
        user: $("input[name='user']", form).val(),
        password: $("input[name='password']", form).val(),
    };


    $.ajax({
        type: "post",
        url: "php/login.php",
        data: datos,
        dataType: "json",
        async: true,
    }).done(function ajaxDone(data) {
        if (data.redirect !== undefined) {
            document.cookie = `user=${data.user}`;
            window.location.replace(data.redirect);
        } else if (data.error !== undefined) {
            console.log('error 1:', data.error);
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: data.error
            })
        }

    }).fail(function ajaxFail(e) {
        console.log('error 2:', e.responseText);
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: e.responseText
        })
    });
});

