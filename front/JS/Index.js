var wheel = 300;
var flaganime = true;
function onScrollHandler(e)
{
	var newImageUrl = $("#slide").attr("src");
	if ($("#slide").is(":animated") || $("#slide2").is(":animated"))
	{
		console.log("en animation ...");
	}
	else
	{
		wheel = wheel + (e.originalEvent.deltaY);
		if(wheel < 0)
			wheel = wheel + 300;
		if (Math.abs(wheel % 3) == 0 ) {
			newImageUrl = "img1.jpg";
		}
		if (Math.abs(wheel % 3) == 2) {
			newImageUrl = "img2.jpg";
		}
		if (Math.abs(wheel % 3) == 1)  {
			newImageUrl = "img3.jpg";
		}
		
		if($("#slide").css("z-index") == 2 && flaganime == true)
		{
			flaganime = false;
			$("#slide").attr("src",newImageUrl);
			$("#slide2").animate({left:'50px',top:'-100%'});
			$("#slide").css("z-index","1");
			$("#slide2").css("z-index","2");
			$("#slide").css("top","0px");
			$("#slide").css("left","0px");
			$("#slide2").css("top","0px");
			$("#slide2").css("left","0px");
			flaganime = true;
			
		}
		else if(flaganime == true)
		{
			flaganime = false;
			$("#slide2").attr("src",newImageUrl);
			$("#slide").animate({left:'50px', top:'-100%'});
			$("#slide2").css("z-index","1");
			$("#slide").css("z-index","2");
			$("#slide").css("top","0px");
			$("#slide").css("left","0px");
			$("#slide2").css("top","0px");
			$("#slide2").css("left","0px");
			flaganime = true;
		}
	}
};

function init()
{
	$("img").on("wheel",function(e){
		onScrollHandler(e);
		});
}
