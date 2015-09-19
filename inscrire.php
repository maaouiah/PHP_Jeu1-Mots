<?php
session_start();
include("identifiants.php");
if(($_GET['login']!="")&&($_POST['pwd']!="")&&($_POST['nom']!="")&&($_POST['prenom']!="")&&($_POST['email']!=""))
{
$adresse = 'localhost';
$nomr = 'midl1';
$motdepasse = 'midl1';
$database = 'midl1';
//********************
$db1=mysql_connect($adresse, $nomr, $motdepasse,true);
mysql_select_db($database,$db1);

		$login=($_GET['login']);
		$pwd = ($_POST['pwd']);
		$nom=$_POST['nom'];
		$prenom = ($_POST['prenom']);
		$email = ($_POST['email']);
		$requete="INSERT INTO ch_membres (idmembre,login,pwd,nom,prenom,email,score)VALUES( '','$login','$pwd','$nom','$prenom','$email','0')";
		$reponse = mysql_query($requete,$db1)or die (mysql_error());
		$_SESSION['nom'] = $nom;
		$_SESSION['prenom'] = $prenom;
		$_SESSION['score'] = 0;
		$requete_1="SELECT * FROM ch_membres WHERE login='$login' AND nom='$nom'";
		$resultat_1=mysql_query($requete_1,$db1)or die(mysql_error());
		$data1=mysql_fetch_assoc($resultat_1);
        	$_SESSION['idf'] = $data1['idmembre'];
		header("location:instruction.php");
}
else
{
header("location:inscription.php");
}
?>