import $ from "jquery";
export default function LikeSystem(){

    $(document).ready(async () => {
        let video_id = $("#video").attr("data-id");
        let user_id = await getAuthUserId();
        await isLiked(user_id, video_id);
        if($("#like")){
            $("#like").click(async (event) => {
                event.preventDefault();
                await like(user_id, video_id);
            });
        }
        
        getLikes();
        
        if($("#unlike")){
            $("#unlike").click(() => {
                unlike();
            });
        }
        
    
    });
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    async function getAuthUserId(){
        let res = await fetch("/get-auth-user-id");
        res = await res.json();
        return res.id;
    }

    async function like(user_id, video_id) {
        let formData = {};
        formData.user_id = user_id;
        formData.video_id = video_id;
        console.log(JSON.stringify(formData));
        let res = await fetch(`/api/like`, {
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'post',
            body: JSON.stringify(formData)
        });
        res = await res.json();
        console.log(res);
        if (res.status == "true") {
            isLiked();
            getLikes();
            
        }
    }

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
            $("#like_form").html(a);
        }else{
            let a = document.createElement('a');
            a.setAttribute("href", "#");
            a.setAttribute("id", "unlike");
            a.innerHTML = `<i class="fa fa-thumbs-up text-secondary" style="color:green"></i>`;
            $("#like_form").html(a);
        }
    }

    //----------------------------------------------------
    

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
