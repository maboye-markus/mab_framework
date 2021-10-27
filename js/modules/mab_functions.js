// DOM READY ------------------------------------------

export const	mab_dom_ready = (callback) => {
	if (document.readyState != null && document.readyState != "loading")
		callback();
	else
		document.addEventListener("DOMContentloaded", callback);
}

// END DOM READY ------------------------------------------


// DEBOUNCE / THROTTLE ------------------------------------------

export const	debounce = (callback, delay) => {
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

export const	throttle = (callback, delay) => {
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


export default	mab_dom_ready;
