<?php

$name = $_POST['name'];
$phone = $_POST['phone'];
$text = $_POST['textarea'];
$token = "6451764671:AAGizWg_3drCik5FseZI7JG4mCaECV-fRsA";
$chat_id = "1001867028495";
$arr = array(
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone,
  'Текст' => $text
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header('Location: success.html');
} else {
  echo "Error";
}
?>