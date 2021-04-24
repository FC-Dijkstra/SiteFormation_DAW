$(document).ready(function ()
{
    $('#bouton').on("click", sendReponses);
});

function sendReponses()
{
    let output = new Object();
    let meta = new Object();
    meta.id = $("#qcmID").val();
    output.meta = meta;

    output.reponse = [];
    $(".reponse:checked").each(function()
    {
        let rep = new Object();
        rep.id = $(this).attr("name");
        rep.value = $(this).val();
        output.reponse.push(rep);
    });

    let json = JSON.stringify(output);
    $("#qcm").append("<input type='hidden' name='reponses' value='" + json + "'/>");
    $("#qcm").submit();
}