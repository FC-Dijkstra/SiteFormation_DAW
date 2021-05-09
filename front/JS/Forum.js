$(document).ready(function()
{
    $("#openModal").on("click", function()
    {
        document.getElementById("modal").style.display = "block";
    });

    $("#close").on("click", function()
    {
        document.getElementById("modal").style.display = "none";
    });
})