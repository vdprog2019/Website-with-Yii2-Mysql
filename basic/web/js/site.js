$(document).ready(function(){
    $("#showHideContent").click(function () {
        if ($("#content").is(":hidden")) {
            $("#content").show("slow");
        } else {
            $("#content").hide("slow");
        }
        return false;
    });
});

$(document).ready(function(){
    $("#hover_content").click(function () {
        if ($("#content2").is(":hidden")) {
            $("#content").show("slow");
            $("#content2").show("slow");
        } else {
            $("#content").hide("hide");
            $("#content2").hide("hide");
        }
        return false;
    });
});
$(document).ready(function(){
    $(document).ready(function(){
        $("#contactform-isother").change(function() {
            if(this.checked) {
                $("#otherInfo").css({"display":"block"});
            }
            else{
                $("#otherInfo").css({"display":"none"});
            }
        });

    });
});

