<?php

require_once "Session.php";

// Een unieke key aanmaken
$key = md5(uniqid(rand(), true));

$session = new Session();
$session->userId = $user->id;
$session->key = $key;
$session->start = date("Y-m-d H:i:s");
$session->end = date("Y-m-d H:i:s", strtotime("+1 month"));
$session->insert();

// Sla de sessie op in een cookie
setcookie("steptember-session", $key, strtotime("+1 month"), "/");
