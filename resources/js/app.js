import media from './modules/media';
import Index from './modules/index';
import LikeSystem from './modules/like_system';
import Watch from './modules/watch';
import $ from "jquery";

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

import isFromPlaylist from './modules/isFromPlaylist';

// ==================================================================v
async function getAuthUserId(){
    let res = await fetch("/get-auth-user-id");
    res = await res.json();
    return res.id;
}
window.Pusher = Pusher;
 
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});

window.Echo.channel('test').listen('MyEvent', (e) => {
    getAuthUserId().then(id=>{
        document.querySelector("#message_sound").play();
        if(e.data.user_id == id){
            console.log(e.data);
            $("#messages").html(e.data.name + " ___ " + e.data.message);
        }
    });
});

// ====================================================================

media();
Index();

// async function getAuthUserId(){
//     let res = await fetch("/get-auth-user-id");
//     res = await res.json();
//     return res.id;
// }
const routeName = window.location.pathname.slice(1,window.location.pathname.length).split("/")[0];
const video_id = window.location.pathname.slice(1,window.location.pathname.length).split("/")[1];

if (routeName === "watch") {
    // videoControl();
    let prevUrl = document.referrer
        .replace(/^[^:]+:\/\/[^/]+/, '')
        .replace(/#.*/, '')
        .slice(1,window.location.pathname.length)
        .split("/")[0];
    if (prevUrl !== "watch") { // if we go from another url lcS will be cleared
        localStorage.removeItem('windex');
    }
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    getAuthUserId().then(id=>{
        Watch(id, token, video_id);
        let l = new LikeSystem({"token":token, "id": id});
        isFromPlaylist(video_id, id);
    });
    
}