var currentImage = 0;
var content = document.querySelectorAll(".contents");
var lastImage = content.length - 1;

function SlideShow(){

    currentImage++;
    if(currentImage > lastImage){
        currentImage = 0;
    }

    content.forEach( contents =>{
        contents.classList.remove("active");
    });

    content[currentImage].classList.add("active");

}

setInterval(SlideShow, 2000);