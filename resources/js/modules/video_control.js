export default function videoControl(){
	const media = document.querySelector('video');

	const controls = document.querySelector('.control_panel');

	const play = document.querySelector('#play');
	const stop = document.querySelector('#stop');
	const rwd = document.querySelector('#rwd');
	const fwd = document.querySelector('#fwd');

	const timerWrapper = document.querySelector('#timer');
	const timer = document.querySelector('#timer span');
	const timerBar = document.querySelector('#timer div');

	controls.innerHTML += media.currentTime;
	console.log(media.currentTime);

	play.addEventListener('click', playPauseMedia);

	function playPauseMedia() {
	  if (media.paused) {
	    play.setAttribute('data-icon','u');
	    media.play();
	  } else {
	    play.setAttribute('data-icon','P');
	    media.pause();
	  }
	}
}
