<?php
//********************
$adresse = 'localhost';
$nomr = 'midl1';
$motdepasse = 'midl1';
$database = 'midl1';
//********************
$db1=mysql_connect($adresse, $nomr, $motdepasse,true);
mysql_select_db($database,$db1);
//fonction qui teste si le login existe ou pas
function testlogin($login)
{
$adresse = 'localhost';
$nomr = 'midl1';
$motdepasse = 'midl1';
$database = 'midl1';
//********************
$db1=mysql_connect($adresse, $nomr, $motdepasse,true);
mysql_select_db($database,$db1);

$requete="SELECT * FROM ch_membres WHERE login='$login'";
$reponse = mysql_query($requete,$db1)or die (mysql_error());

// On affiche chaque entrée une à une
$i=0;
	while ($donnees= mysql_fetch_assoc($reponse))
	{
	$i++;
	}
	if($i==0) return "<p style='color:#0F0'>valide</p>";
	else return "<p style='color:#F00'>non valide</p>";
}
// Fonction principale qui calcule et renvoi le score de mot selon le formule de Scrabble.
function calcul_score($tableau)
{
	$score=0;
	$tab_car = array (
	    "A"  => 1,
	    "B"  => 1,
	    "C"  => 3,
	    "D"  => 2,
	    "E"  => 1,
	    "F"  => 4,
	    "G"  => 2,
	    "H"  => 4,
	    "I"  => 1,
	    "J"  => 8,
	    "K"  => 5,
	    "L"  => 1,
	    "M"  => 3,
	    "N"  => 1,
	    "O"  => 1,
	    "P"  => 3,
	    "Q"  => 10,
	    "R"  => 1,
	    "S"  => 1,
	    "T"  => 1,
	    "U"  => 1,
	    "V"  => 4,
	    "W"  => 4,
	    "X"  => 8,
	    "Y"  => 4,
	    "Z"  => 10
		
		);
	
	 
	 // on convertie chaque caractère en majuscule pour éviter l'interprétation des caractères accentuées
$score_partie=0;
//for($var=0;$var<10;$var++)
for($var=0;$var<sizeof($tableau);$var++)
{
	$mot=$tableau[$var];
	$mot=strtoupper($mot);
	$score=0;
	for($i=0;$i<strlen($mot);$i++)
	{
		$x=$mot[$i];
		if(isset($tab_car["$x"]))
			$score+=$tab_car["$x"];
	}
	$score_partie+=$score;
}
	

	return $score_partie;


}


function terminer_jeu($tab,$id)
{
$adresse = 'localhost';
$nomr = 'midl1';
$motdepasse = 'midl1';
$database = 'midl1';
//********************
$db1=mysql_connect($adresse, $nomr, $motdepasse,true);
mysql_select_db($database,$db1);
	$score_partie=calcul_score($tab); //calcul score de tab de mot
	$requete="INSERT INTO  ch_partie (id_partie,idmembre,score)VALUES( '','$id','$score_partie')";
	$reponse = mysql_query($requete,$db1)or die (mysql_error());
	$sql="SELECT score FROM ch_membres WHERE idmembre='$id'";  // on recépère l'ancien score de joueur
	$rsl=mysql_query($sql,$db1)or die (mysql_error());
	$rslt= mysql_fetch_row($rsl);
	$score=$rslt[0]+$score_partie;  // on additionne le nouveau score à celui récuperer												
	$sql="UPDATE ch_membres set score='$score' WHERE idmembre='$id'"; // on remplace l'ancien score par celui calculé.
	$rsl=mysql_query($sql,$db1)or die (mysql_error());
	return $score;
	
	
}


?>
