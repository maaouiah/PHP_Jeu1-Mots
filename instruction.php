<?php
session_start();
$id=$_SESSION['idf'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$score=$_SESSION['score'];
?>
<html>
          <head>
			<title>Instruction</title>
			<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<body>
		<!--la plus grande div le bloc le plus grand qui englobe toutes les parties(les div)  -->
		<div id="contenaire">
				<!-- div de l'entÃªte du site menu -->
				<div class="header">
					<!--div de logo c'est la qu'on met le logo -->
					<div class="logo"><img src="medias/logo.png" /> </div>
					<!--div de la partie juste au dessus du menu -->
					<div class="righttopzone">
						<?php 
							echo "<b>Bonjour</b>"."&nbsp;"."<b>$nom</b>"."&nbsp;"."<b>$prenom</b>"."&nbsp;"."<b>votre score est </b>"."&nbsp;"."<b>$score</b>"."<br>";
						?>
					</div>    
					<!--div de chaque item de menu -->
					<div class="rightbottomzone">
						<!--div de la zone du menu qui contient deux div menu et bandemenu -->
						<div class="rightbottomzone_bgRight">
							 <div class="menu">
								 <ul>  
									   <li><a href="instruction.php"  class="active">Instruction</a></li>  
									  <li><a href="jeu.php">Jeu</a></li>
									  <li><a href="classement.php">Classement</a></li>  
									  <li><a href="deconnexion.php">D&eacute;connexion</a></li>            			             
								</ul>
							</div>
							<!--div de la partie qui fait une dÃ©viation dans le menu Ã  gauche -->
							<div class="bandemenu"></div>
						</div>
					</div>
			
				</div>
				 <!-- c'est le bloc de banniÃ¨re c'est lÃ  que va l'image de banner et les caractÃ©ristiques de div en css  -->
				 <div class="banner_graphique"></div>
				    <!--div de contenu de site --> 
				 <div class="contenu">
					<div class="right2"><h2>Instructions :</h2></div>      
					<div class="gauche">
						<div class="style_ecriture">
							Ce jeu utilise les mots du fran&ccedil;ais pour mettre &agrave; l&acute;&eacute;preuve votre connaissances. allez dans l&acute;onglet jeu pour d&eacute;marrer une partie. L&acute;ordinateur s&eacute;lectionne 9 lettres tir&eacute;es al&eacute;atoirement dont 6 consonnes et 3 voyelles et &agrave; vous de fournir le maximum des mots avec ces lettres. Les mots doivent contenir au minimum 2 lettres et au maximum 9 lettres.<br />
							Le score de chaque mot que vous proposez est calcul&eacute; selon la formule suivante: <br />

							- si le mot n&acute;appartient pas &agrave; la base de lexique son score est &eacute;gal &agrave; 0.<br />
							- Sinon, le mot re&ccedil;oit un score qui est la somme des valeurs de chacune de ses lettres au Scrabble.<br />
							Le jeu se termine dans 3 cas : <br />
							- Le joueur trouve 10 mots.<br />
							- Le joueur d&eacute;sir faire une nouvelle partie.<br />
							- Le temps de jeu est fini.<br />

		
						</div>	
						
					</div>
					<div class="droite">
						<img src="medias/instruction.jpg"/>
					</div>
				</div>
			<!--div du pied de page du site -->
			<div id="footer"></div>

		</div>
	</body>
</html>	