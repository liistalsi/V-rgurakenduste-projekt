<?php

	if (!isset($_SESSION['user'])) {

		header("Location: ../index.php");
	}

	require 'common/connection.php';
	$nimeparing = mysqli_query($mysqli, "SELECT nimi FROM `koerad` WHERE id = '".$id."'");
	$pildiparing = mysqli_query($mysqli, "SELECT pilt FROM `koerad` WHERE id = '".$id."'");
	$koerteparing = mysqli_query($mysqli, "SELECT * FROM `koerad` WHERE id = '".$id."'");
?>

<div class="container profile">

	<div class="imageContainer">

		<?php
			while($row = mysqli_fetch_array($pildiparing)) {

				if ($row['pilt'] != "") {
					echo "<img src='" . $row['pilt'] . "' alt='Koera pilt' />";

				} else {
					echo "🐶";
				}				
			}

		?>

	</div>

	<div class="profileContainer">

		<div class="heading">
		
			<h2>
				
				<?php
					while($row = mysqli_fetch_array($nimeparing)) {

						echo $row['nimi'];
					}

				?>

				<a class="block" href="?id=<?php echo $id ?>&action=muuda">
					Muuda koera andmeid		
				</a>
			</h2>
				
		</div>		

		<div class="table">
			
			<?php

				while($row = mysqli_fetch_array($koerteparing)) {

					echo "

					<div class='row'>
						<div>
							Koera nimi:
						</div>
						<div>
							" . $row['nimi'] . "
						</div>
					</div>
					
					<div class='row'>
						<div>
							Koera sünnikuupäev:
						</div>
						<div>
							" . $row['synnikuupaev'] . "
						</div>
					</div>

					<div class='row'>
						<div>
							Sugu:
						</div>
						<div>
							" . $row['sugu'] . "
						</div>
					</div>

					<div class='row'>
						<div>
							Tõug:
						</div>
						<div>
							" . $row['toug'] . "
						</div>
					</div>

					<div class='row'>
						<div>
							Omaniku nimi:
						</div>
						<div>
							" . $row['omanik'] . "
						</div>
					</div>

					<div class='row'>
						<div>
							Kontaktnumber:
						</div>
						<div>
							" . $row['kontaktnumber'] . "
						</div>
					</div>

					<div class='row'>
						<div>
							E-mail:
						</div>
						<div>
							" . $row['email'] . "
						</div>
					</div>

					<div class='row multiline'>
						<div>
							Probleemi kirjeldus:
						</div>
						<div>
							" . $row['probleem'] . "
						</div>
					</div>

					<div class='row multiline'>
						<div>
							Lahenduse märkmed:
						</div>
						<div>
							" . $row['ravi'] . "
						</div>
					</div>

					<div class='row multiline'>
						<div>
							Lisamärkmed:
						</div>
						<div>
							" . $row['markmed'] . "
						</div>
					</div>

					";
				}
			?>

		</div>
	</div>
</div>

