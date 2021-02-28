<?php

//check if the user is logged in
if (empty($_SESSION['loggedin'])){
    header('Location: /fantasyscore');
}
//"<option value='$classification[classificationId]'"   $clientFname = $_SESSION['clientData']['clientFirstname'];
$clientFname = $_SESSION['clientData']['clientFirstname'];
$clientLname = $_SESSION['clientData']['clientLastname'];
$Name = "<h1>$clientFname $clientLname</h1>";
$clientMail = $_SESSION['clientData']['clientEmail'];
$EMail = "<li>Email: $clientMail</li>";
$clientLev = $_SESSION['clientData']['clientLevel'];
$Lev = "<li>Client Level: $clientLev</li>"

?><?php include $_SERVER['DOCUMENT_ROOT'].'/fantasyscore/common/header.php'; ?>

<?php
echo $Name;
?>

<p>You are logged in.</p>

<ul>
    <?php
        echo $EMail;
    ?>
    <?php
        echo $Lev;
    ?>
</ul>

<?php
    if ($clientLev > 1){
        echo "<p>Go to the </p><a href= '/fantasyscore/vehicles'>Vehicle Manager</a>";
    }
?>



<?php include $_SERVER['DOCUMENT_ROOT'].'/fantasyscore/common/footer.php'; ?>