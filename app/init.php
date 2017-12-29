<?php

session_start();

$_SESSION['user_id'] = 1;

$db = new PDO('mysql:host=localhost;dbname=to_do;', 'to_do', 'coderslab');

if(!isset($_SESSION['user_id'])) {
    die ('You are not signed in');
}