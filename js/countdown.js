function	loadVideo() {
	window.YT.ready(function() {
		new window.YT.Player("video", {
			height		: "100%",
			width		: "100%",
			videoId		: "3t-LAbj7jLQ",
			events		: {
				onReady			: onPlayerReady,
				onStateChange	: onPlayerStateChange,
			},
			playerVars	: {
				controls	: 1,
				showInfo	: 1,
				autoplay	: 1,
				mute		: window.innerWidth < 800 ? 0 : 1,
			},
		});
	});
	
	function	onPlayerReady(event) {
		event.target.playVideo();
	}
	
	function	onPlayerStateChange(event) {
		var	videoStatuses	= Object.entries(window.YT.PlayerState);
		let	status			= videoStatuses.find(status => status[1] === event.data)[0];
	}
}

const	display_video = (element) => {
	element.innerHTML = `
		<div id="video" class="mab_display"></div>
	`;
	loadVideo();
};

const	display_end = (element) => {
	element.innerHTML = `
		END
	`;
	// countdown.innerHTML = `
	// 	<video id="display_video" class="mab_display" width="100%" height="100%" autoplay muted controls>
	// 		<source src="videos/POMELO_St-Malo_VDEF.mp4" type="video/mp4">
	// 	</video>
	// `;
};

let	tag = document.createElement("script");

tag.src = "https://www.youtube.com/iframe_api";
document.body.appendChild(tag);

const	addZeroBefore = (nb) => {
	return (nb.toString().length === 1 ? "0" + nb : nb);
};

mab_dom_ready(() => {
	
	let	date_start	= new Date("Oct 8, 2021 11:00:00").getTime();
	let	date_end	= new Date("Oct 8, 2021 11:01:00").getTime();
	
	let	display_done = false;
	
	// Update the count down every 1 second
	let	x = setInterval(() => {
		// Get today's date and time
		let	now = new Date().getTime();
		// Find the distance between now and the date_start, date_end
		let	distance_start	= date_start - now;
		let	distance_end	= date_end - now;
		
		if (distance_start >= 0) {
			// Time calculations for days, hours, minutes and seconds
			let	days	= Math.floor(distance_start / (1000 * 60 * 60 * 24));
			let	hours	= Math.floor((distance_start % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			let	minutes	= Math.floor((distance_start % (1000 * 60 * 60)) / (1000 * 60));
			let	seconds	= Math.floor((distance_start % (1000 * 60)) / 1000);
			// Display the result in the element with id="countdown"
			let	countdown = document.getElementById("countdown");
			
			countdown.innerHTML = "<span> <b>" + addZeroBefore(days) + "</b> <span> jours </span> </span>";
			countdown.innerHTML += "<span> <b>" + addZeroBefore(hours) + "</b> <span> heures </span> </span>";
			countdown.innerHTML += "<span> <b>" + addZeroBefore(minutes) + "</b> <span> minutes </span> </span>";
			countdown.innerHTML += "<span> <b>" + addZeroBefore(seconds) + "</b> <span> secondes </span> </span>";
		}
		
		// If the count down is finished
		if (distance_start < 0 && distance_end >= 0 && display_done === false) {
			display_done = true;
			display_video(countdown);
		}
		if (distance_end < 0) {
			clearInterval(x);
			display_end(countdown);
		}
	}, 1000);
	
});
