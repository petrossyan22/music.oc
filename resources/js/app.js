import media from './modules/media';
import Index from './modules/index';
import LikeSystem from './modules/like_system';
import Watch from './modules/watch';
// import videoControl from './modules/video_control';


media();
Index();
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
    Watch();
    LikeSystem();
}