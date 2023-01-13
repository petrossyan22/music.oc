import media from './modules/media';
import Index from './modules/index';
import LikeSystem from './modules/like_system';
import Watch from './modules/watch';
// import videoControl from './modules/video_control';
import $ from "jquery";

media();
Index();

async function getAuthUserId(){
    let res = await fetch("/get-auth-user-id");
    res = await res.json();
    return res.id;
}
const routeName = window.location.pathname.slice(1,window.location.pathname.length).split("/")[0];
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
    Watch();
    getAuthUserId().then(id=>{
        let l = new LikeSystem({"token":token, "id": id});
    });
}