let slides = $(".slide-cours")
let currentSlideId = 0;
let animFlag = false;

for(let i=0; i<slides.length; i++){
    //On affiche la slide qu'on veut
    if(i!==currentSlideId)
        $(slides[i]).css("z-index", "-1")

    //On met l'event
    slides[i].addEventListener('wheel', e=>{
        if(!$(slides[i]).is(":animated")){


            let nextSlideId = (currentSlideId+(e.deltaY<0?-1:1))%slides.length
            if(nextSlideId === -1) nextSlideId = slides.length-1;

            if(nextSlideId !== currentSlideId && !animFlag) {
                //On doit faire une animation
                console.log(nextSlideId);
                console.log(currentSlideId)

                animFlag = true;

                let finishedCallback = ()=>{
                    //Animation terminée, on set les propriétés CSS
                    $(slides[currentSlideId]).css("z-index", "-1")
                    $(slides[nextSlideId]).css("z-index", "1")
                    $(slides[currentSlideId]).css("left", "");
                    $(slides[currentSlideId]).css("top", "");
                    currentSlideId = nextSlideId;
                    nextSlideId = null;

                    animFlag = false;
                }

                if(e.deltaY>0) {
                    $(slides[nextSlideId]).css("z-index", "0")
                    $(slides[currentSlideId]).animate({left: '50px', top: '-100%'}, {
                        complete: finishedCallback
                    })
                } else {
                    $(slides[nextSlideId]).css("z-index", "1")
                    $(slides[currentSlideId]).css("z-index", "0")
                    $(slides[nextSlideId]).css("left", "50px")
                    $(slides[nextSlideId]).css("top", "-100%")

                    $(slides[nextSlideId]).animate({left: '', top: ''}, {
                        complete: finishedCallback
                    })
                }

            }
        }

    }, {passive: true})
}


