localStorage.removeItem("windex");
localStorage.removeItem("wk");
localStorage.removeItem("index");
localStorage.removeItem("k");

let user;

if(localStorage.getItem("user") !== null){
    user = JSON.parse(localStorage.getItem("user"));
}
let videos = [];
async function getPlaylistVideos(){
    let res = await fetch(`/api/index.php?page=playlist-videos&user_id=${user.id}`)
    res = await res.json();
    videos = res;
    if (videos.length === 0) {
        $("#player_container").html("");
        $("#player_container").html("Playlist is empty");
        $("#video").attr("src", "");
        $("#playlist").hide("slow");
    }
    $("#playlist").html("");
        
    res.forEach((video, k)=> {
        
        $("#playlist").append(`
            <div class="recomendation_link" data-video="${video.video}">
                <img src="admin/poster_uploads/${video.poster}">
                <a href="#">
                    ${video.singer} __ ${video.title}
                </a>
                <a href="#" class="trash" id="trash" data-id="${video.id}" 
                    onclick="trash(${JSON.parse(localStorage.getItem("user")).id}, ${video.id})">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        `);
        if(k === 0){
            $("#player_container").html("");
            $("#player_container").prepend(`
                <video id="video" data-id="${video.id}" src="admin/video_uploads/${video.video}" autoplay controls poster="admin/poster_uploads/${video.poster}"></video>
                <p>
                <p>
                    ${video.singer} __ ${video.title}
                </p>
            `);
        }
    });
}

$( document ).ready(async ()=>{
    await getPlaylistVideos();

    let video_id;
    let user_id;
       
   
    if(document.getElementById("video")){
        video_id = document.getElementById("video").getAttribute("data-id");
    }

    $("#video").on("ended", async () =>{
        await videoEnded();
    });
    var vodeo_links = $('.recomendation_link');

    var links = [];
    
    if (localStorage.getItem("index") === null) {
        localStorage.setItem("k", 0);
    }
    
    vodeo_links.each(function(k, v){
        links[k] = v;
        links[k].addEventListener('click', function () {
            localStorage.setItem("k", k);
            let src = document.getElementsByClassName("recomendation_link")[k].getAttribute("data-video");
            $("#video").attr('src', 'admin/video_uploads/' + src);
            $("#video").attr('poster', 'admin/poster_uploads/' + videos[k].poster);
            document.getElementById("video").setAttribute('data-id', videos[k].id);
        });
    });
    
    if (localStorage.getItem("index") === null) {
        localStorage.setItem("index", 0);
    }
    async function videoEnded(){
        var index = localStorage.getItem("index");
        index = parseInt(index);
        index++;
        if (index == links.length) {
            index = 0;
        }
        localStorage.setItem("index", index);
        var k = localStorage.getItem("k");
        if(k !== null){
            k = parseInt(k);
            if (k == links.length-1) {
               k = -1;
            }
            if(index != k+1){
                index = k+1;
            }
        }
        links[index].click();
    }
    
});

async function trash(user_id, video_id){
    let data = {};
    data.user_id = user_id;
    data.video_id = video_id;
    data = JSON.stringify(data);
    let res = await fetch(`api/index.php?page=trash`, {
        method: "POST",
        body: data
    });
    res = await res.json();
    await getPlaylistVideos();
    // if (videos.length === 0) {
    //     $("#player_container").html("");
    //     $("#player_container").html("Playlist is empty");
    //     $("#video").attr("src", "");
    //     $("#playlist").hide("slow");
    // }
}

