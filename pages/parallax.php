<style>
	#parallax {
		display: flex; justify-content: center; align-items: center;
		width: 100%;
		/* overflow-y: hidden; */

		background: grey;
	}
	#parallax_images { margin-left: 30px; }
	#parallax_images > img { width: 100px; display: flex; justify-content: center; align-items: center; flex-direction: column; }
	#parallax_images > span {
		display: block;
		width: 100px; height: 100px;
		background: url("images/sun.svg") no-repeat;
		background-size: contain; background-position: top var(--parallaxY, 0px) right 0px;
	}
	#parallax_images > img:nth-child(1) { margin-left: 50px; }
	#parallax_images > img:nth-child(2) { margin-left: -50px; }
	#parallax_images > img:nth-child(3) { margin-left: 100px; }

	body::after {
		content: '';
		height: 2px;
		position: fixed; top: calc(50% - 1px); right: 0; left: 0; z-index: 10;
		background-color: red;
	}
</style>

<div id="parallax">
	<div id="parallax_text">
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br />
			Corrupti minus minima consequuntur voluptatum alias. <br />
			Necessitatibus, laborum dolorum. Assumenda, voluptas porro.
		</p>
	</div>
	<div id="parallax_images">
		<img class="1" src="images/cloud1.svg" data-parallax="0.3" />
		<img class="2" src="images/cloud2.svg" data-parallax='{"y": 0.4, "rot": 0.05, "from": "top"}' />
		<img class="3" src="images/sun.svg" data-parallax='{"y": 0.5, "rot": -0.1, "from": "bottom"}' />
		<span data-parallax='{"y": 0.5, "variable": true}'></span>
	</div>
</div>

<script type="text/javascript" defer>
	
	function	offsetTop(element, acc = 0) {
		if (element.offsetParent) {
			return (offsetTop(element.offsetParent, acc + element.offsetTop));
		}
		else {
			return (acc + element.offsetTop);
		}
	}

	class Parallax {
		constructor(element) {
			this.element		= element;
			this.elementY		= offsetTop(this.element) + this.element.offsetHeight / 2;
			this.options		= this.parseAttribute();

			// on a besoin de bind this si on utilise pas les fonctions fléchées "() => {}"
			this.onIntersection	= this.onIntersection.bind(this);
			this.onResize		= this.onResize.bind(this);
			this.onScroll		= this.onScroll.bind(this);

			const	observer	= new IntersectionObserver(this.onIntersection);

			observer.observe(element);
			this.onScroll();
		}

		parseAttribute() {
			const	defaultOptions = {
				y			: 0.2,
				rot			: 0,
				from		: "none",
				variable	: false,
			}

			// console.log({ ...defaultOptions, ...JSON.parse(this.element.dataset.parallax), });
			if (this.element.dataset.parallax.startsWith('{')) {
				return ({ ...defaultOptions, ...JSON.parse(this.element.dataset.parallax), });
			}
			return ({ ...defaultOptions, y: parseFloat(this.element.dataset.parallax), });
		}

		onIntersection(entries) {
			for (const entry of entries) {
				if (entry.isIntersecting) {
					document.addEventListener("scroll", this.onScroll);
					window.addEventListener("resize", this.onResize);
					this.elementY = offsetTop(this.element) + this.element.offsetHeight / 2;
				}
				else {
					document.removeEventListener("scroll", this.onScroll);
					window.removeEventListener("resize", this.onResize);
				}
			}
		}

		onResize() {
			this.elementY = offsetTop(this.element) + this.element.offsetHeight / 2;
			this.onScroll();
		}

		onScroll() {
			window.requestAnimationFrame(() => {
				const	screenY		= window.scrollY + window.innerHeight / 2;
				const	diffY		= this.elementY - screenY;
				const	translateY	= diffY * -1 * this.options.y;

				if (this.options.variable) {
					this.element.style.setProperty("--parallaxY", `${translateY}px`);
				}
				else {
					let	transform	= `translateY(${translateY}px)`;

					if (this.options.rot)
						transform += ` rotate(${diffY * this.options.rot}deg)`;

					if (this.options.from == "top" && diffY < 0)
						this.element.style.setProperty("transform", transform);
					else if (this.options.from == "bottom" && diffY > 0)
						this.element.style.setProperty("transform", transform);
					else if (this.options.from == "none")
						this.element.style.setProperty("transform", transform);
				}
			});
		};

		static	bind() {
			return (Array.from(document.querySelectorAll("[data-parallax]")).map((element) => { return (new Parallax(element)); }));
		}
	}

	Parallax.bind();

</script>
