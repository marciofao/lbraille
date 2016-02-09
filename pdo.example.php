<?php

$stm  = $pdo->prepare("SELECT * FROM table WHERE name LIKE :nome");
$stm->execute(array(':nome' => $name));
$data = $stm->fetchAll();
