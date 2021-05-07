$(document).ready(function(){
    if (getCookie("theme") == "")
    {
        setCookie("theme", "light", 30);
    }


    setTheme();

    $("#checkbox").on("click", function(){
        if (getCookie("theme") == "light")
            setCookie("theme", "dark", 30);
        else
            setCookie("theme", "light", 30);

        setTheme();
    })
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
    if (getCookie("theme") == "light")
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