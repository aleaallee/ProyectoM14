var links = document.querySelectorAll('.navbar > ul > li > a');
for(var link of links){
  console.log(link);
  link.addEventListener('click', function(e){
    e.preventDefault();
    console.log(e);
  });
}