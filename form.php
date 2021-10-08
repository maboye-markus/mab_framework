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

	<button type="submit">SUBMIT</button>

</form>
