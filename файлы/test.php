<?php
include_once 'db.php';
include_once 'config.php';

$sql = "UPDATE accounts SET status=? WHERE id=? LIMIT 1";
$pdo->prepare($sql)->execute(['true', 1]);
//СДЕЛАНО САЙТОМ REST-ZONE.RU