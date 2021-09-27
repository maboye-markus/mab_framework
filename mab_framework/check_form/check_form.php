<style>
	.form_error_border {
		border: 2px solid #E3625D !important;
		/* box-shadow: 0px 0px 3px 1px red; */
		transition: all 0.4s ease;
	}
	.form_error_color, .form_error_color label {
		color: #E3625D !important;
		transition: all 0.4s ease;
	}
</style>

<?php
	if (empty($_SESSION["form_token"])) $_SESSION["form_token"] = md5(uniqid());
?>

<script defer type="text/javascript">
	let	form_error = "";
	let	form_server = "<?=$_SERVER["HTTP_ORIGIN"]?>";
	let	form_token = "<?=$_SESSION['form_token']?>";
	let	is_done = false;
</script>

<script defer type="text/javascript" src="<?=$path?>/check_form/check_form.js"></script>
