<!-- ========== TEMPLATE -->

	<!-- ---------- LOADER -->

	<div class="mab_loader">
		<img src="images/loading.gif"/>
	</div>


	<!-- ---------- CHECKBOX -->

	<div class="mab_checkbox">
		<input type="radio || checkbox" name="" value="">
		<label></label>
	</div>


	<!-- ---------- COLLAPSE -->

	<div class="mab_collapse">
		<span class="collapse_button"></span>
		<div class="collapse_content"></div>
	</div>


	<!-- ---------- IMAGE OVERLAY -->

	<div class="mab_image_overlay">
		<img src="images/element.jpg">
		<div class="image_overlay">
			<p>CONTENT</p>
		</div>
	</div>


	<!-- ---------- RADIO -->

	<label class="mab_radio">
		<span class="radio_input"> <input type="radio || checkbox" name="" value="" /> <span class="radio_control"></span> </span>
		<span class="radio_label"></span>
	</label>


	<!-- ---------- AJAX POST -->
	<!-- il suffit de mettre le selector du container ou l'on veut que l'ajax actualise les données dans ajax_target -->
	<form method="post" action="." ajax_target="">


	<!-- ---------- MODAL -->

	<span class="modal_open" href="#modal_id"> open modal </span>
	<span class="modal_open" href="pages/modal.php#modal_id"> open modal with ajax </span>

	<div id="modal_id" class="mab_modal" aria-hidden="true">
		<div class="modal_wrapper">
			<div class="modal_close"></div>
		</div>
	</div>


	<!-- ---------- CAROUSEL -->

	<div class="splide">
		<div class="splide__track">
			<ul class="splide__list">
				<span class="splide__slide" style="background-image: url('https://i.pinimg.com/originals/63/25/f7/6325f7e7d1f9168402881db1c054261d.jpg');"></span>
				<span class="splide__slide" style="background-image: url('images/img_test.jpg');"></span>
				<span class="splide__slide" style="background-image: url('images/img_test.jpg');"></span>
			</ul>
		</div>
	</div>

	<!-- ---------- CAROUSEL FULLSCREEN -->

	<div class="splide_container">
		<div class="splide">
			<div class="splide__track">
				<ul class="splide__list">
					<span class="splide__slide" style="background-image: url('https://i.pinimg.com/originals/63/25/f7/6325f7e7d1f9168402881db1c054261d.jpg');"></span>
					<span class="splide__slide" style="background-image: url('images/img_test.jpg');"></span>
					<span class="splide__slide" style="background-image: url('images/img_test.jpg');"></span>
				</ul>
			</div>
		</div>
		<div class="splide_open"></div>
		<div class="splide_close"></div>
	</div>


	<!-- ---------- FULLSCREEN -->

	<img class="mab_fullscreen" src="images/element.jpg">


	<!-- ---------- SCROLL -->

	<div class="mab_scroll" href="#id"> SCROLL </div>


	<!-- ---------- ANIMATION -->

	<div class="mab_animation"> ANIMATION </div>


<!-- ========== END TEMPLATE -->
