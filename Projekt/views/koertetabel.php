<?php
	if (!isset($_SESSION['user'])) {

		header("Location: ../index.php");
	}
?>

<div class="container view">

	<div class="actions">
		
		<a class="block" href="?action=lisa">
			🐶 Lisa uus koer andmebaasi
		</a>

	</div>

	<div class="table">
		
		<div class="row heading">
			
			<div>
				Koera nimi
			</div>
			<div>
				Omaniku nimi
			</div>
			<div>
				Kontakt #
			</div>
			<div>
				Tegevused
			</div>

		</div>

		<?php

			require 'common/connection.php';

			$koerteparing = mysqli_query($mysqli, "SELECT * FROM koerad WHERE kustutatud = 0");

			while($row = mysqli_fetch_array($koerteparing)) {

				echo "

				<div class='row'>
					<div class='koeranimi'>
						" . $row['nimi'] . "
					</div>
					<div>
						" . $row['omanik'] . "
					</div>
					<div>
						" . $row['kontaktnumber'] . "
					</div>
					<div>
						<a href='?id=" . $row['id'] . "'>Profiil</a>
						<a href='?id=" . $row['id'] . "&action=muuda'>Muuda</a>
						<a class='kustutakoer' data-id=" . $row['id'] . " href='?id=" . $row['id'] . "'>Kustuta</a>
					</div>
				</div>";
			}
		?>

	</div>

</div>