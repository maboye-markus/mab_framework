mab_dom_ready(() => {

	// LOADER ------------------------------------------

	let	mab_loader = document.querySelector(".mab_loader");

	if (mab_loader) {
		document.body.classList.add("body_no_scroll");
		// window.addEventListener("load", () => {

			if (mab_loader)
				mab_loader.classList.add("loader_hidden");
				document.body.classList.remove("body_no_scroll");
		// });
	}

	// END LOADER ------------------------------------------

	// COLLAPSE ------------------------------------------

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

	// END COLLAPSE ------------------------------------------


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
	const	observer = new IntersectionObserver(callback, options);
	const	animations = document.querySelectorAll(".mab_animation");

	// window.addEventListener("load", () => {
		animations.forEach((animation) => { observer.observe(animation); });
	// });

	// END ANIMATION ------------------------------------------


	// SCROLLING ------------------------------------------

	let	mab_scrolls = document.querySelectorAll(".mab_scroll");

	mab_scrolls.forEach((scroll) => {
		scroll.addEventListener("click", (e) => {
			e.preventDefault();

			let	href = scroll.getAttribute("href");
			let	tmp;

			if (href) {
				tmp = document.querySelector(href);
				if (tmp)
					tmp.scrollIntoView({ behavior: "smooth" });
			}
		});
	});

	// END SCROLLING ------------------------------------------


	// MODAL ------------------------------------------

	let	modals_open = document.querySelectorAll(".modal_open");

	function	show_modal(modal) {
		window.setTimeout(() => { modal.style.display = "flex"; }, 500);
		modal.setAttribute("aria-hidden", "false");
		disable_scroll();
	}

	function	hidde_modal(modal) {
		let	mab_fullscreen = modal.querySelector(".modal_wrapper");

		window.setTimeout(() => {
			modal.style.display = "none";
			if (modal.id == "mab_fullscreen_modal" && mab_fullscreen)
				mab_fullscreen.remove();
		}, 500);
		modal.setAttribute("aria-hidden", "true");
		enable_scroll();
	}

	const	load_modal = async function (url) {
		let		target = "#" + url.split("#")[1];
		let		html = await fetch(url).then(response => response.text());
		let		fragment = document.createRange().createContextualFragment(html);
		let		modal;
		
		if (fragment) {
			modal = fragment.querySelector(target);
			if (modal && modal.classList.contains("mab_modal")) {
				if (!document.querySelector(target))
					document.body.append(modal);
			}
		}
		return(modal);
	}

	const	open_modal = async function (e) {
		e.preventDefault();

		let	href = e.target.getAttribute("href");
		let	modal, close;

		if (href) {
			if (href.startsWith("#"))
				modal = document.querySelector(href);
			else {
				modal = await load_modal(href);
				href = "#" + href.split("#")[1];
				e.target.setAttribute("href", href);
			}
			if (modal) {
				show_modal(modal);
				close = document.querySelector(href + " .modal_close");
				if (close)
					close.addEventListener("click", () => { hidde_modal(modal); });
				modal.addEventListener("click", (e) => {
					e.preventDefault();

					if (e.target == modal)
						hidde_modal(modal);
				});
			}
		}
	}

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

	// END MODAL ------------------------------------------


	// FULLSCREEN ------------------------------------------

	let	mab_fullscreens = document.querySelectorAll(".mab_fullscreen");

	if (mab_fullscreens.length > 0) {
		let	mab_fullscreen_modal = document.createElement("div");
		let	modal_close = document.createElement("div");

		mab_fullscreen_modal.className = "mab_modal";
		mab_fullscreen_modal.id = "mab_fullscreen_modal";
		mab_fullscreen_modal.setAttribute("aria-hidden", "true");
		modal_close.className = "modal_close";
		mab_fullscreen_modal.append(modal_close);
		document.body.append(mab_fullscreen_modal);
		modal_close.addEventListener("click", (e) => {
			e.preventDefault();

			hidde_modal(mab_fullscreen_modal);
		});
	}

	mab_fullscreens.forEach((fullscreen) => {
		fullscreen.addEventListener("click", (e) => {
			e.preventDefault();

			let	modal = document.getElementById("mab_fullscreen_modal");
			let	fullscreen_clone = fullscreen.cloneNode(true);

			fullscreen_clone.classList.add("modal_wrapper");
			fullscreen_clone.classList.remove("mab_fullscreen");
			if (modal) {
				modal.append(fullscreen_clone);

				modal.addEventListener("click", (e) => {
					e.preventDefault();

					if (e.target == modal)
						hidde_modal(modal);
				});
				show_modal(modal);
			}
		});
	});

	// END FULLSCREEN ------------------------------------------

});
