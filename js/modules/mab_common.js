import { open_modal, hidde_modal } from "./mab_modals.js";


// ANIMATION ------------------------------------------
	
const	callback = (entries, observer) => {
	let	animation;
		
	entries.forEach((entry) => {
		animation = entry.target;
		if (entry.isIntersecting) {
			animation.classList.add("animated");

			// to replay animation each time comment this line and uncomment else part
			observer.unobserve(animation);
		}
		else {
			// animation.classList.remove("animated");
		}
	});
};
const	options = {
	// between 0 and 1 => % of the item visible to get an intersection
	threshold: 0,
	// margin detection to get an intersection
	rootMargin: "0px 0px -150px 0px",
};

export const	mab_animations = () => {
	const	observer = new IntersectionObserver(callback, options);
	const	animations = document.querySelectorAll(".mab_animation");
	
	// window.addEventListener("load", () => {
		animations.forEach((animation) => { observer.observe(animation); });
	// });
}

// END ANIMATION ------------------------------------------


export const	mab_collapse = () => {
	let	mab_collapses_btn = document.querySelectorAll(".collapse_button");

	mab_collapses_btn.forEach((btn) => {
		btn.addEventListener("click", (e) => {
			e.preventDefault();
	
			let	collapse = btn.closest(".mab_collapse")
	
			if (collapse) {
				if (collapse.classList.contains("collapse_activated"))
					collapse.classList.remove("collapse_activated");
				else
					collapse.classList.add("collapse_activated");
			}
		});
	});
};

export const	mab_loader = () => {
	let	mab_loader = document.querySelector(".mab_loader");

	if (mab_loader) {
		document.body.classList.add("body_no_scroll");
		window.addEventListener("load", () => {
			if (mab_loader) {
				mab_loader.classList.add("loader_hidden");
				document.body.classList.remove("body_no_scroll");
			}
		});
	}
};

export const	mab_modals = () => {
	let	modals_open = document.querySelectorAll(".modal_open");

	modals_open.forEach((open) => { open.addEventListener("click", open_modal) });
	
	let	all_modals = document.querySelectorAll(".mab_modal");
	
	if (all_modals.length > 0 || modals_open.length > 0) {
		window.addEventListener("keydown", (e) => {
			if (e.key === "Escape" || e.key === "Esc") {
				let	all_modals = document.querySelectorAll(".mab_modal");
	
				all_modals.forEach((modal) => {
					hidde_modal(modal);
				});
			}
		});
	}	
};

export const	mab_scroll = () => {
	let	mab_scrolls = document.querySelectorAll(".mab_scroll");

	mab_scrolls.forEach((scroll) => {
		scroll.addEventListener("click", (e) => {
			e.preventDefault();
	
			let	href = scroll.getAttribute("href");
			let	tmp, top;
	
			if (href) {
				tmp = document.querySelector(href);
				if (tmp)
					top = tmp.offsetTop;
					window.scrollTo({
						top: top,
						behavior: "smooth",
					});
			}
		});
	});
};


export default 	mab_modals;
