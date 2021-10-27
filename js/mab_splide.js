import Splide from "./modules/splide.min.js";


// SPLIDE CAROUSEL -----------------------------------------
// link to slick carousel options: https://splidejs.com/


// ---------- FULLSCREEN

let	splides_open	= document.querySelectorAll(".splide_open");
let	splides_close	= document.querySelectorAll(".splide_close");

splides_open.forEach((open) => {
	open.addEventListener("click", (e) => {
		e.preventDefault();

		let	container = open.closest(".splide_container");

		if (container) {
			container.classList.add("splide_fullscreen");
			// disable_scroll();
			container.addEventListener("click", (e) => {
				e.preventDefault();

				if (e.target == container) {
					container.classList.remove("splide_fullscreen");
					// enable_scroll();
				}
			});
		}
	});
});

splides_close.forEach((close) => {
	close.addEventListener("click", (e) => {
		e.preventDefault();

		let	container = close.closest(".splide_container");

		if (container) {
			container.classList.remove("splide_fullscreen");
			// enable_scroll();
		}
	});
});

// ---------- END FULLSCREEN


new	Splide(".splide", {
	type: "loop",
	autoplay: true,
	perPage: 3,
	breakpoints: {
		900: {
			perPage: 1,
		},
	},
	perMove: 1,
	focus: "center",
	// start: 0,
}).mount();
