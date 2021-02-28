<?php include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/header.php'; ?>

<h1>Register</h1>
<?php
if (isset($message)) {
 echo $message;
}
?>
<form action= "/phpmotors/accounts/index.php" method="post">
<label>First Name:</label><br>
    <input name="clientFirstname" id="clientFirstname" type="text" <?php
    if (isset($clientFirstname)) {
        echo "value='$clientFirstname'";
    } ?> required><br>
<label>Last Name:</label><br>
    <input name="clientLastname" id="clientLastname" type="text" <?php
    if (isset($clientLastname)) {
        echo "value='$clientLastname'";
    } ?>  required><br>
<label>Email:</label><br>
    <input name="clientEmail" id="clientEmail" type="email" <?php
    if (isset($clientEmail)) {
        echo "value='$clientEmail'";
    } ?> required><br>
<label>Password:</label><br>
<span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>  <br>
    <input name="clientPassword" id="clientPassword" type="password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br><br>
<input type="submit" name="submit" id="regbtn" value="register">
<input type="hidden" name="action" value="register">
</form>


<?php include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'; ?>