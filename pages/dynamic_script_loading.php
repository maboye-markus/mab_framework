<?php header("Content-type: text/javascript"); ?>

<?php
	if (!isset($_GET) || !isset($_GET["callback"]))
		return ;
?>

var	str = "prenom: <?=$_GET['prenom']?>, nom: <?=$_GET['nom']?>";

var	softwares = {
	"Adobe": [
		"Acrobat",
		"InDesign",
		"Photoshop"
	],
	"Macromedia": [
		"Dreamweaver",
		"Flash",
		"FreeHand"
	],
	"Microsoft": [
		"Office",
		"Visual C++",
		"Windows Media Player"
	]       
};

<?=$_GET["callback"]?>(<?php echo($_GET["callback"] == "str_callback" ? "str" : "softwares");?>);
	