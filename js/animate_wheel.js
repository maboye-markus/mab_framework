function	toggle_params(param) {
	if (param.current < param.start)	param.current = param.start;
	if (param.current > param.end)		param.current = param.end;
}

function	set_animation_step(param, toggle) {
	let	st = window.pageYOffset || document.documentElement.scrollTop;
	
	if (st > param.lst) {	// downscroll
		param.current += param.step;
	} else {				// upscroll
		param.current -= param.step;
	}
	
	toggle === true ? toggle_params(param) : 0;
	
	param.lst = st <= 0 ? 0 : st;
}

function	animate_roue (roue, params) {
	// roue.style.transform = "rotate3d(1, 0, 1, " + params.rot.current + "deg)" + " scale(" + params.scale.current + ")";
	roue.style.transform = "rotateZ(" + params.rot.current + "deg)" + " scale(" + params.scale.current + ")";
}

const	handle_animation = () => {
	
	// static variable
	if (handle_animation.params === undefined) {
		handle_animation.params = {
			scale	: {
				lst		: 0,
				step	: 0.01,
				start	: 0.1,
				end		: 1,
				current	: 0.1,
			},
			rot		: {
				lst		: 0,
				step	: 9,
				start	: -360,
				end		: 360,
				current	: 0,
			},
		};
	}
	
	let	roue = document.querySelector("#roue");
	
	set_animation_step(handle_animation.params.scale, true);
	set_animation_step(handle_animation.params.rot, false);
	
	animate_roue(roue, handle_animation.params);
};

const	callback = (entries, observer) => {
	entries.forEach((entry) => {
		// const	throttle_animation = throttle(handle_animation, 25);
		const	throttle_animation = handle_animation;
		
		if (entry.isIntersecting) {
			document.addEventListener("scroll", throttle_animation);
		}
		else {
			document.removeEventListener("scroll", throttle_animation);
		}
	});
};

const	options = {
	// between 0 and 1 => % of the item visible to get an intersection
	threshold: 1,
	// margin detection to get an intersection
	// rootMargin: "0px 0px -150px 0px",
};
const	observer = new IntersectionObserver(callback, options);

// on verifie que le bloc à animer au scroll est dans la range de l'écran
observer.observe(document.querySelector("#anim_scroll"));
