<?php
/*
 * Proxy connetion to the fantasyscore database
 */
function fantasyscoreConnect() {
 $server = 'localhost';
 $dbname = 'fantasyscore';
 $username = 'iClient';
 $password = 'DgYMOHjnn7vKfG3x';
 $dsn = "mysql:host=$server;dbname=$dbname";
/*Error handler*/
 $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
 try{
     $link = new PDO($dsn, $username, $password, $options);
     //if (is_object($link)) {
     //    echo 'It worked!';
     //}
     return $link;
 }
 catch(PDOException $e) {
     //echo "It didn't work, error: " . $e->getMessage();
     header('Location: /fantasyscore/view/500.php');
     exit;
 }
}
//fantasyscoreConnect();

