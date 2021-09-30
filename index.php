<?php session_start(); ?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<title>INDEX</title>

		<?php require ("mab_framework/init.php"); ?>

	</head>
	<body style="width: 100vw; height: 400vh;">

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
			<div class="img_comp_img img_comp_overlay" style="background-image: url('images/heritage-apres.jpg');"></div>
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
			}
			#countdown > span {
				color: white;
				font-size: 12px;
				width: 100%; height: 100%;
			}
			#countdown > span:not(:last-child) { border-right: 2px solid red; }
			#countdown > span:not(:first-child) { border-left: 2px solid transparent; }
			#countdown > span b { font-size: 300%; }
		</style>

		<!-- Display the countdown timer in an element -->
		<h2 style="width: 100%; text-align: center; text-transform: uppercase;">on finit dans : </h2>
		<h1 id="countdown" style="font-size: 42px; width: 100%; text-align: center;"></h1>

		<script>
			// Set the date we're counting down to
			// let	countdownDate = new Date("Oct 7, 2021 18:30:00").getTime();
			let	countdownDate = new Date("Sep 30, 2021 18:30:00").getTime();

			// Update the count down every 1 second
			let	x = setInterval(() => {
				// Get today's date and time
				let	now = new Date().getTime();
				
				// Find the distance between now and the count down date
				let	distance = countdownDate - now;
				
				// Time calculations for days, hours, minutes and seconds
				let	days	= Math.floor(distance / (1000 * 60 * 60 * 24));
				let	hours	= Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				let	minutes	= Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				let	seconds	= Math.floor((distance % (1000 * 60)) / 1000);
				
				// Display the result in the element with id="demo"
				// document.getElementById("countdown").innerHTML = "On finit dans <br />" + days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
				
				let	countdown = document.getElementById("countdown");

				countdown.innerHTML = "<span> <b>" + days + "</b> <br /> jours </span>";
				countdown.innerHTML += "<span> <b>" + hours + "</b> <br /> heures </span>";
				countdown.innerHTML += "<span> <b>" + minutes + "</b> <br /> minutes </span>";
				countdown.innerHTML += "<span> <b>" + seconds + "</b> <br /> secondes </span>";
				
				// If the count down is finished, write some text
				if (distance < 0) {
					clearInterval(x);
					countdown.innerHTML = "EXPIRED";
				}
			}, 1000);
		</script>

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

		<form method="post" action="." ajax_target="#ajax_response">
			<div class="required">
				<input name="nom" placeholder="nom" />
			</div>
			<div class="required">
				<input name="c" placeholder="prenom" />
			</div>
			<div class="required">
				<input name="email" placeholder="email" />
			</div>
			<div class="required">
				<input name="telephone" placeholder="téléphone" />
			</div>
			<div class="row_wrapper required">
				<label class="mab_radio">
					<span class="radio_input"> <input type="radio" name="civilite1" value="Mme" /> <span class="radio_control"></span> </span>
					<span class="radio_label"> Mme </span>
				</label>
				<label class="mab_radio">
					<span class="radio_input"> <input type="radio" name="civilite1" Value="M." /> <span class="radio_control"></span> </span>
					<span class="radio_label"> M. </span>
				</label>
			</div>
			<!-- <div class="row_wrapper required">
				<div class="mab_checkbox">
					<input type="radio" name="civilite2" value="Mme">
					<label>Mme</label>
				</div>
				<div class="mab_checkbox">
					<input type="radio" name="civilite2" value="M.">
					<label>M.</label>
				</div>
			</div> -->
			<!-- <div class="required">
				<select name="pets" id="pet-select">
				    <option value="">--Please choose an option--</option>
				    <option value="dog">Dog</option>
				    <option value="cat">Cat</option>
				    <option value="hamster">Hamster</option>
				    <option value="parrot">Parrot</option>
				    <option value="spider">Spider</option>
				    <option value="goldfish">Goldfish</option>
				</select>
			</div> -->
			<button>SUBMIT</button>
		</form>

		<br /><br />

		<script type="text/javascript">
			function	send(url, params) {
				for (name in params) {
					// si indexOf('?') == -1 c'est qu'il n'y a pas de '?'
					if (url.indexOf('?') != -1) {
						url += '&';
					}
					else {
						url += '?';
					}
					url += encodeURIComponent(name) + '=' + encodeURIComponent(params[name]);
				}
				let	tmp_script  = document.createElement("script");

				tmp_script.src  = url;
				tmp_script.type = "text/javascript";
				document.body.appendChild(tmp_script);
				document.body.removeChild(tmp_script);
			}

			function	str_callback(str) {
				alert(str);
			}

			function	json_callback(json) {
        		let	tree = "";
        
        		for (item in json) { 
        		    tree += item + '\n';
        		    for (let i = 0, n = json[item].length; i < n; i++) {
        		        tree += '\t' + softwares[item][i] + '\n';
        		    }
        		}
        		alert(tree);
			}

			function	get_infos(choose) {
				if (choose == "str")
					send("dynamic_script_loading.php", { nom: "doe", prenom: "john", callback: "str_callback", });
				else if (choose == "json")
					send("dynamic_script_loading.php", { callback: "json_callback", });
			}
		</script>

		<button onclick="get_infos('str')" style="cursor: pointer;">Envoyer la requête str</button>
		<br /><br />
		<button onclick="get_infos('json')" style="cursor: pointer;">Envoyer la requête json</button>

		<br /><br />

		<p id="test_p" class="mab_scroll fsize_vlg" href="#test_scroll1"> TEST ANCHOR 1 </p>
		<p id="test_p" class="mab_scroll fsize_lg" href="#test_scroll2"> TEST ANCHOR 2 </p>

		<br /><br />

		<button class="modal_open" href="#modal1" style="cursor: pointer; padding: 15px 40px;">open modal</button>

		<br /><br />

		<button class="modal_open" href="modal.html#modal2" style="cursor: pointer; padding: 15px 40px;">open modal with ajax</button>

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
			<div class="mab_slider">
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

		<script type="text/javascript">

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
			
		</script>

		<br /><br />

		<?php require ("scroll_animation.php"); ?>

		<br /><br />

		<?php require ("parallax.php"); ?>

		<br /><br />


		<img style="width: 200px;" class="mab_lightbox" src="https://i.pinimg.com/originals/63/25/f7/6325f7e7d1f9168402881db1c054261d.jpg"><br />
		<img src="https://www.wallpapertip.com/wmimgs/9-97325_ultra-hd-wallpaper-8k-resolution-nature-nature-in.jpg"><br />

		<br /><br />

		<div id="test_scroll1" style="background: red; padding: 20px; margin: auto;" class="bounce mab_animation fade_in fit_width column_wrapper">
			<p>Lorem ipsum dolor sit.</p>
			<p>Lorem ipsum dolor sit.</p>
			<p>Lorem ipsum dolor sit.</p>
		</div>

		<br /><br />

		<div id="test_scroll2" style="background: green; padding: 20px; margin: auto;" class="mab_animation slide_from_left fit_width column_wrapper">
			<p>Lorem ipsum dolor sit.</p>
			<p>Lorem ipsum dolor sit.</p>
			<p>Lorem ipsum dolor sit.</p>
		</div>

		<br /><br />


		<p id="test_scroll3" style="background: blue; padding: 20px; margin: auto;" class="mab_animation slide_from_right mab_scroll fit_content" href="body">
			SCROLL TOP
		</p>

		<br /><br /><br /><br /><br /><br />

	</body>

</html>
