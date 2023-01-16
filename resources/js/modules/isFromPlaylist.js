import $ from "jquery";
async function addToPlaylist(video_id, user_id){
	let arr = [];
    arr.push(user_id);
    arr.push(video_id);
    arr = JSON.stringify(arr);
    let res = await fetch(`/api/add-to-playlist/${arr}`);
	res = await res.json();
	if (res === "ok") {
		$("#is_from_playlist").html(`
			<i class="fa fa-check text_success"></i>
			<a href="/playlist/${user_id}" class="text_bold text_primary">Go To Playlist</a>
		`);
	}
    // console.log(video_id);
}
export default async function isFromPlaylist(video_id, user_id){
	
	let arr = [];
    arr.push(user_id);
    arr.push(video_id);
    arr = JSON.stringify(arr);
	let res = await fetch(`/api/is-from-playlist/${arr}`);
	res = await res.json();
		addToPlaylist.bind(video_id);

	if (res === false) {
		$("#is_from_playlist").html(`
			<a href="#" id='add_to_playlist'>Add To Playlist</a>
		`);
	}else{
		$("#is_from_playlist").html(`
			<i class="fa fa-check text_success"></i>
			<a href="/playlist/${user_id}" class="text_bold text_primary">Go To Playlist</a>
		`);
	}

	$("#add_to_playlist").click(function(){

		addToPlaylist(video_id, user_id);
	});
	// console.log(res)

}

