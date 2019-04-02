//Redirigir svg usuario a página de login/registro al hacer click
if(document.querySelector('li.user >svg')){
    document.querySelector('li.user > svg').addEventListener('click', function(){
        document.location = 'log.php';
    });
}

let langSelector = document.querySelector('select[name="langSelector"');
langSelector.addEventListener('change', function(e){
    let option = langSelector.options[this.selectedIndex].value;
    document.cookie = `lang=${option};`;
    console.log(option);
    window.location.replace(window.location.href);
});