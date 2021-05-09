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

$(".create_cat_bt").on('click', ()=>{
    $('.cat_detail').toggle(500);
})