// DOM READY ------------------------------------------

const	mab_dom_ready = (callback) => {
	if (document.readyState != null && document.readyState != "loading")
		callback();
	else
		document.addEventListener("DOMContentloaded", callback);
}

// END DOM READY ------------------------------------------


// DEBOUNCE / THROTTLE ------------------------------------------

const	debounce = (callback, delay) => {
	let	timer;

	return (function () {
		let	context	= this;
		let	args	= arguments;

		clearTimeout(timer);
		timer = setTimeout(function () {
			callback.apply(context, args);
		}, delay);
	});
};

const	throttle = (callback, delay) => {
	let	last;
	let	timer;

	return (function () {
		let	context	= this;
		let	now		= +new Date();
		let	args	= arguments;

		if (last && now < last + delay) {
			// le délai n'est pas écoulé on reset le timer
			clearTimeout(timer);
			timer = setTimeout(function () {
				last = now;
				callback.apply(context, args);
			}, delay);
		} else {
			last = now;
			callback.apply(context, args);
		}
	});
};

// END DEBOUNCE / THROTTLE ------------------------------------------


// SCROLL EVENTS ------------------------------------------

// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36, left: 37, up: 38, right: 39, down: 40,
let keys = { 38: 1, 40: 1};

function	preventDefault(e) {
	e.preventDefault();
}

function	preventDefaultForScrollKeys(e) {
	if (keys[e.keyCode]) {
		preventDefault(e);
		return false;
	}
}

// modern Chrome requires { passive: false } when adding event
let	supportsPassive = false;
try {
	window.addEventListener("test", null, Object.defineProperty({}, "passive", {
		get: function () { supportsPassive = true; } 
	}));
} catch(e) {}

let	wheelOpt = supportsPassive ? { passive: false } : false;
let	wheelEvent = "onwheel" in document.createElement("div") ? "wheel" : "mousewheel";

function	disable_scroll() {
	// window.addEventListener("DOMMouseScroll", preventDefault, false); // older FF
	// window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
	// window.addEventListener("touchmove", preventDefault, wheelOpt); // mobile
	// window.addEventListener("keydown", preventDefaultForScrollKeys, false);
}

function	enable_scroll() {
	// window.removeEventListener("DOMMouseScroll", preventDefault, false);
	// window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
	// window.removeEventListener("touchmove", preventDefault, wheelOpt);
	// window.removeEventListener("keydown", preventDefaultForScrollKeys, false);
}

// END SCROLL EVENTS ------------------------------------------
