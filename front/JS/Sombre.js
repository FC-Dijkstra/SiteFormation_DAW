$(document).ready(function(){
    if (localStorage.getItem("theme") == undefined)
    {
        localStorage.setItem("theme", "light");
    }


    setTheme();

    $("#checkbox").on("click", function(){
        if (localStorage.getItem("theme") == "light") {
            localStorage.setItem("theme", "dark");
        }
        else
            localStorage.setItem("theme", "light");

        setTheme();
    })
});

function setTheme()
{
    if (localStorage.getItem("theme") == "light")
    {
        $("#checkbox").attr("checked", "");
        $(".header").removeClass("dark");
        $(".footer").removeClass("dark");
        $("body").removeClass("dark");
    }
    else
    {
        $("#checkbox").attr("checked", "checked");
        $(".header").addClass("dark");
        $(".footer").addClass("dark");
        $("body").addClass("dark");
    }

}