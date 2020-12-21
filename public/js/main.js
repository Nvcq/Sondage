let questions = $(".questions");

questions.hover(
    function(){
        $(this).addClass("hover")
    }, function(){
        $(this).removeClass("hover");
    }
)