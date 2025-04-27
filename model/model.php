<?php

function select(PDO $con):array
{
$query=$con->query("SELECT * FROM testtableti");
$messages=$query->fetchAll();
$query->closeCursor();
return $messages;

}

function insert(PDO $conecte, string $nom, string $prenom, string $email, string $telephone, string $message):bool
{

    $nomInsert = trim(htmlspecialchars(strip_tags($nom),ENT_QUOTES));
    $prenomInsert = trim(htmlspecialchars(strip_tags($prenom),ENT_QUOTES));
    $emailInsert = filter_var($email,FILTER_VALIDATE_EMAIL); 
    $messageInsert = trim(htmlspecialchars(strip_tags($message),ENT_QUOTES));
    $telephoneInsert = preg_replace('/[^0-9\+]/', '', trim(strip_tags($telephone),ENT_QUOTES));

    
    if(empty($nomInsert) ||strlen($nomInsert)>60 || empty($prenomInsert) ||strlen($prenomInsert)>60 || $emailInsert===false || empty($messageInsert) ||strlen($messageInsert)>500 || empty($telephoneInsert) || strlen($telephoneInsert)>20)
    {
        return false;
    }
    
$insert=$conecte->prepare("INSERT INTO testtableti (nom, prenom, email, telephon, message) VALUES (?, ?, ?, ?, ?)");
  $insert->execute([$nomInsert, $prenomInsert, $emailInsert, $telephoneInsert, $messageInsert]);
  $insert->closeCursor();
  return true;
    }
    



