import $ from "jquery";
export default function LikeSystem(){

    $(document).ready(() => {
        fetch("/get-auth-user-id")
            .then(data=>data.json())
                .then(res => {
                    isLiked(res.id,1);
                });
        
        getLikes();
        if($(".like")){
            $(".like").click(() => {
                like();
            });
        }
        if($(".unlike")){
            $(".unlike").click(() => {
                unlike();
            });
        }
    
    });

    async function isLiked(user_id, video_id){
        let arr = [];
        arr.push(user_id);
        arr.push(video_id);
        arr = JSON.stringify(arr);
        let res = await fetch(`/api/isliked/${arr}`);
        res = await res.json();
        console.log(res);
        if(res === false){
            let a = document.createElement('a');
            a.setAttribute("href", "#");
            a.setAttribute("id", "like");
            a.innerHTML = `<i class="fa fa-thumbs-up text-secondary" style="color:grey"></i>`;
            a.setAttribute("onclick", `like(${user_id}, ${video_id})`);
            $("#like_form").html(a);
        }else{
            let a = document.createElement('a');
            a.setAttribute("href", "#");
            a.setAttribute("id", "like");
            a.innerHTML = `<i class="fa fa-thumbs-up text-secondary" style="color:green"></i>`;
            a.setAttribute("onclick", `unlike(${user_id}, ${video_id})`);
            $("#like_form").html(a);
        }
    }

    //----------------------------------------------------
    async function like() {
        var user_id = $('#user_id').text();
        var video_id = $('#video_id').text(); //change value and get from localstorage
        let formData = new FormData();
        formData.append('user_id', user_id);
        formData.append('video_id', video_id);
        let res = await fetch(`like.php`, {
            method: 'POST',
            body: formData
        });
        res = await res.json();
        // console.log(res);
        if (res.status == "true") {
            isLiked();
            getLikes();
            
        }
    }

    async function unlike() {
        var user_id = $('#user_id').text();
        var video_id = $('#video_id').text(); //change value and get from localstorage
        let formData = new FormData();
        formData.append('user_id', user_id);
        formData.append('video_id', video_id);
        let res = await fetch(`unlike.php`, {
            method: 'POST',
            body: formData
        });
        res = await res.json();
        console.log(res);
        if (res.status == "true") {
            isLiked();
            getLikes();
            
        }
    }


    async function getLikes(){
        var user_id = $('#user_id').text();
        //var video_id = $('#video_id').text(); //change value and get from localstorage
        let video_id = parseInt($("#video").attr("data-id")) ;
        let res = await fetch(`/api/likes/${video_id}`);
        res = await res.json();
        let likes = res.length;
        $(`#likes`).text("");
                $(`#likes`).text(`${likes}`);
        }

    }
