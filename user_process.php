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

    //Preenche os dados do usuário
    $userData->name = $name;
    $userData->lastname = $lastname;
    $userData->email = $email;
    $userData->bio = $bio;
   
    // Upload da Imagem
    if(isset($_FILES['image']) && !empty($_FILES["image"]["tmp_name"])){
        
        $image = $_FILES["image"];
        $imageTypes = ["image.jpeg", "image/jpg", "image/png"];
        $jpgArray = ["image.jpeg", "image/jpg"];
        //Checagem de tipo de imagem
        if(in_array($image["type"], $imageTypes)){

            //Checar se é jpeg
            if(in_array($image, $jpgArray)){

                $imageFile = imagecreatefromjpeg($image["tmp_name"]);

            } else {

                $imageFile = imagecreatefrompng($image["tmp_name"]);

            }

            $imageName = $userData->imageGenerateName();

            imagejpeg($imageFile, "./img/users/". $imageName, 100);

            $userData->image = $imageName;
            
        } else {
            $message->setMessage("Tipo inválido de imagem, insira png ou jpeg!","error","back");
        }

    }
    $userDao->update($userData);

// Atualiza senha do usuário
}else if ($type === "chagepassword") {

} else {
    $message->setMessage("Não foi possível atualizar os dados!","error","index.php");
}