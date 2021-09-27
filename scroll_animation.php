<style>
	#my_animation { width: 100%; height: 500px; display: flex; justify-content: center; overflow-x: hidden; }
	#my_animation > div { width: 50%; height: 100%; transition: all 0.1s ease; }
	#un { background: red; }
	#deux { background: green; }
</style>


<div id="my_animation">
	<div id="un"></div>
	<div id="deux"></div>
</div>

<script type="text/javascript" defer>

function	my_animation_step(param, toggle) {
	let	st = window.pageYOffset || document.documentElement.scrollTop;
	
	if (st > param.lst) {	// downscroll
		param.current += param.step;
	} else {				// upscroll
		param.current -= param.step;
	}

	param.lst = st <= 0 ? 0 : st;
}

function	animate_blocs (params) {
	let	un		= document.querySelector("#un");
	let	deux	= document.querySelector("#deux");

	un.style.transform = "translateX(" + params.un.current + "%)";
	deux.style.transform = "translateX(" + params.deux.current + "%)";
}

function	my_animation() {
	
	let	bi = document.querySelector("#my_animation").getBoundingClientRect();

	let	wtop = window.scrollY;
	let	wbottom = wtop + window.innerHeight;

	let	step = bi.height / 100;

	// static variable
	if (my_animation.params === undefined) {
		my_animation.params = {
			un		: {
				lst		: 0,
				step	: -step,
				start	: 0,
				end		: -50,
				current	: 0,
			},
			deux	: {
				lst		: 0,
				step	: step,
				start	: 0,
				end		: 50,
				current	: 0,
			},
		};
	}
	
	my_animation_step(my_animation.params.un);
	if (my_animation.params.un.current > my_animation.params.un.start)
		my_animation.params.un.current = my_animation.params.un.start
	if (my_animation.params.un.current < my_animation.params.un.end)
		my_animation.params.un.current = my_animation.params.un.end

	my_animation_step(my_animation.params.deux);
	if (my_animation.params.deux.current < my_animation.params.deux.start)
		my_animation.params.deux.current = my_animation.params.deux.start
	if (my_animation.params.deux.current > my_animation.params.deux.end)
		my_animation.params.deux.current = my_animation.params.deux.end

	animate_blocs(my_animation.params);
};

const	my_callback = (entries, observer) => {
	entries.forEach((entry) => {
		// const	animation = throttle(my_animation, 50);
		const	animation = my_animation;
		
		if (entry.isIntersecting) {
			document.addEventListener("scroll", animation);
		}
		else {
			document.removeEventListener("scroll", animation);

			// if (my_animation.params) {
				
			// }
		}
	});
};

const	my_observer = new IntersectionObserver(my_callback, { threshold: 1, });

my_observer.observe(document.querySelector("#my_animation"));

</script>