<?php 
ini_set('display_errors',1);
error_reporting(E_ALL);

$user_name = htmlspecialchars($_POST["username"]);
$user_phone = htmlspecialchars($_POST['userphone']);

$token = "5684109873:AAGgAp3bujo3LgxkYJx0r6CBy0XQ3qHSw2c";
$chat_id = "-863459208";
$text = "";

$formData = array(
  "Клиент: " => $user_name, 
  "Телефон: " => $user_phone
);

foreach($formData as $key => $value) {
  $text .= $key . "<b>" . urlencode($value) . "</b>" . "%0A" ;
}

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&text={$text}&parse_mode=html", "r");

if ($sendToTelegram) {
  echo "ok";
} else {
  echo "Error";
}

