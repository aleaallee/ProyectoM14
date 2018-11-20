var links = document.querySelectorAll('.navbar > ul > li > a');
for(var link of links){
  console.log(link);
  link.addEventListener('click', function(e){
    e.preventDefault();
    console.log(e);
  });
}

//Redirigir svg usuario a página de login/registro al hacer click
document.querySelector('li.user > svg').addEventListener('click', function(){
  document.location= 'log.html';
});