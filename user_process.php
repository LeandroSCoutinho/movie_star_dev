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
    
    //Resgata dados do usuário
    $userData = $userDao->verifyToken();
    //Recebe dados do post
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $bio = filter_input(INPUT_POST, "bio");
    
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
}else if ($type === "changepassword") {

    $password = filter_input(INPUT_POST, "password");
    $confirmPassword = filter_input(INPUT_POST, "confirmpassword");

    //Resgata dados do usuário
    $userData = $userDao->verifyToken();
    $id = $userData->id;

    if($password === $confirmPassword){
        // Cria um novo objeto de usuário
        $user = new User();

        $finalPassword = $user->generatePassword($password);

        $user->password = $finalPassword;
        $user->id = $id;

        $userDao->changePassword($user);

    }else{
        $message->setMessage("As senhas não são iguais!","error","back");
    }
} else {
    $message->setMessage("Não foi possível atualizar os dados!","error","index.php");
}