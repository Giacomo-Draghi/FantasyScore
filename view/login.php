<?php include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/header.php'; ?>

<h1>Sign in</h1>
<?php
if (isset($message)) {
 echo $message;
}
?>
<form method="post" action="/phpmotors/accounts/">
<label>Email:</label><br>
    <input name="clientEmail" id="clientEmail" type="email" required><br>
<label>Password:</label><br>
    <input name="clientPassword" id="clientPassword" type="password" required><br><br>
<input type="submit" value="Sign-in">
<input type="hidden" name="action" value="Login"> <br>
<a href="/phpmotors/accounts?action=register-page">Not a member yet?</a>
</form>



<?php include $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'; ?>