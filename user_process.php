<?php
 
require_once("globals.php");
require_once("db.php");
require_once("models/User.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message =  new Message($BASE_URL);

$userDao = new UserDao($conn, $BASE_URL);
//Resgata o tipo do formulário
$type = filter_input(INPUT_POST, "type");

if ($type === "update"){
    
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $bio = filter_input(INPUT_POST, "bio");

     $userData = $userDao->verifyToken();

    $userData->name = $name;
    $userData->lastname = $lastname;
    $userData->email = $email;
    $userData->bio = $bio;
   
    $userDao->update($userData);

}else if ($type === "chagepassword") {

} else {
    $message->setMessage("Não foi possível atualizar os dados!","error","index.php");
}