<?php

//check if the user is logged in and has a level of 3
$clientLev = $_SESSION['clientData']['clientLevel'];

if (isset($_SESSION['loggedin']) and $clientLev > 1){
} else {
    header('Location: /fantasyscore');
}

?><?php include $_SERVER['DOCUMENT_ROOT'].'/fantasyscore/common/header.php'; ?>

<h1>Add Car Classification</h1>
<?php
if (isset($message)) {
 echo $message;
}
?>
<form action= "/fantasyscore/vehicles/index.php" method="post">
<label>Classification Name:</label><br><br>
    <input name="classificationName" id="classificationName" type="text" required><br><br>
<input type="submit" name="submit" id="regbtn" value="Add Classification">
<input type="hidden" name="action" value="add-Class">
</form>

<?php include $_SERVER['DOCUMENT_ROOT'].'/fantasyscore/common/footer.php'; ?>