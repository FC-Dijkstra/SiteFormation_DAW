let QCM;

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

    $("#validate").on("click", sendReponses);
})

function generateQCM(data)
{
    QCM = data;
    $("#output").append("<h1>" + data.meta.cours + "</h1>");
    $("#output").append("<h2> Difficulté : " + data.meta.difficulte + "</h2>");
    $("#output").append("<hr/>");

    data.question.forEach(question =>
    {
        $("#output").append("<article>");
        $("#output").append("<div id='questionID'>" + question.id + "</div>");
        $("#output").append("<h4>" + question.enonce + "</h4>");
        question.reponse.forEach(rep =>
        {
            $("#output").append("<span id='reponseID'>" + rep.id + "</span>");
            $("#output").append("<input type='radio' name=" + question.enonce + ">");
            $("#output").append(rep.value);
        });
    });
}

function sendReponses()
{
    let reponses = [];

    $("article").each(function ()
    {
        

    })


    let json = {
        "meta": { "id": QCM.meta.id }
    };
}