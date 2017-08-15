<?php

$user='root';
$password='root';
$dbname='bootstrap_calendar';
$host='127.0.0.1';

// $user='prod_cb';
// $password='YWEwZmZkMTZjZTgx';
// $dbname='prod_calendariobrisas';
// $host='10.0.1.223';

$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

?>