<?php
function get_ip() {

	if (isset($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	}

	elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else {
		return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
	}
}

$adresse_ip = get_ip();
function Securisation($donnees)
{
$donnees = trim($donnees);// trim(str) : va supprimer certain caracetere et les espace en trop et des retour a ligne non desire 
$donnees =stripcslashes($donnees);//   stripslashes — Supprime que les antislashsc(\) d'une chaîne ; 
$donnees =strip_tags($donnees);// strip_tags(str)  supprimer les caracetere html et plus interpreter

return $donnees;
}

$info = Securisation($_POST['name']);
$info= Securisation($_POST['name']);
$info= Securisation($_POST['name']);

$info1= Securisation($_POST['email']);
$info1= Securisation($_POST['email']);
$info1= Securisation($_POST['email']);


$info3= Securisation($_POST['message']);
$info3= Securisation($_POST['message']);
$info3= Securisation($_POST['message']);




// echo $info.' '.$info1.''.$info2.' '.$info3;

$adresse_ip = get_ip();


$id = "root";
$mdp = "";

try
{
    // On se connecte à MySQL
$bdd = new PDO('mysql:host=localhost;dbname=haidaradembacv',$id,$mdp);


if( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])){	
	
 
 }
else
{ 
    	   	   // header('Location:index.php'); 
$resultat = utf8_decode("<span class='error'style='background-color: #e74c3c;;text-align: center;border: 10px solid #e74c3c; ;    border-radius: 10px;
'>Veuillez complet&eacute; tout les champs</span>") ;
echo $resultat;
     die();

 }
 //echo  $info.' '.$info1.' '.$info3.$adresse_ip;
 


$req=("INSERT INTO `mail`(`id`, `nom`, `email`, `message`, `date`, `IP`) VALUES (NULL,'$info','$info1','$info3',NOW(),'$adresse_ip')");

$resultat =$bdd->exec($req);


$resultat= utf8_decode("<span class='success' style='background-color: #27ae60;text-align: center;border: 10px solid #27ae60 ;    border-radius: 10px;

'><strong>".$info."</strong> votre message &agrave; &eacute;t&eacute; transmise, vous recevrez un mail sur <strong>".$info1."</strong></span>");
echo $resultat;

}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}



header ("Refresh:5;URL=index2.php");


?>