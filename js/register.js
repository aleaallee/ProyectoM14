$(document).on("submit", "form.regform", function(event){
    event.preventDefault();
    $('button.registerbutton').on('click', function(){
        $("p.errortext").hide();
    });

    var form = $(this);
    //Datos de los inputs del formulario

    var datos = {
        user : $("input[name='user']", form).val(),
        email : $("input[name='email']", form).val(),
        password : $("input[name='password']", form).val(),
        reppassword : $("input[name='reppassword']", form).val()
    };

    //Texto de error
    var errtext = $("p.errortext", $('form.regform'));
//todo test
    $.ajax({
        type: "post",
        url: "php/register.php",
        data: datos,
        dataType: "json",
        async: true,
    }).done(function ajaxDone(data){
        console.log('Succesfully registered.');
        if(data.redirect !== undefined){
            window.location.replace(data.redirect);
        }else if(data.error !== undefined){
            errtext.text(data.error).show();
        }

    }).fail(function ajaxFail(e){
        console.log(e.message);
        errtext.text(e.error).show();
    }).always(function ajaxAlwaysDoThis(test){
        console.log(test);
    });
});
particlesJS.load('particles-js', 'js/particles.json', function(){
    console.log('callback - particles.js config loaded');
});
