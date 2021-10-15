<?php session_start(); ?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<title>INDEX</title>

		<?php require ("mab_framework/init.php"); ?>

	</head>
	<body style="width: 100vw; height: 1000vh;">

		<!-- <div class="mab_loader">
			<img src="images/loading.gif"/>
		</div> -->

		<style>
			.collapse_button {
				display: flex;
				background: #333;
				padding: 20px;
				color: #fff;
			}
			.collapse_content {
				background: #eee;
				color: #333;
			}
			.collapse_content p {
				padding: 15px;
			}
		</style>

		<div class="mab_collapse">
			<span class="collapse_button"> COLLAPSE </span>
			<div class="collapse_content">
				<!-- <div class="mab_collapse">
					<span class="collapse_button"> COLLAPSE </span>
					<div class="collapse_content"> -->
						<p style="font-family: baloo_2;" class="column_wrapper">
							<b>Nemo eius eveniet incidunt odit sapiente ipsa minima illum ad placeat suscipit deleniti,</b>
							<span style="font-weight: 100;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis ducimus dolor nobis est.</span>
							<span style="font-weight: 300;">aut culpa esse exercitationem dolore unde veniam nulla voluptate aliquid fuga, in velit, neque ut totam?</span>
							<span style="font-weight: normal;">aut culpa esse exercitationem dolore unde veniam nulla voluptate aliquid fuga, in velit, neque ut totam?</span>
							<span style="font-weight: bold;">aut culpa esse exercitationem dolore unde veniam nulla voluptate aliquid fuga, in velit, neque ut totam?</span>
						</p>
					<!-- </div>
				</div> -->
			</div>
		</div>

		<br /><br />

		<div class="mab_img_comp">
			<div class="img_comp_img img_comp_overlay" style="background-image: url('images/heritage-avant.jpg');"></div>
			<div class="img_comp_img" style="background-image: url('images/heritage-apres.jpg');"></div>
		</div>

		<script defer>
			mab_img_compare();
		</script>

		<br /><br />

		<style>
			#countdown {
				display: grid; justify-content: center; align-items: center;
				grid-template-columns: repeat(4, 70px);
				background: black; padding: 20px;
				width: 500px; height: 300px;
				position: relative;
				color: white;
			}
			#countdown > span {
				color: white;
				font-size: 12px;
				width: 100%; height: 100%;
			}
			#countdown > span:not(:last-child) { border-right: 2px solid red; }
			#countdown > span:not(:first-child) { border-left: 2px solid transparent; }
			#countdown > span b { font-size: 300%; }

			.mab_display { position: absolute; top: 0; right: 0; bottom: 0; left: 0; width: 100%; height: 100%; }
		</style>

		<!-- Display the countdown timer in an element -->
		<h1 id="countdown" style="font-size: 42px; width: 100%; text-align: center;"></h1>

		<script defer type="text/javascript" src="js/countdown.js?t=<?=time();?>"></script>

		<br /><br />

		<style>
			form .required {
				margin: 10px;
				width: fit-content;
			}
			#ajax_response.loaded {
				padding: 30px; background: #333; color: #fff;
			}
		</style>

		<div id="ajax_response"></div>

		<br /><br />

		<?php require ("pages/form.php"); ?>

		<br /><br />

		<?php require ("pages/dynamic_script.php"); ?>

		<br /><br />

		<p id="test_p" class="mab_scroll fsize_vlg" href="#test_scroll1"> TEST ANCHOR 1 </p>
		<p id="test_p" class="mab_scroll fsize_lg" href="#test_scroll2"> TEST ANCHOR 2 </p>

		<br /><br />

		<button class="modal_open" href="#modal1" style="cursor: pointer; padding: 15px 40px;">open modal</button>

		<br /><br />

		<button class="modal_open" href="pages/modal.html#modal2" style="cursor: pointer; padding: 15px 40px;">open modal with ajax</button>

		<br /><br />

		<img style="width: 200px;" class="mab_lightbox" lb-id="mab" src="https://i.pinimg.com/originals/63/25/f7/6325f7e7d1f9168402881db1c054261d.jpg"><br />
		<img style="width: 200px;" class="mab_lightbox" lb-id="mab" src="https://www.wallpapertip.com/wmimgs/9-97325_ultra-hd-wallpaper-8k-resolution-nature-nature-in.jpg"><br />

		<br /><br />

		<style>
			.modal_wrapper.row_wrapper {
				justify-content: flex-start;
			}
			.modal_wrapper > .row_wrapper {
				background: red; margin: 0 15px;
				min-width: 300px; min-height: 300px;
			}
		</style>
		
		<div id="modal1" class="mab_modal" aria-hidden="true">
			<div class="modal_wrapper row_wrapper">
				
				<div class="row_wrapper" style="text-align: center;">Lorem ipsum dolor sit.</div>
				<div class="row_wrapper" style="text-align: center;">Lorem ipsum dolor sit.</div>
				<div class="row_wrapper" style="text-align: center;">Lorem ipsum dolor sit.</div>

				<div class="modal_close"></div>
			</div>
		</div>

		<br /><br />

		<style>
			.mab_slider_container {
				width: 500px; height: 300px;
				margin: auto;
			}
		</style>

		<div class="mab_slider_container">
			<div class="mab_slider" id="mab_slider">
				<img class="slider_next" src="images/next.png">
				<img class="slider_prev" src="images/prev.png">
				<div class="slider_inner">
					<span class="active" style="background: url('https://i.pinimg.com/originals/63/25/f7/6325f7e7d1f9168402881db1c054261d.jpg') no-repeat; background-size: contain; background-position: center;"></span>
					<span style="background: url('https://www.wallpapertip.com/wmimgs/9-97325_ultra-hd-wallpaper-8k-resolution-nature-nature-in.jpg') no-repeat; background-size: contain; background-position: center;"></span>
					<span style="background: url('https://i.pinimg.com/originals/63/25/f7/6325f7e7d1f9168402881db1c054261d.jpg') no-repeat; background-size: contain; background-position: center;"></span>
					<span style="background: url('https://www.wallpapertip.com/wmimgs/9-97325_ultra-hd-wallpaper-8k-resolution-nature-nature-in.jpg') no-repeat; background-size: contain; background-position: center;"></span>
					<span style="background: url('https://i.pinimg.com/originals/63/25/f7/6325f7e7d1f9168402881db1c054261d.jpg') no-repeat; background-size: contain; background-position: center;"></span>
					<span style="background: url('https://www.wallpapertip.com/wmimgs/9-97325_ultra-hd-wallpaper-8k-resolution-nature-nature-in.jpg') no-repeat; background-size: contain; background-position: center;"></span>
				</div>
			</div>
		</div>

		<br /><br />

		<style>
			.splide_container {
				width: 50%; height: 300px;
				margin: auto;
			}
		</style>

		<div class="splide_container">
			<div id="test" class="splide">
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

		<br /><br />

		<div class="mab_image_overlay">
			<img src="images/img_test.jpg">
			<div class="image_overlay">
				<p>CONTENT</p>
			</div>
		</div>

		<br /><br />

		<style>
			#anim_scroll { width: 100%; display: flex; justify-content: center; }
			#roue { transform: scale(0.1); }
		</style>

		<div id="anim_scroll">
			<img id="roue" src="images/roue.png"></div>
		</div>

		<br /><br />

		<script defer type="text/javascript" src="js/animate_wheel.js?t=<?=time();?>"></script>

		<br /><br />

		<?php require ("pages/scroll_animation.php"); ?>

		<br /><br />

		<?php require ("pages/parallax.php"); ?>

		<br /><br />

		<img src="https://www.wallpapertip.com/wmimgs/9-97325_ultra-hd-wallpaper-8k-resolution-nature-nature-in.jpg"><br />

		<br /><br />

		<div id="test_scroll1" style="background: red; padding: 20px; margin: auto;" class="bounce mab_animation fade_in fit_width column_wrapper">
			<p>Lorem ipsum dolor sit.</p>
			<p>Lorem ipsum dolor sit.</p>
			<p>Lorem ipsum dolor sit.</p>
		</div>

		<br /><br />

		<div id="test_scroll2" style="background: green; padding: 20px; margin: auto;" class="shake mab_animation slide_from_left fit_width column_wrapper">
			<p>Lorem ipsum dolor sit.</p>
			<p>Lorem ipsum dolor sit.</p>
			<p>Lorem ipsum dolor sit.</p>
		</div>

		<br /><br />


		<p id="test_scroll3" style="background: blue; padding: 20px; margin: auto;" class="mab_animation slide_from_right mab_scroll fit_content" href="body">
			SCROLL TOP
		</p>

		<br /><br /><br /><br />

	</body>

</html>
