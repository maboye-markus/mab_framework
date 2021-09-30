mab_dom_ready(() => {

	// SLIDER ------------------------------------------

	mab_$(".slider_next").on("click", () => {
		const   currentImg  = mab_$(".active");
		const   nextImg     = currentImg.next();
		
		currentImg.removeClass("active");
		if (nextImg.length)
			nextImg.addClass("active");
		else
			mab_$(".slider_inner > *:first-child").addClass("active");
	});
	
	mab_$(".slider_prev").on("click", () => {
		const   currentImg  = mab_$(".active");
		const   prevImg     = currentImg.prev();
		
		currentImg.removeClass("active");
		if (prevImg.length)
			prevImg.addClass("active");
		else
			mab_$(".slider_inner > *:last-child").addClass("active");
	});

	// LIGHTBOX ------------------------------------------

	let	mab_lightbox = document.querySelectorAll(".mab_lightbox");

	if (mab_lightbox.length > 0) {
		let	mab_lightbox_modal = document.createElement("div");
		let	modal_close = document.createElement("div");

		mab_lightbox_modal.className = "mab_modal";
		mab_lightbox_modal.id = "mab_lightbox_modal";
		mab_lightbox_modal.setAttribute("aria-hidden", "true");
		modal_close.className = "modal_close";
		mab_lightbox_modal.append(modal_close);
		document.body.append(mab_lightbox_modal);
		modal_close.addEventListener("click", (e) => {
			e.preventDefault();

			hidde_modal(mab_lightbox_modal);
		});
	}

	mab_lightbox.forEach((lightbox) => {
		lightbox.addEventListener("click", (e) => {
			e.preventDefault();

			let	modal = document.getElementById("mab_lightbox_modal");
			let	lightbox_clone = lightbox.cloneNode(true);

			lightbox_clone.classList.add("modal_wrapper");
			lightbox_clone.classList.remove("mab_lightbox");
			if (modal) {
				modal.append(lightbox_clone);

				modal.addEventListener("click", (e) => {
					e.preventDefault();

					if (e.target == modal)
						hidde_modal(modal);
				});
				show_modal(modal);
			}
		});
	});

	// END lightbox ------------------------------------------

});
