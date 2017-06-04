<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8" />
		<title>Kommentaarid</title>

	</head>

	<body>

		<form method="post" action="?">
		Name: <input type="text" name="name"><br>
		E-mail: <input type="text" name="email"><br>
		Comment: <textarea name="comment"></textarea>
		<input type="submit" name="submit" value="salvesta">
		</form>

		<?php

			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				$u_name = $_POST['name'];
				$u_comment = $_POST['comment'];


				if (empty($_POST['name'])) {
					die("Palun sisesta nimi!");
				}

				if (empty($_POST['comment'])) {
					die("Kommentaari vali ei saa olla tuhi! Palun sisesta kommentaar!");
				}

				$fp = fopen("comments.txt", "a");
				fwrite($fp, "$u_name\t $u_comment\n");
				fclose($fp);			    

			}

				$fp = fopen("comments.txt", "r");
				print "<table><tr><th width\"45%\">Nimi</th><th width=\"55%\">Kommentaar</th></tr>";
				$theData = file("comments.txt");

				foreach($theData as $line) {

					$line = rtrim ($line);
					print("<tr>");
					list($u_name, $u_comment) = explode("\t", $line);
					print("<td>$u_name</td>");
					print("<td>$u_comment</td></tr>");
				}

				print("</table>");

		?>

	</body>

</html>