renderRep();

function f() {
    renderRep();
}

var timer = setInterval(f, 5000);


$("#choice1").click(function(e){
    e.preventDefault();
    let rep = $("#choice1").val();
    let sondageId = $("#sondage_id").val();
    let user_id = $("#user_id").val();
    $.ajax({
        url:"index.php?page=postRep1",
        method:"POST",
        dataType: "json",
        data:{rep, sondageId, user_id},
        success:function(response){
            $('form').css("display", "none");
            $('#voted').html(`<p id="centerThx">Merci pour ton vote !</p> <br> <a href='?page=result&id=${sondageId}'>Voir les résultats de ce sondage</a>`);
        }
    })
})


$("#choice2").click(function(e){
    e.preventDefault();
    let rep = $("#choice2").val();
    let sondageId = $("#sondage_id").val();
    let user_id = $("#user_id").val();
    $.ajax({
        url:"index.php?page=postRep2",
        method:"POST",
        dataType: "json",
        data:{rep, sondageId, user_id},
        success:function(response){
            $('form').css("display", "none");
            $('#voted').html(`<p id="centerThx">Merci pour ton vote !</p> <br> <a href='?page=result&id=${sondageId}'>Voir les résultats de ce sondage</a>`);
        }
    })
})


function renderRep()
{   
    $("#reps").html("");
    let id = $('#sondage_id').val();
    let c1 = 0;
    let c2 = 0;
    let votes = 0;
    $.ajax({
        url:"index.php?page=getRep",
        method:"POST",
        dataType:"json",
        data:{id},
        success:function(response){        
            response.forEach(reps => {
                $("#reps").append(`<p>${reps.pseudo} a répondu ${reps.rep}</p>`);
                votes++;
                if(reps.choice === "1") {
                    c1++
                } else if (reps.choice === "2") {
                    c2++
                }
            });

            $('#nbr').html(`<p><b>Choix 1 :  ${Math.round(c1* 100 / votes) } % </b> (${c1} personnes) <br><b> Choix 2 : ${Math.round(c2* 100 / votes) } %</b> (${c2} personnes) <br> Total : ${votes} votes</p>`);
        }
    })

}





//---------CHAT---------\\


renderMessages();

function g() {
    renderMessages();
}

var timerChat = setInterval(g, 5000);


$("button").click(function(e){
    e.preventDefault();
    let content = $("#msg").val();
    let sondage_id = $("#sondage_id").val();
    let user_id = $('#user_id').val();
    $.ajax({
        url:"?page=postMessage",
        method:"POST",
        dataType:"json",
        data:{content, sondage_id, user_id},
        success:function(response){
            renderMessages();
        }
    })
})

function renderMessages()
{
    $("#messages").html("")
    let sondage_id = $('#sondage_id').val();
    $.ajax({
        url:"?page=getMessages",
        method:"POST",
        dataType:"json",
        data:{sondage_id},
        success:function(response){
            response.forEach(message => {
                $("#messages").append(`<p>${message.pseudo} : ${message.content}</p>`)
            });
        }
    })
}

