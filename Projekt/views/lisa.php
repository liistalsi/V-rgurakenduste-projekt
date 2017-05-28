<?php

	if (!isset($_SESSION['user'])) {

		header("Location: ../index.php");
	}

	require 'common/connection.php';
?>

<div class="container profile edit add">


	<div class="imageContainer">

		🐶

	</div>

	<div class="profileContainer">

		<div class="heading">
		
			<h2>
				
				Palun sisesta koera andmed

			</h2>
			
		</div>		

		<div class="table">

			<form method="post" action="?lisakoer" enctype="multipart/form-data">

				<input type="text" name="lisakoer" class="hidden" value="lisakoer">
				
				<div class='row'>
					<div>
						Koera nimi:
					</div>
					<div>
						<input name='nimi' type='text' value="" placeholder="Koera nimi">
					</div>
				</div>
				
				<div class='row'>
					<div>
						Koera sünnikuupäev:
					</div>
					<div>
						<input name='synnikuupaev' type='text' value="" placeholder="Koera sünnikuupäev">
					</div>
				</div>

				<div class='row'>
					<div>
						Sugu:
					</div>
					<div>
						<input name='sugu' type='text' value="" placeholder="Sugu">
					</div>
				</div>

				<div class='row'>
					<div>
						Tõug:
					</div>
					<div>
						<input name='toug' type='text' value="" placeholder="Tõug">
					</div>
				</div>

				<div class='row'>
					<div>
						Omaniku nimi:
					</div>
					<div>
						<input name='omanik' type='text' value="" placeholder="Omaniku nimi">
					</div>
				</div>

				<div class='row'>
					<div>
						Kontaktnumber:
					</div>
					<div>
						<input name='kontaktnumber' type='text' value="" placeholder="Kontaktnumber">
					</div>
				</div>

				<div class='row'>
					<div>
						E-mail:
					</div>
					<div>
						<input name='email' type='text' value="" placeholder="E-mail">
					</div>
				</div>

				<div class='row multiline'>
					<div>
						Probleemi kirjeldus:
					</div>
					<div>
						<textarea name='probleem' placeholder="Probleemi kirjeldus"></textarea>
					</div>
				</div>

				<div class='row multiline'>
					<div>
						Lahenduse märkmed:
					</div>
					<div>
						<textarea name='ravi' placeholder="Lahenduse märkmed"></textarea>
					</div>
				</div>

				<div class='row multiline'>
					<div>
						Lisamärkmed:
					</div>
					<div>
						<textarea name='markmed' placeholder="Lisamärkmed"></textarea>
					</div>
				</div>

				<div class='row'>
					<div>
						Lisa koera pilt:
					</div>
					<div>
						<input type='file' name='pilt' />
					</div>
				</div>

				<input type="submit" name="submit" value="Salvesta">

			</form>
		</div>
	</div>
</div>

