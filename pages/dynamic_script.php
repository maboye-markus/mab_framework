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
		send("pages/dynamic_script_loading.php", { nom: "doe", prenom: "john", callback: "str_callback", });
		else if (choose == "json")
		send("pages/dynamic_script_loading.php", { callback: "json_callback", });
	}
</script>

<button onclick="get_infos('str')" style="cursor: pointer;">Envoyer la requête str</button>
<br /><br />
<button onclick="get_infos('json')" style="cursor: pointer;">Envoyer la requête json</button>
