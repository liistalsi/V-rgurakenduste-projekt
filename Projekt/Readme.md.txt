

V�rgurakendused I, kodut��, autor: Liis Talsi, DK14

Antud projekti esimene versioon on valminud V�rgurakendused I aine kodut�� tulemusena IT College esimesel kursusel.

Projekti nimeks on Mari Koertekool

Tegemist on v�ikese veebilehega, kuhu koerte �petajal/juhendajal on v�imalik oma erinevate klientide kohta andmeid salvestada.
Edaspidi saab antud projekti siduda Koertekooli kodulehega, kust saab admin otse sisselogimise lehele liikuda ja admini toiminguid sooritada. 
Hetkel on registreeritud kasutajal (adminil) v�imalik tabelist kiire �levaade saada, olemasolevate koerte profiile l�hemalt vaadata,
muuta v�i kustutada. Lisaks sellele on v�imalik ka koeri tabelisse lisada.

K�esolev projekt on valminud koost��s koerte k�itumish�iretega tegeleva inimesega eesm�rgiga tema igap�eva t��d h�lbustada.

Vol 2. v�iks endas sisaldada:

- Koerte otsingu v�imalust (nii koera nime, kui ka omaniku nime kaudu).
- Failide lisamise v�imalust. Juhul kui on vaja lisada ka nt. koera haiguslugu v�i ametlikud paberid jne.
- Filtreerimist ja ka "tagimist", et oleks v�imalik sarnaste probleemidega koerad v�lja tuua, v�i nt kindla t�u j�rgi sorteerida jne.
- Kasutajate lisamine/regamine.

Edasised arendused selguvad ilmselt kasutuse k�igus.


Testimiseks:

Url: http://veebisiilid.ee/koerad/
Kasutaja: mari
Parool: marikoertekool


"Loo lehek�lje hindamise v�imalus (skaalal 1-5 n�iteks). Kuva v�lja lehek�ljele antud keskmist hinnet. Andmed salvesta andmebaasi."

			$hinnangulisamine = "INSERT INTO `hinnangud`(`hinne`) VALUES ('$u_hinne')";

			} else {

			    echo "mingi jama on?!";
			}

if (isset($_POST['hinne'])) {