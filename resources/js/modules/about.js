$(window).scroll(function(){
    if($(window).scrollTop() >= 100){
  
      $(".top_menu").addClass('container_fluid');
      $(".top_menu").addClass('top_menu_fixed');
      $(".top_menu").removeClass('container');
      $("header").css('padding-top', '100px');
      $(".top_menu").css('background-color',"#222");
      
    }
    else if($(window).scrollTop() < 100){
  
        $(".top_menu").css("background-color", "transparent");
        $(".top_menu").removeClass('container_fluid');
        $(".top_menu").removeClass('top_menu_fixed');
        $(".top_menu").addClass('container');
        $("header").css('padding-top', '0');
      }
});

let header_profile_image_width = $(".header_profile_image").width();
$(".header_profile_image").height(header_profile_image_width);

$(window).resize(function(){
    header_profile_image_width = $(".header_profile_image").width();
    $(".header_profile_image").height(header_profile_image_width);
});

let information_height;

information_height = $('.information').height();
if($(window).width() < 768){
    $("#skills").css('margin-top', information_height+210);
    $('.header_container').removeClass('container').addClass('container-fluid');
    
}else{
    $("#skills").css('margin-top', 220);
    $('.header_container').removeClass('container').addClass('container-fluid');
}
$(window).resize(function(){
    if($(window).width() < 768){
        information_height = $('.information').height();
        $("#skills").css('margin-top', information_height+210);
    }else{
        $("#skills").css('margin-top', 220);
        $('.header_container').addClass('container').removeClass('container-fluid');
    }
});



$(document).ready(function(){
    $('#close_letsthemusicplay_slide').click(function(){
        $('.letsthemusicplay_slide').hide("slow");
    });
    
    let image_container_height = $(".start_img").height();
    $('.image_container_shadow').height(image_container_height);
    $('.start_img').hover(function(){
        $('.image_container_shadow').show("slow");
    });
    $('.image_container_shadow').mouseleave(function(){
        $('.image_container_shadow').hide("slow");
    });
    
    $('.image_container_shadow').click(function(){
        $('.letsthemusicplay_slide').show("slow");
    });

    $('#close_letsthemusicplay_slide').click(function(){
        $('.letsthemusicplay_slide').hide("slow");
    });
    
    
    let image_container1_height = $(".start_img1").height();
    $('.image_container1_shadow').height(image_container1_height);
    $('.start_img1').hover(function(){
        $('.image_container1_shadow').show("slow");
    });
    $('.image_container1_shadow').mouseleave(function(){
        $('.image_container1_shadow').hide("slow");
    });
    
    $('.image_container1_shadow').click(function(){
        $('.socialmedia_slide').show("slow");
    });
    $('#close_socialmedia_slide').click(function(){
        $('.socialmedia_slide').hide("slow");
    });
});



