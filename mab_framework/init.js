let	init_css = [
	// "mab_style_reset",
	"mab_style_normalize",
	// ===== common framework
	"fonts/mab_fonts",
	"mab_style",
	// ===== custom addon
	"mab_img_compare",
	"mab_slider",
	// ===== splide
	"splide.min",
	"mab_splide",
];

let	init_js = [
	// ===== common framework
	"mab_exec",
	// ===== custom addon
	"mab_img_compare",
	// ===== splide
	"mab_splide",
];

let	element;
let	horodatage = new Date().getTime();

init_css.forEach((link) => {
	element			= document.createElement("link");
	element.type	= "text/css";
	element.rel		= "stylesheet";
	element.setAttribute("href", "mab_framework/css/" + link + ".css?h=" + horodatage);
	document.head.append(element);
});

init_js.forEach((script) => {
	element			= document.createElement("script");
	element.defer	= true;
	element.type	= "module";
	element.setAttribute("src", "mab_framework/js/" + script + ".js?h=" + horodatage);
	document.head.append(element);
});
