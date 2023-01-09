$(document).ready(function(){
    
    $("#add_to_playlist").hide();
    $("#is_from_playlist").hide();
    
    var video_id = $('#video_id').text();
    var user_id = $('#user_id').text();
    
    //    ---------------------------------------------------------------------
    isFromPlaylist();
    getComments();

    //    ---------------------------------------------------------------------
    
    $("#comment_form").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:'comment.php',
            type:'POST',
            data:$(this).serialize(),
            success:function(result){
                getComments();
            }
        });
    });
});

function getComments(){
    var video_id = $('#video_id').text();
    var user_id = $('#user_id').text();

    $.ajax({
        url:`comments.php?video_id=${video_id}`,
        type:'GET',
        success:function(result){
            comments = JSON.parse(result);
            if(document.querySelector('.comment_block')){
                document.querySelector('.comment_block').innerHTML = "";

            }
            comments.forEach(function(comment,k){
                if (comment.user_id == user_id) {
                    document.querySelector('.comment_block').innerHTML += `
                        <p class="text-success d-flex justify-content-start">
                            <span class="text-info">#${comment.name}#</span>
                            &nbsp;
                            <span class="comment_text">${comment.comment}</span>
                        </p>
                        <hr class="bg-light">
                    `;
                }else{
                    document.querySelector('.comment_block').innerHTML += `
                        <p class="text-primary d-flex justify-content-end">
                            <span class="text-info">#${comment.name}#</span>
                            &nbsp;
                            <span class="comment_text">${comment.comment}</span>
                        </p>
                        <hr class="bg-light">
                    `;
                }
            })
        }
    });
}


$("#add_to_playlist").click(function(event){
    var user_id = $('#user_id').text();
    var video_id = $('#video_id').text();
    event.preventDefault();
    $.ajax({
        url:`add_to_playlist.php?user_id=${user_id}&video_id=${video_id}`,
        type:'GET',
        data:$(this).serialize(),
        success:function(result){
            isFromPlaylist();
        }
    });
});


function isFromPlaylist(){
    var user_id = $('#user_id').text();
    var video_id = $('#video_id').text();
    
    $.ajax({
        url:`is_from_playlist.php?user_id=${user_id}&video_id=${video_id}`,
        type:'GET',
        success:function(result){
            if (result == 1) {
                $("#add_to_playlist").hide();
                $("#is_from_playlist").show();
            }if (result == 2) {
                $("#is_from_playlist").hide();
                $("#add_to_playlist").show();
            }
        }
    });
}


isFromPlaylist();
getComments();