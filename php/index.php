<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "6627808472:AAGf1WLKTtPgg2oNvHs0sn39XiK0qCQJOZM";

//Сюда вставляем chat_id
$chat_id = "5496666777";

$name; 
$phone;
$email;
$contact;
$comment;
$txt = "";

//Определяем переменные для передачи данных из нашей формы
if (isset($_POST['name'])) {
    $name = htmlspecialchars($_POST['name']);
}
if (isset($_POST['phone'])) {
    $phone = htmlspecialchars($_POST['phone']);
}
if (isset($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);
}
if (isset($_POST['contact'])) {
    $contact = htmlspecialchars($_POST['contact']) ? htmlspecialchars($_POST['contact']) : '';
}
if (isset($_POST['comment'])) {
    $comment = htmlspecialchars($_POST['comment']) ? htmlspecialchars($_POST['comment']) : '';
}

if ($name && $phone && $email) {
//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Имя:' => $name,
        'Телефон:' => $phone,
        'email:' => $email,
        'Направить материалы на:' => $contact,
        'Комментарий:' => $comment
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
    // $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?&parse_mode=html&text={$txt}","r");


//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        echo "ok";
    }

//А здесь сообщение об ошибке при отправке
    else {
        echo "false";
    }
}

?>