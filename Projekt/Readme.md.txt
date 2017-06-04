

Võrgurakendused I, kodutöö, autor: Liis Talsi, DK14

Antud projekti esimene versioon on valminud Võrgurakendused I aine kodutöö tulemusena IT College esimesel kursusel.

Projekti nimeks on Mari Koertekool

Tegemist on väikese veebilehega, kuhu koerte õpetajal/juhendajal on võimalik oma erinevate klientide kohta andmeid salvestada.
Edaspidi saab antud projekti siduda Koertekooli kodulehega, kust saab admin otse sisselogimise lehele liikuda ja admini toiminguid sooritada. 
Hetkel on registreeritud kasutajal (adminil) võimalik tabelist kiire ülevaade saada, olemasolevate koerte profiile lähemalt vaadata,
muuta või kustutada. Lisaks sellele on võimalik ka koeri tabelisse lisada.

Käesolev projekt on valminud koostöös koerte käitumishäiretega tegeleva inimesega eesmärgiga tema igapäeva tööd hõlbustada.

Vol 2. võiks endas sisaldada:

- Koerte otsingu võimalust (nii koera nime, kui ka omaniku nime kaudu).
- Failide lisamise võimalust. Juhul kui on vaja lisada ka nt. koera haiguslugu või ametlikud paberid jne.
- Filtreerimist ja ka "tagimist", et oleks võimalik sarnaste probleemidega koerad välja tuua, või nt kindla tõu järgi sorteerida jne.
- Kasutajate lisamine/regamine.

Edasised arendused selguvad ilmselt kasutuse käigus.


Testimiseks:

Url: http://veebisiilid.ee/koerad/
Kasutaja: mari
Parool: marikoertekool


"Loo lehekülje hindamise võimalus (skaalal 1-5 näiteks). Kuva välja leheküljele antud keskmist hinnet. Andmed salvesta andmebaasi."

			$hinnangulisamine = "INSERT INTO `hinnangud`(`hinne`) VALUES ('$u_hinne')";

			} else {

			    echo "mingi jama on?!";
			}

if (isset($_POST['hinne'])) {