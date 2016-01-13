<?php

include 'functions.php';

if (!empty($_POST)){

  $data['success'] = true;
  $_POST  = multiDimensionalArrayMap('cleanEvilTags', $_POST);
  $_POST  = multiDimensionalArrayMap('cleanData', $_POST);

  //your email adress 
  $emailTo ="cotrinafrancisco@gmail.com"; //"yourmail@yoursite.com";

  //from email adress
  $emailFrom ="cotrinafrancisco@gmail.com"; //"contact@yoursite.com";

  //email subject
  $emailSubject = "Consulta desde la web Polisoft";
$origen = $_POST["origen"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $rubro = $_POST["rubro"];
  $comment = $_POST["comment"];
  if($name == "")
   $data['success'] = false;
 
 if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) 
   $data['success'] = false;


 if($comment == "")
   $data['success'] = false;

 if($data['success'] == true){

  $message = "ORIGEN: $origen<br>
  NAME: $name<br>
  EMAIL: $email<br>
  RUBRO: $rubro<br>
  COMMENT: $comment";


  $headers = "MIME-Version: 1.0" . "\r\n"; 
  $headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
  $headers .= "From: <$emailFrom>" . "\r\n";
  mail($emailTo, $emailSubject, $message, $headers);

  $data['success'] = true;
  echo json_encode($data);
}
}