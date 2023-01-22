import $ from "jquery";

export default function Watch(user_id, token){
    let video = document.getElementById("video");
    $( document ).ready(async ()=>{
        // Video volume save and get in/from volumes table
        if(user_id !== undefined){
            fetch(`/api/volume/${user_id}`)
                    .then(volume=>volume.json())
                    .then(volume=>{
                        console.log(volume);
                        if(JSON.stringify(volume) !== '{}'){
                            console.log(volume);
                            video.volume = volume.volume;
                            video.play();
                        }else{
                            video.play();
                        }
                    });
                video.addEventListener('volumechange', (event) => {
                    console.log(video.volume);
                    let formData = {};
                    formData.user_id = user_id;
                    formData.volume = video.volume;
                    fetch('/api/volume',{
                        headers: {
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                        },
                        method: 'post',
                        body: JSON.stringify(formData)
                    }).then(data=>data.json())
                    .then(volume=>console.log(volume));
                });
        }else{
            video.play();
        }
        // /end Video volume save and get in/from volumes table


        // let video_id;
        // let user_id;
    
        
        
        let video_links = $('.link');
        // console.log(video_links);
        let links = [];
        
        if (localStorage.getItem("windex") === null) {
            localStorage.setItem("wk", 0);
        }
        
        video_links.each(function(k, v){
            links[k] = v;
            links[k].addEventListener('click', function () {
                console.log(k);
                localStorage.setItem("wk", k);
            });
        });
        
        if (localStorage.getItem("windex") === null) {
            localStorage.setItem("windex", 0);
        }

        $("#video").on("ended", () =>{
            videoEnded(links);
        });
        async function videoEnded(links){
            let index = localStorage.getItem("windex");
            index = parseInt(index);
            index++;
            if (index == links.length) {
                index = 0;

            }
            localStorage.setItem("windex", index);
            // var k = localStorage.getItem("wk");
            // if(k !== null){
            //     k = parseInt(k);
            //     if (k == links.length-1) {
            //        k = -1;
            //     }
            //     if(index != k+1){
            //         index = k+1;
            //     }
            // }
            links[index].click();

        }
        
    });
    
    
    
    
}