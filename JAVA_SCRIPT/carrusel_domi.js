let imagenes_carrusel = [
    {
        "url": "imagenes/Carrusel/domirojo.jpg"
    },
    {
        "url": "imagenes/Carrusel/domi.jpg"
    },
    {
        "url": "imagenes/Carrusel/paquetes.jpg"
    },
    {
        "url": "imagenes/Carrusel/motore.jpg"
    },
]

let atras = document.getElementById('atras');
let adelante = document.getElementById('adelante');
let imagen = document.getElementById('imag');
let puntos = document.getElementById('puntos');
let actual = 0;
posicionCarrusel()

atras.addEventListener('click', function(){
   actual -=1
   
   if(actual == -1){
        actual = imagenes_carrusel.length - 1
   }
   imagen.innerHTML = `<img id="imagen1" class="img-fluid" src=${imagenes_carrusel[actual].url} alt="" loading="lazy"></img>`

   posicionCarrusel()
})

adelante.addEventListener('click', function(){
    actual +=1
    
    if(actual == imagenes_carrusel.length){
         actual = 0
    }
    imagen.innerHTML = `<img id="imagen1" class="img-fluid" src=${imagenes_carrusel[actual].url} alt="" loading="lazy"></img>`

    posicionCarrusel()
 })

 function posicionCarrusel(){
    puntos.innerHTML = ""
    for ( var i = 0; i <imagenes_carrusel.length; i++){
        if(i == actual){
           puntos.innerHTML +='<p class="bold">.<p>'
        }
        else{
            puntos.innerHTML +='<p>.<p>'
        }
    }
 }
 
