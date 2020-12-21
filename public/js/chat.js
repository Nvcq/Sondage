renderMessages();

$("button").click(function(e){
    e.preventDefault();
    let content = $("input").val();
    $.ajax({
        url:"?page=postMessage",
        method:"POST",
        dataType:"json",
        data:{content},
        success:function(response){
            renderMessages();
        }
    })
})

function renderMessages()
{
    $("#messages").html("")
    $.ajax({
        url:"?page=getMessages",
        dataType:"json",
        success:function(response){
            response.forEach(message => {
                $("#messages").append(`<p>${message.content}</p>`)
            });
        }
    })
}