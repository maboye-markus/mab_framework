mab_dom_ready(() => {

	function	show_error(str)
	{
		let error_message = document.getElementById("error_message");

		if (!error_message) {
			let elem = document.createElement("div");

			elem.id = "error_message";
			document.body.appendChild(elem);
			error_message = document.getElementById("error_message");
		};

		let error_style = {
			"position": "fixed",
			"right": "0px", "bottom": "0px", "left": "0px",
			"padding": "20px",
			"background": "#E3625D",
			"color": "#fff",
			"text-align": "center", "text-transform": "uppercase",
			"font-weight": "bold",
			"z-index": 2147483647,
			"transition": "all 0.5s ease",
			"cursor": "pointer",
		};
		Object.assign(error_message.style, error_style);

		error_message.innerText = str;
		error_message.addEventListener("click", () => { error_message.style.bottom = "-100px"; })
		setTimeout(() => { error_message.style.bottom = "-100px"; }, 5000);
	}

	function	is_ascii_string(string)
	{
		let regex = /^[A-ZÀÁÂÄÇÈÉÊËÌÍÎÏÑÒÓÔÖÙÚÛÜa-zàáâäçèéêëìíîïñòóôöùúûü\'\ \-]{2,}$/;
		let	str = string.trim();

		return (str.length < 1 ? false : regex.test(string));
	}

	function	is_code_postal(code_postal)
	{
		let regex = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3,5}$/;

		return (regex.test(code_postal));
	}

	function	is_completion(lieu)
	{
		let	items	= document.querySelectorAll("#ui-id-1 li a");
		let	ret		= false;

		items.forEach((item) => {
			if (item.innerText == lieu) {
				ret = true;
				return ;
			}
		});
		return (ret);
	}

	function	is_email(email)
	{
		let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		return (regex.test(email));
	}

	function	is_phone(phone)
	{
		// let regex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
		let regex = /^[\+]?[0-9]{10,11}$/;

		return (regex.test(phone));
	}

	function	is_valid_input(required)
	{
		let	input = required.querySelector("input");
		if (input == null)
			input = required.querySelector("select");
		if (input == null)
			return (false); 
		let attr_value;
		let	attr_name = input.getAttribute("name");
		let	attr_type = input.getAttribute("type");

		if (attr_type == "radio" || attr_type == "checkbox" || attr_type == "select") {
			let	tmp_input = required.querySelector("input[name=" + attr_name + "]:checked");

			if (tmp_input)
				attr_value = tmp_input.value;
		}
		else
			attr_value = input.value;

		if (attr_value === undefined || attr_value == "") {
			form_error = "Merci de saisir l'ensemble des champs requis.";
			return (false);
		}
		if (attr_name == "email") {
			if (is_email(input.value))
				return (true);
			form_error = "Merci de saisir un Email valide.";
			return (false);
		}
		if (attr_name == "telephone") {
			if (is_phone(input.value))
				return (true);
			form_error = "Merci de saisir un téléphone valide.";
			return (false);
		}
		else if (attr_name == "lieu") {
			if (is_completion(input.value))
				return (true);
			form_error = "Merci d'utiliser la complétion.";
			return (false);
		}
		if (attr_name == "code_postal") {
			if (is_code_postal(input.value))
				return (true);
			form_error = "Merci de saisir un code postale valide.";
			return (false);
		}
		if (attr_name == "nom" || attr_name == "prenom" || attr_name == "ville") {
			if (is_ascii_string(input.value))
				return (true);
			form_error = "Le champ " + attr_name + " est invalide.";
			return (false);
		}
		return (true);
	}

	function	check_form(form)
	{
		form.querySelectorAll(".required").forEach((required) => {
			// on retire par défaut les classes css d'erreurs
			required.classList.remove("form_error_border");
			required.querySelectorAll(".mab_checkbox").forEach((checkbox) => {
				checkbox.classList.remove("form_error_color");
			});
			required.querySelectorAll(".mab_radio").forEach((radio) => {
				radio.classList.remove("form_error_color");
			});

			// pour chaque input on check la validité de sa value
			if (is_valid_input(required) == false) {
				// on ajoute des classes css d'erreurs
				required.classList.add("form_error_border");
				required.querySelectorAll(".mab_checkbox").forEach((checkbox) => {
					checkbox.classList.add("form_error_color");
					required.classList.remove("form_error_border");
				});
				required.querySelectorAll(".mab_radio").forEach((radio) => {
					radio.classList.add("form_error_color");
					required.classList.remove("form_error_border");
				});
				return ;
			}
		});

		// ANTI ROBOTS
		form_tokens.forEach((token) => {
			if (token.value != form_token) {
				form_error = "Merci de saisir l'ensemble des champs requis.";
				return ;
			}
		});
		form_contents.forEach((content) => {
			if (content.value) {
				form_error = "Erreur inconnue.";
				return ;
			}
		});
		if (form_server === undefined)
			form_error = "Erreur inconnue.";
	}
	
	function	ajax_submit_form(target) {
		target.classList.add("loaded");
		target.innerHTML += "FORM SUBMITTED ! ;)";
	}

	// on selectionne tout les formulaires de la page
	let	formulaires = document.querySelectorAll("form");
	let	input_tmp;

	formulaires.forEach((form) => {
		// on append des inputs cachés (anti robots)
		input_tmp = document.createElement("input");
		input_tmp.type = "hidden";
		input_tmp.className = "form_token";
		input_tmp.name = "form_token";
		input_tmp.value = "";
		form.append(input_tmp);

		input_tmp = document.createElement("input");
		input_tmp.type = "hidden";
		input_tmp.className = "form_content";
		input_tmp.value = "";
		form.append(input_tmp);

		// on ajoute un event sur le submit
		form.addEventListener("submit", (e) => {
			// on check les input qui sont envoyés
			check_form(form);
			if (form_error && form_error.length > 0) {
				// un ou plusieurs champs ne sont pas valides
				e.preventDefault();

				show_error(form_error);
				form_error = undefined;
			}
			else {
				// tout les champs sont validés
				let	target = form.getAttribute("ajax_target");
				if (target) {
					// si on veut submit en ajax
					e.preventDefault();

					const	formData		= new FormData(form);
					const	searchParams	= new URLSearchParams();

					for (const pair of formData) {
						searchParams.append(pair[0], pair[1]);
					}

					$.ajax({
						url:			form.getAttribute("action"),
						method:			"POST",
						body:			searchParams,
						contentType:	"application/x-www-form-urlencoded",
						succes:			ajax_submit_form(document.querySelector(target)),
					})
						.done((data) => {
							// console.log(data);
						});
				}
				else {
					// sinon submit par défaut
				}
			}
		});
	});

	// on assigne un token unique aux inputs cachés
	let	form_tokens = document.querySelectorAll(".form_token");
	let	form_contents = document.querySelectorAll(".form_content");
	
	document.querySelectorAll("input").forEach((input) => {
		input.addEventListener("focus", () => {
			// la variable is_done passe a true une fois la valeure assignée une premiere fois pour éviter les multiples appels à cet eventListener
			if (is_done == true)
				return ;
			form_tokens.forEach((token) => { token.value = form_token; });
			is_done = true;
		});
	});

});
