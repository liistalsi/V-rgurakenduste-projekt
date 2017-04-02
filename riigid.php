riigid.php

<?php

 $riigid = array( 
  array('nimi'=>'Venemaa', 'populatsioon'=>'143 500 000', 'pealinn' => 'Moskva', 'riigikeel' => 'vene'), 
  array('nimi'=>'Soome', 'populatsioon'=>'5 439 000', 'pealinn' => 'Helsinki', 'riigikeel' => 'soome'), 
  array('nimi'=>'Rootsi', 'populatsioon'=>'9 593 000', 'pealinn' => 'Stockholm', 'riigikeel' => 'rootsi'), 
  array('nimi'=>'USA', 'populatsioon'=>'318 900 000', 'pealinn' => 'Washington, D.C.', 'riigikeel' => 'inglise'), 
  array('nimi'=>'Mehhiko', 'populatsioon'=>'122 300 000', 'pealinn' => 'Mexico City', 'riigikeel' => 'hispaania'), 
 );

 foreach ($riigid as &$riik) {
  
  $nimi = $riik["nimi"];
  $populatsioon = $riik["populatsioon"];
  $pealinn = $riik["pealinn"];
  $riigikeel = $riik["riigikeel"];

  include "riigid.html";

 }

?>