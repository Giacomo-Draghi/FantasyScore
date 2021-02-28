<?php
//check if the user is logged in and has a level of 3
$clientLev = $_SESSION['clientData']['clientLevel'];

if (isset($_SESSION['loggedin']) and $clientLev > 1){
} else {
    header('Location: /fantasyscore');
}
//Build the Selected list
$classificationList = '<select name="classificationId" id="classificationId" required> <option value="">Choose Car Classification</option>';
foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'";
    
    if(isset($classificationId)) {
        if ($classification['classificationId'] === $classificationId){
            $classificationList .= ' selected ';
        }
    }
    $classificationList .= "> $classification[classificationName]</option>";
}

$classificationList .='</select><br><br>';
?><?php include $_SERVER['DOCUMENT_ROOT'].'/fantasyscore/common/header.php'; ?>

<h1>Register</h1>
<h4>*Note all fields are Required</h4>
<?php
if (isset($message)) {
 echo $message;
}
?>
<form action= "/fantasyscore/vehicles/index.php" method="post">
<label>Car Classification:</label><br>
    <?php echo $classificationList ; ?>
<label>Make:</label><br>
    <input name="invMake" id="invMake" type="text" <?php
    if (isset($invMake)) {
        echo "value='$invMake'";
    } ?> required><br><br>
<label>Model:</label><br>
    <input name="invModel" id="invModel" type="text" <?php
    if (isset($invModel)) {
        echo "value='$invModel'";
    } ?> required><br><br>
<label>Description:</label><br>
    <textarea name="invDescription" id="invDescription" cols="30" rows="10" required><?php
    if (isset($invDescription)) {
        echo "$invDescription";
    } ?></textarea><br><br>
<label>Image Path:</label><br>
    <input name="invImage" id="invImage" type="text" <?php
    if (isset($invImage)) {
        echo "value='$invImage'";
    } ?> required><br><br>
<label>Thumbnail Path:</label><br>
    <input name="invThumbnail" id="invThumbnail" type="text" <?php
    if (isset($invThumbnail)) {
        echo "value='$invThumbnail'";
    } ?> required><br><br>
<label>Price:</label><br>
    <input name="invPrice" id="invPrice" type="number" placeholder='0.00' step='0.01' <?php
    if (isset($invPrice)) {
        echo "value='$invPrice'";
    } ?> required><br><br>
<label># In Stock:</label><br>
    <input name="invStock" id="invStock" type="number" placeholder='0' step='1' <?php
    if (isset($invStock)) {
        echo "value='$invStock'";
    } ?> required><br><br>
<label>Color:</label><br>
    <input name="invColor" id="invColor" type="text" <?php
    if (isset($invColor)) {
        echo "value='$invColor'";
    } ?> required><br><br>
<input type="submit" name="submit" id="regbtn" value="Add Vehicle">
<input type="hidden" name="action" value="add-inventory">
</form>

<?php include $_SERVER['DOCUMENT_ROOT'].'/fantasyscore/common/footer.php'; ?>