<?php

/* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$phone = $_POST['subject'];
$mes=$_POST['message'];
$token = "53925:AE";
$txt="";
$chat_id = "1528";
$arr = array(
  'Имя пользователя: ' => $name,
  'Email:' => $email,
  'Предмет: ' => $phone,
  'Сообщение: ' => $mes,
);

$txt = json_encode($txt);
//$data = json_encode($data);
foreach($arr as $key => $value) {
  $txt .= "\n".$key."\n ".$value."\n";
  
};

$txt = rawurlencode($txt);  
$sendToTelegram = fopen("http://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
 header('Location:thank-you.html');

} else {
  echo "Error";
}
?>
