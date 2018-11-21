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
    console.table(datos);
});