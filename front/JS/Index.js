var wheel = 0;
function onScrollHandler(e)
{
	var newImageUrl = $("#slide").attr("src");
	wheel = wheel + e.originalEvent.deltaY;
	if (Math.abs(wheel % 3) == 0 ) {
		newImageUrl = "img1.jpg"
	}
	if (Math.abs(wheel % 3) == 2) {
		newImageUrl = "img2.jpg"
	}
	if (Math.abs(wheel % 3) == 1)  {
		// deux balise img, l'une au dessus de l'autre celle en front fait l'animation
		// et passe ensuite derriere la deuxième, vise versa (utilisé z-index : 1 ou -1) . 
		newImageUrl = "img3.jpg"
	}
	$("#slide").attr("src",newImageUrl);
};

function init()
{
	$("#slide").on("wheel",function(e){
		onScrollHandler(e);
		});
}
