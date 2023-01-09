import $ from "jquery";

export default function Watch(){
    $( document ).ready(async ()=>{
    
        let video_id;
        let user_id;
    
        
        
        let video_links = $('.recomendation_link a');
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