let firstTime = true;

//on utilise DOMContentLoaded car document.ready()
//laisse passer pendant une 10aine de frames la page dans le thème
//clair, ce qui donne un effet de flash.
//DOMContentLoaded -> trigger dès la fin d'analyse
//$(document).ready(..) -> trigger dès le 1er rendu de la page.
window.addEventListener("DOMContentLoaded", function(){
    if (getCookie("theme") == "")
    {
        setCookie("theme", "light", 30);
    }

    setTheme();
    firstTime = false;

    $("#checkbox").on("click", function(){
        if (getCookie("theme") == "light")
            setCookie("theme", "dark", 30);
        else
            setCookie("theme", "light", 30);

        setTheme();
    });
});

function setCookie(cname, cvalue, exdays)
{
    let d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(name)
{
    let cname = name + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(";");
    for (let i = 0; i < ca.length; i++)
    {
        let c = ca[i];
        while(c.charAt(0) == ' ')
        {
            c = c.substring(1);
        }
        if (c.indexOf(cname) == 0)
            return c.substring(cname.length, c.length);
    }
    return "";
}



function setTheme()
{
    if (!firstTime) {
        $("body, .header, .footer").css("transition", "all 500ms");
    }

    if (getCookie("theme") == "light")
    {

        $("#checkbox").attr("checked", "");
        $(".header, .footer, body").removeClass("dark");
    }
    else if (getCookie("theme") == "dark")
    {
        $("#checkbox").attr("checked", "checked");
        $(".header, .footer, body").addClass("dark");
    }

}