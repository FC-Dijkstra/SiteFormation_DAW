$(document).ready(function ()
{
    $.ajax({
        url: "../../back/router.php",
        type: "POST",
        data: "action=getQCM&qcmID=test",
        dataType: "json",
        success: function (data, status)
        {
            generateQCM(data);
        },

        error: function (result, status, error)
        {
            console.log(result);
            console.log(status);
            console.log(error);
        }
    });
})

function generateQCM(data)
{
    console.log(data);
    $("#output").append("<h1>" + data.meta.cours + "</h1>");
    $("#output").append("<h2> Difficulté : " + data.meta.difficulte + "</h2>");
    $("#output").append("<hr/>");

    data.question.forEach(question =>
    {
        $("#output").append("<article>");
        $("#output").append("<h4>" + question.enonce + "</h4>");
        question.reponse.forEach(rep =>
        {
            $("#output").append("<input type='radio' name=" + question.enonce + ">");
            $("#output").append(rep.content);
        });
    });
}