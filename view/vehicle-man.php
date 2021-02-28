<?php

//check if the user is logged in and has a level of 3
$clientLev = $_SESSION['clientData']['clientLevel'];

if (isset($_SESSION['loggedin']) and $clientLev > 1){
} else {
    header('Location: /fantasyscore');
}

?><?php include $_SERVER['DOCUMENT_ROOT'].'/fantasyscore/common/header.php'; ?>

<h1>Vehicle Management</h1>
<?php
if (isset($message)) {
 echo $message;
}
?>
<ul>
    <li><a href="/fantasyscore/vehicles?action=add-classification">Add Classification</a></li>
    <li><a href="/fantasyscore/vehicles?action=add-vehicle">Add Vehicle</a></li>
</ul>

<?php include $_SERVER['DOCUMENT_ROOT'].'/fantasyscore/common/footer.php'; ?>