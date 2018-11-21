$(document).on("submit", "form.regform", function(event){
    event.preventDefault();
    //console.log(event);
    var form = $(this);
    //Datos de los inputs del formulario
    var datos = {
        user : $("input[name='user']", form).val(),
        email : $("input[name='email']", form).val(),
        password : $("input[name='password']", form).val(),
        reppassword : $("input[name='reppassword']", form).val()
    }
    //Texto de error
    var errtext = $("p.errortext", form);
    console.table(datos);
    $.ajax({
        type: "post",
        url: "/php/register.php",
        data: datos,
        dataType: "json",
        success: function (response) {
            
        }
    });
});