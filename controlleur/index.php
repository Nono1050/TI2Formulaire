<?php



require_once '../config.php';

require_once '../model/model.php';


try{
  
    $connexion = new PDO( dns , user_data, password_data,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,]
    );
}catch(Exception $e){
  
    die("Code : {$e->getCode()} <br> Message : {$e->getMessage()}");
}





$articles = select($connexion);


if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['message']))
{
$insert=insert($connexion, $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['message']);
header('Location: ./');
exit;
}




require_once '../view/view.php';



$connexion = null;