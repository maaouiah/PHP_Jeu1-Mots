<?php
session_start();
include("identifiants.php");
$id=$_SESSION['idf'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$score=$_SESSION['score'];
?>
<?php
			if($_POST['temp'])
			{
				$times=$_POST['temp'];
			}
			else
				$times=180;	
?>

			<script>
					function tester_champs()
					{
						if ((form.mot.value == "") || (form.mot.value.length < 2) ||(form.mot.value.length > 9))
						{
							alert("entrer votre mot s'il vous plait (entre 2 et 9 caracteres)");
							form.mot.focus();
							return false; 
						}
						else
						{
							return true;
						}
					}

					// les fonctions de compteurs
					var counter = 0;
					var tfin;   
					function activer(x)
					{
						counter = 0;
						counter = x; // en secondes,
						ecrasercompteur();		
					}
					function desactiver()
					{
						clearTimeout(tfin);
						counter = 0;
					}
					function ecrasercompteur()
					{
							if(counter>0)
							{
								
								counter--;
							document.getElementById("counter").innerHTML=counter;
							tfin = setTimeout("ecrasercompteur();",1000);
								
								document.getElementById('temp').value=counter;
								
							}
							else if(counter==0)
							{
								clearTimeout(tfin);
								alert("Fin de la partie, temps termine");
								
							}
					}

			</script>

<?php


/*print_r($_SESSION);*/
if(isset($_POST['action']) && (!isset($_POST['terminer'])) )
	{	// jeux en cours
		$shuffled=$_SESSION['shuffled'];		
		if (isset($_POST['mot']))
		{
			$mot=$_POST['mot'];
			//preg_match permet de tester si un caractere se trouve dans une chaine
			//donc ici je teste si les caracteres du mot entrée sont les mêmes que celles que la chaine génerer aleatoirement
				if((preg_match("/$mot[0]/",$shuffled))&&(preg_match("/$mot[1]/",$shuffled))&&(preg_match("/$mot[2]/",$shuffled))&&(preg_match("/$mot[3]/",$shuffled))&&(preg_match("/$mot[4]/",$shuffled))&&(preg_match("/$mot[5]/",$shuffled))&&(preg_match("/$mot[6]/",$shuffled))&&(preg_match("/$mot[7]/",$shuffled))&&(preg_match("/$mot[8]/",$shuffled)) &&( $_SESSION['y']<10) )
											 {
							 $adresse2 = 'localhost';
							 $nomr2 = 'openLexicon';
							 $motdepasse2 = 'openLexicon';
							 $database2 = 'openLexicon';
							 $db2=mysql_connect($adresse2, $nomr2, $motdepasse2);
							 mysql_select_db($database2,$db2);
							 //on teste si le mot existe dans la base
			$requete1 = mysql_query('SELECT * FROM openlexicon_lexique WHERE (forme= "'.$mot.'")||(lemme= "'.$mot.'")',$db2) or die (mysql_error());
			$data1 = mysql_fetch_assoc($requete1);
			mysql_close($db2);
			if (($data1['forme'] == $mot)||($data1['lemme'] == $mot)) 
			{
				$trouve=false;
				for($var=0;$var< sizeof($_SESSION['tab']);$var++)
				{
					if($_SESSION['tab'][$var]==$mot)
						$trouve=true;
				}
				if(!$trouve)
				{
					$_SESSION['tab'][$_SESSION['y']]=$mot;
					$_SESSION['y']+=1;
					$_SESSION['afficher']=true;
				}
															
														
			}
			else
				$_SESSION['msg_t']='<p style="color:#930">Vous avez saisi un mot qui ne se trouve pas dans la base !!!</p>';
															
			if(($_SESSION['y']>= 10))
			{
				$_SESSION['msg_t']='<p style="color:#930">Vous avez dépassé 10 Mots autorisés !!!</p>';
				$_SESSION['score']=terminer_jeu($_SESSION['tab'],$id);
			}
			}else
			{
				$_SESSION['msg_t']='<p style="color:#930">Mot invalide !!!</p>';
			}
			
											
		}
	
	}
	else
	{
		//lorsque on click sur le bouton nouvelle jeu la partie en cours sera interrompu et on calcule le score
		 if(isset($_POST['terminer']))
			{
				 $_SESSION['msg_t']='<p style="color:#930">Jeu interrompu !!!</p>';
			        //calcul de score 
				$_SESSION['score']=terminer_jeu($_SESSION['tab'],$id);
			}
		// initialisation de la liste des propositions
		if(isset($_SESSION['afficher']))
		{unset($_SESSION['afficher']);}
		$consonne    = 'bcdfghjklmnpqrstvwxz';	
		$voyelle   .= 'aeiouy'; 
		$code_aleatoire      = ''; 
	
		for($i=0;$i < 6;$i++)    //6 est le nombre de caractères
		{ 
			$code_aleatoire .= substr($consonne,rand()%(strlen($consonne)),1); 
		}
		for($i=0;$i < 3;$i++)    //3 est le nombre de caractères
		{ 
			$code_aleatoire .= substr($voyelle,rand()%(strlen($voyelle)),1); 
		}
		//str_shuffle melange les caractéres
		$shuffled = str_shuffle($code_aleatoire);
		//$_SESSION['shuffled'] dans cette session j'ai mis la chaine melanger pour que je puisse l'utiliser après
		$_SESSION['shuffled']=$shuffled;
		//$_SESSION['tab'] c'est une session qui contient les mots entrées
		$_SESSION['tab']=array();
		//y c'est le compteur de tableau $_SESSION['tab']
		$_SESSION['y']=0;
	}
?>
<html>
          <head>
			<title>Jeu</title>
			<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
	</head>    
	<body onLoad="activer(<?php echo $times; ?>);">
			<!--la plus grande div le bloc le plus grand qui englobe toutes les parties(les div)  -->
			<div id="contenaire">
				<!-- div de l'entête du site menu -->
				<div class="header">
					<!--div de logo c'est la qu'on met le logo -->
					<div class="logo"><img src="medias/logo.png" /> </div>
					<!--div de la partie juste au dessus du menu -->
					<div class="righttopzone">
							<?php 
								echo "<b>Bonjour</b>"."&nbsp;"."<b>$nom</b>"."&nbsp;"."<b>$prenom</b>"."&nbsp;"."<b>votre score est </b>"."&nbsp;"."<b>".$_SESSION['score']."</b>"."<br>";
							?>
						<tr>
							<td>Temps Restant : </td>
							<td><div id="counter" name="counter"></div></td>
						</tr>
			                    </div>    
					<!--div de chaque item de menu -->
					<div class="rightbottomzone">
						<!--div de la zone du menu qui contient deux div menu et bandemenu -->
						<div class="rightbottomzone_bgRight">
							 <div class="menu">
								 <ul>  
									  <li><a href="instruction.php">Instruction</a></li>  
									  <li><a href="jeu.php"  class="active">Jeu</a></li>
									  <li><a href="classement.php">Classement</a></li> 
									  <li><a href="deconnexion.php">D&eacute;connexion</a></li>           			             
								</ul>
							</div>
								   <!--div de la partie qui fait une déviation dans le menu à gauche -->
							<div class="bandemenu"></div>
						</div>
					</div>
			
				</div>
				<!-- c'est le bloc de bannière c'est là que va l'image de banner et les caractéristiques de div en css  -->
				<div class="banner_graphique"></div>
					    <!--div de contenu de site --> 
					    <div class="contenu">
						<div class="right2">
							<h2>Jeu :</h2>
						</div>    
						<div class="gauche">

							<table>	
								<tr>
									<td width="100" align="center" style="font-size:44px"><font color="#FFCC00"><?php echo $shuffled[0]; ?></font></td>
									<td width="100" align="center" style="font-size:44px"><font color="#FFCC00"><?php echo $shuffled[1]; ?></font></td>
									<td width="100" align="center" style="font-size:44px"><font color="#FFCC00"><?php echo $shuffled[2]; ?></font></td>
									<td width="100" align="center" style="font-size:44px"><font color="#FFCC00"><?php echo $shuffled[3]; ?></font></td>
									<td width="100" align="center" style="font-size:44px"><font color="#FFCC00"><?php echo $shuffled[4]; ?></font></td>
									<td width="100" align="center" style="font-size:44px"><font color="#FFCC00"><?php echo $shuffled[5]; ?></font></td>
									<td width="100" align="center" style="font-size:44px"><font color="#FFCC00"><?php echo $shuffled[6]; ?></font></td>
									<td width="100" align="center" style="font-size:44px"><font color="#FFCC00"><?php echo $shuffled[7]; ?></font></td>
									<td width="100" align="center" style="font-size:44px"><font color="#FFCC00"><?php echo $shuffled[8]; ?></font></td>
									<a href="jeu.php"><img src="medias/actualiser.jpg"/></a>
								</tr>
							</table>
							<form id="contactform" name="form" action="jeu.php" method="post" onSubmit="tester_champs();">
								
								<ol>							
									<li>
										<input type="hidden" id="temp" name="temp" class="etmp"/><br />
										<label for="name">Entrez votre mot <span class="red">*</span></label>
										<input id="name" name="mot" value="" class="text" />&nbsp;
										<input type="submit" name="action" value="Soumettre">
									</li>							
								</ol>
							</form>
		    
						    <br />
						    <br />
							    <?php 
								if(isset($_SESSION['msg_t']))
								{
									print $_SESSION['msg_t'];
									unset($_SESSION['msg_t']);
								}
								if(isset($_SESSION['afficher']))
								{
								
								?>
									<table>
											<tr>
												<?php
												//boucle qui parcourt un tableau pour afficher les mots qui sont entrée par l'utilisateur
												$z=sizeof($_SESSION['tab']);

												for($cp=0; $cp <$z; $cp++)
												{
													?>
													<td width="70" align="center" style="font-size:12px"><font color="#330066"><?php print $_SESSION['tab'][$cp]; ?></font></td>
													<?php
												}
												?>
											</tr>
									</table>
							<?php } ?>
						</div>
						<div class="droite">
								<form action="jeu.php" method="post">
									<input type="submit" name="terminer" value="Nouvelle partie">
								</form>
								<img src="medias/10056459_XS.jpg"/>
						</div>
				</div>
				<!--div du pied de page du site -->
				<div id="footer"></div>

			</div>
	</body>
</html>