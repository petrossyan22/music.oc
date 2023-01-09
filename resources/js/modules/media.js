import $ from "jquery"
export default function media(){
    if($("#open_search_form")){
        $("#open_search_form").on("click", (event) => {
            $("#sm_logo").hide();
            $("#open_search_form").hide();
            $("#right_nav").hide();
            $("#search_form button").css("bottom", "17px");
            $("#content_container").css("top", "50px");
            $("#search_form").width("90%");
            $("#close_search_form").show("slow");
            $("#search_form").show("slow");
            if($("#recomendation")){
                $("#recomendation").css("top", "96px");
            }
        });
    }
    
    if($("#close_search_form")){
        $("#close_search_form").on("click", (event) => {
            $("#close_search_form").hide();
            $("#search_form").hide();
    
            $("#sm_logo").show();
            $("#open_search_form").show();
            $("#right_nav").show();
            $("#search_form button").css("bottom", "5px");
            $("#content_container").css("top", "30px");
            $("#search_form").width("30%");
            if($("#recomendation")){
                $("#recomendation").css("top", "76px");
            }
        });
    }
}
