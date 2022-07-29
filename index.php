<?php
require_once 'db_user.php';
require_once 'list_user.php';

$list_id = [];

$user = new db_user(1, 'Bebra', 'Bulion', '20.02.2002', '1', 'Minsk');
array_push($list_id, $user);
$user_1 = new db_user(2, 'Bebra', 'wew', '20.02.2002', '1', 'Minsk');
array_push($list_id, $user_1);
$user_2 = new db_user(3, 'Bebra', 'Buwtrtlion', '20.02.2002', '1', 'Minsk');
array_push($list_id, $user_2);
$user_3 = new db_user(4, 'Bebra', 'Bureqwlion', '20.02.2002', '1', 'Minsk');
array_push($list_id, $user_3);
$user_4 = new db_user(5, 'Bebra', 'Buwqytlion', '20.02.2002', '1', 'Minsk');
array_push($list_id, $user_4);
$app = new list_user([2,4], $list_id);
$app->delete_users();
?>