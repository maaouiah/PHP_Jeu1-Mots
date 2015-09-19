<?php
session_start();
//pour inclure le fichier qui contient les fonctions utilisées et la connexion à la base des données
include_once("identifiants.php");
//des variables qui contient les valeurs du sessions
$id=$_SESSION['idf'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$score=$_SESSION['score'];
//requette pour avoir tous les données de la table ch_membres en les citant par ordre descendant
$requete="SELECT *  FROM ch_membres ORDER BY score DESC";
$reponse = mysql_query($requete,$db1)or die (mysql_error());
?>
<html>
          <head>
			<title>Classement</title>
			<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
			<style type="text/css">
			<!--
			#contenaire .contenu .gauche table tr th {
				font-family: Tahoma, Geneva, sans-serif;
			}
			#contenaire .contenu .gauche table {
				font-size: 10px;
			}
			#contenaire .contenu .gauche table {
				font-weight: bold;
			}
			-->
			</style>
         </head>
	<body>
	<!--la plus grande div le bloc le plus grand qui englobe toutes les parties(les div)  -->
	<div id="contenaire">
		<!-- div de l'entête du site menu -->
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
						  <li><a href="instruction.php">Instruction</a></li>  
						  <li><a href="jeu.php">Jeu</a></li>
						  <li><a href="classement.php"  class="active">Classement</a></li>  
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
                    <div class="right2"><h2>Classement :</h2></div>      
		<div class="gauche">	
			<table width="580">
				 <tr>
					 <th width="75">Pseudo</th>
					 <th width="77">Score g&eacute;n&eacute;ral</th>
					 <th width="100">Nombre de partie</th>
					 <th width="100">Moyenne par partie</th>
					  <th width="100">Score maximale</th>
					 <th width="100">Score minimale</th>
				 </tr>
				 <?php 
				 // on affiche les scores des membres on les mettant dans un tableau associatif
				 while($data = mysql_fetch_assoc($reponse))
					{	
					$x=$data['idmembre'];
					$req="SELECT  COUNT(ch_partie.idmembre) AS nb,MAX(ch_partie.score) AS maxs,MIN(ch_partie.score) AS mins,AVG(ch_partie.score) AS moy FROM ch_partie WHERE idmembre=$x ";
					$req=mysql_query($req,$db1) or die(mysql_error());
					$data2=mysql_fetch_assoc($req);
				 ?>
				 <tr>
					 <td align="center"><?php echo $data['login'] ?></td>
					 <td align="center"><?php echo $data['score'] ?></td>
					 <td align="center"><?php echo $data2['nb'] ?></td>
					 <td align="center"><?php echo $data2['moy'] ?></td>
					 <td align="center"><?php echo $data2['maxs'] ?></td>
					 <td align="center"><?php echo $data2['mins'] ?></td>
				 </tr>
				<?php 
					}
				 ?>
			</table>
	         </div>
			<div class="droite">
			      <img src="medias/classement.jpg"/>
			</div>
                    </div>
  <!--div du pied de page du site -->
		<div id="footer"></div>

          </div>
	</body>
</html>